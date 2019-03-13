
@extends('adminlte::page')

@section('title', 'Requisitar Adoção - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3><b>REQUERIMENTO DE ADOÇÃO</b></h3>
        </div>
        <form action="{{route('adotar.form')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id_animal" value="{{$results->id_animal}}">
            <div class="box-body">
           <h4><b>SEJA BEM-VINDO (A)</b> AO NOSSO PROCESSO DE ADOÇÃO.</h4>
            <h4>PARA PROSSEGUIR COM O PROCESSO DE ADOÇÃO CLIQUE NO BOTÃO <b>CONTINUAR</b>,
            EM SEGUIDA PREENCHA O FORMULÁRIO COM SEUS DADOS.</h4>
            <h4>SEUS DADOS SERÃO ANÁLISADOS E ENTRAREMOS EM CONTATO. VOCÊ RECEBERÁ UM E-MAIL
            CONFIRMANDO SEU REQUERIMENTO E PODERÁ ACOMPANHAR O ANDAMENTO DA SUA SOLICITAÇÃO.</h4>
            </div>
    
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Continuar</button>
                <a href="{{route('site.animais')}}" class="btn btn-default">Cancelar</a>
            </div>
        </form>
    </div>
@stop