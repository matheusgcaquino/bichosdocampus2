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

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){ 
  Route::post('animais/editar/atualizar', 'EditAnimalController@atualizar')->name('atualizar.animais'); 
  Route::post('animais/deletar', 'DeleteAnimalController@deletar')->name('deletar.animais');
  Route::post('animais/adicionar', 'AddAnimalController@adicionar')->name('adicionar.animais');
  Route::get('animais/adicionar', 'AddAnimalController@index')->name('adicionar.animais.index');
  Route::get('animais/editar/{id}', 'EditAnimalController@index')->name('editar.animais.index');
});

Route::group(['namespace' => 'Site'], function(){
  Route::get('/', 'SiteController@index')->name('home');
  Route::any('animais/buscar', 'AnimaisController@buscar')->name('buscar.animais');
  Route::post('animais/adotar', 'AdotarAnimalController@adotar')->name('adotar.animais');
  Route::get('animais', 'AnimaisController@index')->name('site.animais');
  Route::get('animais/adocao', 'FormAdocaoController@index');
  Route::fallback('_404Controller@index');
});

Auth::routes();
