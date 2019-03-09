<?php

Route::prefix('animais')->group(function(){
    //Rotas publicas
    Route::group(['namespace' => 'Animais\Publico'], function(){
        Route::get('/', 'AnimaisController@index')->name('site.animais');
        Route::get('/buscar/{buscar}', 'AnimaisController@buscar')->where(['buscar' => '[a-z]+'])
                                                                  ->name('buscar.animais');
    });
    
    //Rotas Restritas
    Route::group(['middleware' => ['auth'], 'namespace' => 'Animais\Restrito'], function(){
        Route::post('/editar/atualizar', 'EditAnimalController@atualizar')
                ->name('atualizar.animais'); 
        Route::post('/deletar', 'DeleteAnimalController@deletar')->name('deletar.animais');
        Route::post('/adicionar/add', 'AddAnimalController@adicionar')->name('adicionar.animais');
        Route::get('/adicionar', 'AddAnimalController@index')->name('adicionar.animais.index');
        Route::get('/editar/{id}', 'EditAnimalController@index')->where(['id' => '[0-9]+'])
                                                                ->name('editar.animais.index');
    });

});