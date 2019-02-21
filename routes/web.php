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
Route::group(['namespace' => 'Site'], function(){
  Route::get('/', 'SiteController@index')->name('home');
  Route::fallback('_404Controller@index');
    
  });

Route::prefix('animais')->group(function(){
  Route::group(['namespace' => 'Site'], function(){
    Route::get('/', 'AnimaisController@index')->name('site.animais');
    
    Route::get('/buscar/{buscar}', 'AnimaisController@buscar')->where(['buscar' => '[a-z]+'])
          ->name('buscar.animais');
    Route::post('/adotar', 'AdotarAnimalController@adotar')->name('adotar.animais');
    Route::get('/adocao', 'FormAdocaoController@index');
  });
  
  Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){ 
    Route::post('/editar/atualizar', 'EditAnimalController@atualizar')->name('atualizar.animais'); 
    Route::post('/deletar', 'DeleteAnimalController@deletar')->name('deletar.animais');
    Route::post('/adicionar', 'AddAnimalController@adicionar')->name('adicionar.animais');
    Route::get('/adicionar', 'AddAnimalController@index')->name('adicionar.animais.index');
    Route::get('/editar/{id}', 'EditAnimalController@index')->name('editar.animais.index');
  });

});

Auth::routes();
