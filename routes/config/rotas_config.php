<?php

Route::prefix('config')->group(function(){
    //Rotas Restritas
    Route::group(['middleware' => ['auth', 'CheckNivel:0'], 'namespace' => 'Config'], function(){ 
        Route::get('/', 'ConfigController@index')->name('site.config');
        Route::get('/box/{tipo}', 'BoxController@index')->name('config.box');

        Route::get('/modalEditar/{tipo}', 'BoxController@editar')->name('config.modal.editar');
        Route::get('/modalExcluir/{tipo}', 'BoxController@excluir')->name('config.modal.excluir');

        Route::post('/excluir', 'ConfigController@excluir')->name('config.excluir');
        Route::post('/editar', 'ConfigController@editar')->name('config.editar');
    });

});