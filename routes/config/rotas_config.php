<?php

Route::prefix('config')->group(function(){
    //Rotas Restritas
    Route::group(['middleware' => ['auth', 'CheckNivel:0'], 'namespace' => 'Config'], function(){ 
        Route::get('/', 'ConfigController@index')->name('site.config');
    });

});