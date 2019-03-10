<?php

Route::prefix('adoções')->group(function(){
    //Rotas Publicas
    Route::group(['namespace' => 'Adoções\Publico'], function(){
        Route::post('info', 'AdotarAnimalController@index')->name('adotar.info');
        Route::post('info/form', 'AdotarAnimalController@form')->name('adotar.form');
        Route::post('info/form/adotar', 'AdotarAnimalController@adotar')->name('adotar.animal');
    });
    
    //Rotas Restritas
    Route::group(['middleware' => ['auth', 'CheckNivel:1'], 'namespace' => 'Adoções\Restrito'], function(){
        Route::get('/', 'AdoçõesController@index')->name('site.adocoes');
        Route::get('/{id}', 'RequisiçãoController@index')->where(['id' => '[0-9]+'])
            ->name('adocoes.requisição');
    });

});
