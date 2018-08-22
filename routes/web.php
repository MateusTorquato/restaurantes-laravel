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

Route::prefix('admin')->group(function(){
   Route::get('restaurantes', 'Admin\\RestauranteController@index')->name('restaurante.index');
   Route::get('restaurantes/new', 'Admin\\RestauranteController@create')->name('restaurante.new');
   Route::get('restaurantes/edit/{restaurante}', 'Admin\\RestauranteController@edit')->name('restaurante.edit');
   Route::post('restaurantes/store', 'Admin\\RestauranteController@store')->name('restaurante.store');
   Route::post('restaurantes/update/{id}', 'Admin\\RestauranteController@update')->name('restaurante.update');
   Route::post('restaurantes/remove/{id}', 'Admin\\RestauranteController@destroy')->name('restaurante.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
