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
  $this->get('admin/animais/adicionar', 'AddAnimalController@index')->name('admin.animais.adicionar');
  $this->get('admin/animais/editar', 'EditAnimalController@index')->name('admin.animais.editar');
  $this->get('admin/animais/ver', 'AnimaisController@index')->name('admin.animais');
  $this->get('admin', 'AdminController@index')->name('admin.home');
});

$this->get('/', 'Site\SiteController@index')->name('home');

Auth::routes();
