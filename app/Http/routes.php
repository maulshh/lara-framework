<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('home', function(){
    return view('home');
})->middleware('auth');

Route::get('hero/{a?}/{b?}/{c?}', function(){
    return view('hero');
})->middleware('auth')->name('hero');

Route::post('permission/{permission}/{role}', 'PermissionController@attachRole');
Route::delete('permission/{permission}/{role}', 'PermissionController@detachRole');

Route::get('setting/update/{module}', 'SettingController@editValue');
Route::patch('setting/value', 'SettingController@updateValue');

Route::resource('setting', 'SettingController', ['except' => ['show']]);
Route::resource('admin', 'AdminController');
Route::resource('user', 'UserController');
Route::resource('role', 'RoleController', ['except' => ['show']]);
Route::resource('permission', 'PermissionController', ['except' => ['show']]);
Route::resource('menu', 'MenuController', ['except' => ['show']]);