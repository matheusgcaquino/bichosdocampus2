@extends('adminlte::page')

@section('title', 'Configuração da Pagina Inicial - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>
                <center>Configuração de <b>Quem somos</b></center> 
                <a href="{{route('site.config')}}" class="btn btn-danger">
                    <span class="fa fa-arrow-circle-left"></span>
                    Voltar
                </a>
            </h3>
        </div>
        <form action="{{route('config.paginaInicial.editar')}}" method="POST">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                <textarea id="product-body" name="text" class="form-control">
                    {{$results->sobre}}
                </textarea>                      
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </form>
    </div>

    
@stop

@section('js')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    
    <script>
        CKEDITOR.replace('product-body', {
            extraPlugins: 'autogrow',
            autoGrow_maxHeight: 400,
            autoGrow_minHeight: 200,
            removePlugins: 'resize'
        });
    </script>
@append