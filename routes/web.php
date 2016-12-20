<?php

//General Routes
Route::group(['as' => 'pages.'], function () {
    Route::get('/', 'PagesController@home')
        ->name('home');
    Route::get('help', 'PagesController@help')
        ->name('help');
    Route::get('about', 'PagesController@contact')
        ->name('contact');
});

Route::auth();


//USER Routes
Route::get('profile/{username?}', 'UserController@profile')->name('user.profile');
Route::post('profile', 'UserController@update')->name('user.update');
Route::get('password/change', 'UserController@changePassword')->name('user.change-password');
Route::post('password/change', 'UserController@updatePassword')->name('user.update-password');
Route::resource('alamat', 'AlamatController', ['except' => ['index', 'show', 'create', 'edit']]);


//ADMIN Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::post('/', 'AdminController@uploadImage')->name('upload');

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('modules', 'SettingController@modules')
            ->name('list_module');
        Route::get('{module}/update', 'SettingController@editValue')
            ->name('edit_value');
        Route::patch('{module}/update', 'SettingController@updateValue')
            ->name('update_value');
    });

    Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {
        Route::post('{permission}/role/{role}', 'PermissionController@attachRole')
            ->name('attach');
        Route::delete('{permission}/role/{role}', 'PermissionController@detachRole')
            ->name('detach');
    });

    Route::get('admin', 'UserController@admin');
    Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
        Route::put('{user}', 'UserController@unDestroy')->name('un-destroy');
        Route::put('{user}/role/{role}', 'UserController@attachRole')->name('attach-role');
        Route::delete('{user}/role/{role}', 'UserController@detachRole')->name('detach-role');
    });

    Route::resource('setting', 'SettingController', ['except' => ['show']]);
    Route::resource('user', 'UserController', ['except' => ['show', 'update', 'edit']]);
    Route::resource('role', 'RoleController', ['except' => ['show']]);
    Route::resource('permission', 'PermissionController', ['except' => ['show']]);
    Route::resource('menu', 'MenuController', ['except' => ['show']]);
});

/**
 * stereotype for routes:
 * {controller_name; unique_feature;}/{variable: id; username; etc;}/{action; component;}
 * 
 * e.g.:
 * -> user/1/edit (action)
 * -> permission/1/role/1 (component)
 **/


//API Routes
Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::group(['prefix' => 'region', 'as' => 'region.'], function () {
        Route::get('provinces', 'UtilitiesController@getProvinces');
        Route::get('cities/{p_id}', 'UtilitiesController@getCities');
        Route::get('districts/{k_id}', 'UtilitiesController@getDistricts');
    });

    Route::get('users/{role?}', 'UserController@api')->name('users');
    Route::get('menu/menu_list/{module}', 'MenuController@menuList')->name('menus');
});


//Development Routes
Route::get('trial', function () {
    $user = Auth::user();

    return view('trial', compact('user'));
});

Route::get('loginusing/{id}', function ($id) {
    Auth::loginUsingId($id);

    return redirect('admin');
});