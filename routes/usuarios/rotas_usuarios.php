<?php

Route::prefix('usuários')->group(function(){
    //Rotas do Administrador
    Route::group(['middleware' => ['auth'], 'namespace' => 'Usuarios'], function(){ 
        Route::get('/', 'UsuariosController@index')->name('site.usuarios');
    });

});