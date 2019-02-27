
@extends('adminlte::page')

@section('title', 'Requisitar Adoção - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h4><b>Requerimento de Adoção</b></h4>
        </div>

        <form action="{{route('adotar.form')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id_animal" value="{{$results->id_animal}}">
            <div class="box-body">
           
            </div>
    
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Continuar</button>
                <a href="{{route('site.animais')}}" class="btn btn-default">Cancelar</a>
            </div>
        </form>
    </div>
@stop