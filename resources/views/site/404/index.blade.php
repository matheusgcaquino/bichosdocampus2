@extends('adminlte::page')

@section('title', '404 - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="error-page">
                <h2 class="headline text-yellow"> 404</h2>
        
                <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! Página não encontrada.</h3>
        
                    <p>
                        Nós não conseguimos encontrar a página que você estava procurando.
                    Enquanto isso você pode <a href="{{route('home')}}">clicar aqui</a>
                         para retornar para a página princípal.
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
        </div>
    </div>
@stop