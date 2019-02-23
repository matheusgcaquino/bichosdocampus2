<?php

Route::prefix('adoções')->group(function(){
    //Rotas do Administrador
    Route::group(['middleware' => ['auth'], 'namespace' => 'Adoções\Admin'], function(){ 
        Route::get('/', 'AdoçõesController@index')->name('site.adocoes');
    });

});
