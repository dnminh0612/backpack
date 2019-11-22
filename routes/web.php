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

Route::get('/socket', 'SocketController@index');
Route::post('/sendmessage', 'SocketController@sendMessage');
Route::get('/chat', 'SocketController@writemessage');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/users', 'Admin\UserController@index')->name('admin.users');
    Route::get('/user/{id}', 'Admin\UserController@edit')->name('admin.user_edit');
    Route::get('/khoi', 'Admin\KhoiController@index')->name('admin.khoi');
    Route::get('/khoi/them', 'Admin\KhoiController@create')->name('admin.khoi_them');
    Route::post('/khoi/them/store', 'Admin\KhoiController@store')->name('admin.khoi_them_store');
    Route::delete('/khoi/them/delete/{id}', 'Admin\KhoiController@destroy')->name('admin.khoi_delete');

//    Route::resource('datatables', 'DatatablesController', [
//        'listUser'  => 'datatables.listUser',
//    ]);
    Route::get('datatables/listUser', 'DatatablesController@listUser')->name('datatables.listUser');

});

