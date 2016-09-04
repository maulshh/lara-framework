<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('home', function () {
    return view('home');
})->middleware('auth');

Route::get('hero/{a?}/{b?}/{c?}', function () {
    return view('hero');
})->middleware('auth')->name('hero');

Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {
    Route::post('{permission}/{role}', 'PermissionController@attachRole')
        ->name('attach');
    Route::delete('{permission}/{role}', 'PermissionController@detachRole')
        ->name('detach');
});

Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::get('modules', 'SettingController@modules')
        ->name('list_module');
    Route::get('update/{module}', 'SettingController@editValue')
        ->name('edit_value');
    Route::patch('value', 'SettingController@updateValue')
        ->name('update_value');
});

Route::get('profile/{username?}', 'UserController@profile')
    ->name('user.profile');

Route::resource('setting', 'SettingController', ['except' => ['show']]);
Route::resource('admin', 'AdminController');
Route::resource('user', 'UserController');
Route::resource('role', 'RoleController', ['except' => ['show']]);
Route::resource('permission', 'PermissionController', ['except' => ['show']]);
Route::resource('menu', 'MenuController', ['except' => ['show']]);