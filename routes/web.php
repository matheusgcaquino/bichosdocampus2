<?php

    //Rotas Principais
Route::group(['namespace' => 'Site'], function(){
  Route::get('/', 'SiteController@index')->name('home');
  Route::fallback('_404Controller@index');

});

    //Rotas de Animais
include "animais/rotas_animais.php";

    //Rotas de Adoções
include "adoções/rotas_adoções.php";

    //Rotas de Usuarios
include "usuarios/rotas_usuarios.php";

    //Rotas de Configurações
include "config/rotas_config.php";

    //Rotas de Configurações
include "divulgações/rotas_divulgações.php";

Auth::routes();
