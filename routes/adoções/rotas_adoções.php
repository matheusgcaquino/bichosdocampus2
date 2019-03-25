<?php

Route::prefix('adoções')->group(function(){
    //Rotas Publicas
    Route::group(['namespace' => 'Adoções\Publico'], function(){
        Route::post('info', 'AdotarAnimalController@index')->name('adotar.info');
        Route::post('info/form', 'AdotarAnimalController@form')->name('adotar.form');
        Route::post('info/form/adotar', 'AdotarAnimalController@adotar')->name('adotar.animal');
        Route::get('requisição/{codigo}', 'RequisiçãoController@index')
            ->name('adocoes.requisição');
    });
    
    //Rotas Restritas
    Route::group(['middleware' => ['auth', 'CheckNivel:1'], 'namespace' => 'Adoções\Restrito'], function(){
        Route::get('/', 'AdoçõesController@index')->name('site.adocoes');
        Route::get('/{id}', 'RequisiçõesController@index')->where(['id' => '[0-9]+'])
            ->name('adocoes.requisições');
        Route::get('buscar/{buscar}', 'AdoçõesController@buscar')->name('adocoes.buscar');
        Route::post('requisição/status', 'StatusController@index')->name('requisição.status');
    });
});