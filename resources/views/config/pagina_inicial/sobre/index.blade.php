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
                    <textarea id="editor1" name="text" class="form-control"
                    rows="10" cols="80">{{$results->sobre}}</textarea>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </form>
    </div>
@stop

@section('js')
    <!-- Bootstrap WYSIHTML5 -->
    <script href="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>

    {{-- <script href="{!! asset('js/ckeditor.js') !!}"></script> --}}

    <script>
        $(function () {
            // CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@stop

@section('css')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}">
@stop