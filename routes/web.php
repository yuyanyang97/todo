<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'TodoController@index')->name('index');
Route::get('check/{id}', 'TodoController@check')->name('task_detail');
Route::get('add', 'TodoController@create')->name('add_task');
Route::post('store', 'TodoController@store')->name('store_task');
Route::post('edit/{id}', 'TodoController@update')->name('update_task');
Route::delete('delete/{id}', 'TodoController@delete')->name('delete_task');
Route::post('update_status/{id}', 'TodoController@update_status')->name('update_status');

