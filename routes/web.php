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

Route::get('crud', 'CRUDController@index')->name('crud.index');
Route::group(['namespace' => 'Api', 'prefix' => 'webapi/crud', 'as' => 'webapi.crud.'], function(){
	Route::get('personal', 'CRUDController@index')->name('index');
	Route::post('personal/create', 'CRUDController@create')->name('create');
	Route::patch('personal/update/{info}', 'CRUDController@update')->name('update');
	Route::delete('personal/delete/{info}', 'CRUDController@delete')->name('delete');
});