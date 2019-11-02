<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/users', 'Admin\UserController@index')->name('admin.users');
});
