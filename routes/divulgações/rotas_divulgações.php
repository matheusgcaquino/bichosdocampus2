<?php


Route::prefix('divulgações')->group(function(){
    //Rotas Admin
    Route::group(['middleware' => ['auth', 'CheckNivel:0'], 'namespace' => 'Divulgações\Admin'], function(){
        Route::get('/', 'DivulgaçõesController@index')->name('site.divulgações');
    });

    ///Rotas Publico
    Route::group(['namespace' => 'Divulgações\Publico'], function(){
        Route::get('inscrições', 'InscriçãoController@index')->name('site.inscrições');
        Route::post('/inscrições/cancelar', 'InscriçãoController@cancelar')
            ->name('inscrições.cancelar'); 
    });
});

Route::prefix('divulgar')->group(function(){
    //Rotas Parceiro
    Route::group(['middleware' => ['auth', 'CheckNivel:2'], 'namespace' => 'Divulgações\Parceiro'], function(){
        Route::get('/', 'DivulgarController@index')->name('site.divulgar');
    });

});