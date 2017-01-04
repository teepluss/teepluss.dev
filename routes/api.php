<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('user', 'Api\UserController');
Route::resource('daemon', 'Api\DaemonController');
Route::resource('messages', 'Api\MessagesController');
Route::resource('notifications', 'Api\NotificationsController');
