<?php

Route::prefix('divulgações')->group(function(){
    //Rotas Admin
    Route::group(['middleware' => ['auth', 'CheckNivel:0'], 'namespace' => 'Divulgações\Admin'], function(){
        Route::get('/', 'DivulgaçõesController@index')->name('site.divulgações');
    });
});

Route::prefix('divulgar')->group(function(){
    //Rotas Parceiro
    Route::group(['middleware' => ['auth', 'CheckNivel:2'], 'namespace' => 'Divulgações\Parceiro'], function(){
        Route::get('/', 'DivulgarController@index')->name('site.divulgar');
    });

});