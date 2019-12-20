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

Route::group(['prefix' => 'admin'], function() {
  Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
  Route::post('news/create','Admin\NewsController@create')->middleware('auth');
#PHP/Laravel 15 [Routingを実装する]で追記
  Route::get('news', 'Admin\NewsController@index')->middleware('auth');  
});
#PHP/Laravel 16 [View を実装する]で追記
  Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');
  Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
#PHP/Laravel 16 [Routingを実装する]で追記
  Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');  

#課題３
Route::get('admin/XXX/', 'Admin\AAAController@bbb');

#課題４
  Route::group(['prefix' => 'admin'], function() {
  Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
  Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
  Route::get('profile', 'Admin\ProfileController@index')->middleware('auth');   
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#PHP/Laravel 13で追記
Route::group(['prefix' => 'admin','middleware' => 'auth'],function() {
     Route::get('news/create','Admin\NewsController@add');
     Route::post('news/create','Admin\NewsController@create');
  
});

#PHP/Laravel 13 【応用３】
Route::group(['prefix' => 'admin','middleware' => 'auth'],function() {
     Route::get('profile/create','Admin\ProfileController@add');  
     Route::post('profile/create','Admin\ProfileController@create');
});
#PHP/Laravel 13 【応用６】
Route::group(['prefix' => 'admin','middleware' => 'auth'],function() {
     Route::get('profile/edit','Admin\ProfileController@add');  
     Route::post('profile/edit','Admin\ProfileController@update');
});
