<?php

Route::prefix('animais')->group(function(){
    //Rotas publicas
    Route::group(['namespace' => 'Animais\Publico'], function(){
        Route::get('/', 'AnimaisController@index')->name('site.animais');
        Route::get('/ajax_buscar', 'BuscarController@index')->name('buscar.ajax');
        Route::get('/ajax_raca/{especie}', 'BuscarController@raca')->name('raca.ajax');
        Route::post('/buscar', 'BuscarController@buscar')->name('buscar.animais');
    });
    
    //Rotas Restritas
    Route::group(['middleware' => ['auth', 'CheckNivel:1'], 'namespace' => 'Animais\Restrito'], function(){
        Route::post('/editar/atualizar', 'EditAnimalController@atualizar')
            ->name('atualizar.animais'); 
        Route::post('/deletar', 'DeleteAnimalController@deletar')->name('deletar.animais');
        Route::post('/adicionar/add', 'AddAnimalController@adicionar')->name('adicionar.animais');
        Route::get('/adicionar', 'AddAnimalController@index')->name('adicionar.animais.index');
        Route::get('/editar/{id}', 'EditAnimalController@index')->where(['id' => '[0-9]+'])
            ->name('editar.animais.index');
    });

});