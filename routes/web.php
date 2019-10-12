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

Route::get('/gastos', 'RenderController@getGastos');

Route::get('/access', 'RenderController@accessView');

Route::get('/registrar-condominio', 'RenderController@registerCodom');
Route::get('/registrar-gasto', 'RenderController@registerExpenses');
Route::get('/inmuebles', 'RenderController@estates');

Auth::routes();


// CRUD

Route::GET('/condominios', 'CondominioController@getComdominios');
Route::GET('/condominios/{id}', 'CondominioController@getInmuebles');
Route::GET('/proveedores/{id}', 'CondominioController@getProveedores');
Route::POST('/condominios', 'CondominioController@create');

