<?php

Route::prefix('config')->group(function(){
    //Rotas Restritas
    Route::group(['middleware' => ['auth', 'CheckNivel:0'], 'namespace' => 'Config'], function(){ 
        Route::get('/', 'ConfigController@index')->name('site.config');

        Route::get('/animal/{tipo}', 'AnimalController@index')->name('config.animal');
        Route::post('/animal_excluir', 'AnimalController@excluir')->name('config.animal.excluir');
        Route::post('/animal_editar', 'AnimalController@editarSobre')->name('config.animal.editar');


        Route::get('/pagina_inicial/{tipo}', 'PaginaInicialController@index')
        ->name('config.paginaInicial');
        Route::post('/pagina_inicial_excluir', 'PaginaInicialController@excluir')
        ->name('config.paginaInicial.excluir');
        Route::post('/pagina_inicial_selecionar', 'PaginaInicialController@selecionar')
        ->name('config.paginaInicial.selecionar');
        Route::post('/pagina_inicial_adicionar', 'PaginaInicialController@adicionar')
        ->name('config.paginaInicial.adicionar');
    });

});