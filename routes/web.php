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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/broadcast', 'BroadcastController@index');
Route::get('/broadcast/chat', 'BroadcastController@chat');


Route::resource('forms', 'FormsController');

Route::group(['namespace' => 'Demo', 'prefix' => 'demo'], function () {
    Route::resource('biggers', 'BiggersController');
});
