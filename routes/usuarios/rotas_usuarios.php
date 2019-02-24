<?php

Route::prefix('usuários')->group(function(){
    //Rotas do Administrador
    Route::group(['middleware' => ['auth'], 'namespace' => 'Usuarios'], function(){ 
        Route::get('/', 'UsuariosController@index')->name('site.usuarios');
        Route::get('novo', 'NovoUsuarioController@index')->name('novo.usuarios');
        Route::post('novo/adicionar', 'NovoUsuarioController@adicionar')
            ->name('novo.usuarios.adicionar');
        Route::post('deletar', 'DeleteUsuarioController@index')->name('deletar.usuarios');
    });

});