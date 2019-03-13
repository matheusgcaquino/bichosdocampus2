<?php

Route::prefix('usuários')->group(function(){
    //Rotas Publicas
    Route::group(['namespace' => 'Usuarios\Publico'], function(){
        Route::get('novo/convidado/{key}', 'NovoUsuarioController@convidado')
            ->name('novo.usuarios.convidado');
        Route::post('novo/convidado/adicionar', 'NovoUsuarioController@add_convidado')
            ->name('novo.usuarios.convidado.adicionar');
    });

    //Rotas Restritas
    Route::group(['middleware' => ['auth', 'CheckNivel:0'], 'namespace' => 'Usuarios\Restrito'], function(){ 
        Route::get('/', 'UsuariosController@index')->name('site.usuarios');

        Route::get('novo/agora', 'NovoUsuarioController@agora')->name('novo.usuarios.agora');
        Route::get('novo/convite', 'NovoUsuarioController@convite')->name('novo.usuarios.convite');
        Route::post('novo/adicionar', 'NovoUsuarioController@adicionar')
            ->name('novo.usuarios.adicionar');
        Route::post('novo/convidar', 'NovoUsuarioController@convidar')
            ->name('novo.usuarios.convidar');
        
        Route::post('deletar', 'DeleteUsuarioController@index')->name('deletar.usuarios');
        Route::post('editar', 'EditUsuarioController@index')->name('editar.usuarios');
    });

});