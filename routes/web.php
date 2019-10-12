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

Route::get('/', 'RenderController@getLogin');

Route::get('/admin', 'RenderController@getAdmin');

Route::get('/preview', 'RenderController@generatePDF');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


// CRUD

Route::GET('/condominios', 'CondominioController@getComdominios');
Route::GET('/condominios/{id}', 'CondominioController@getInmuebles');
Route::POST('/condominios', 'CondominioController@create');

