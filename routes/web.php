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

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){  
  $this->post('animais/ver', 'DeleteAnimalController@deletar')->name('deletar.animais');
  $this->post('animais/adicionar', 'AddAnimalController@adicionar')->name('adicionar.animais');
  $this->get('animais/adicionar', 'AddAnimalController@index')->name('admin.animais.adicionar');
  $this->post('/', 'EditAnimalController@atualizar')->name('atualizar.animais');
  $this->get('animais/editar/{id}', 'EditAnimalController@index')->name('admin.animais.editar');
});

$this->group(['namespace' => 'Site'], function(){
  $this->get('/', 'SiteController@index')->name('site.home');
  $this->get('/animais/ver', 'AnimaisController@index')->name('site.animais');
  $this->get('/animais/adocao', 'FormAdocaoController@index')->name('site.adocao');
});

Auth::routes();
