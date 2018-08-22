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

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->namespace('Admin')->group(function(){
        Route::prefix('restaurantes')->group(function(){
            Route::get('/', 'RestauranteController@index')->name('restaurante.index');
            Route::get('new', 'RestauranteController@create')->name('restaurante.new');
            Route::get('edit/{restaurante}', 'RestauranteController@edit')->name('restaurante.edit');
            Route::post('store', 'RestauranteController@store')->name('restaurante.store');
            Route::post('update/{id}', 'RestauranteController@update')->name('restaurante.update');
            Route::post('remove/{id}', 'RestauranteController@destroy')->name('restaurante.destroy');
        });
        Route::prefix('users')->group(function(){
            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('new', 'UserController@create')->name('user.new');
            Route::get('edit/{user}', 'UserController@edit')->name('user.edit');
            Route::post('store', 'UserController@store')->name('user.store');
            Route::post('update/{id}', 'UserController@update')->name('user.update');
            Route::post('remove/{id}', 'UserController@destroy')->name('user.destroy');
        });
        Route::prefix('menus')->group(function(){
            Route::get('/', 'MenuController@index')->name('menu.index');
            Route::get('new', 'MenuController@create')->name('menu.new');
            Route::get('edit/{menu}', 'MenuController@edit')->name('menu.edit');
            Route::post('store', 'MenuController@store')->name('menu.store');
            Route::post('update/{id}', 'MenuController@update')->name('menu.update');
            Route::post('remove/{id}', 'MenuController@destroy')->name('menu.destroy');
        });
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
