@extends('adminlte::page')

@section('title', 'Inscrição - Bichos do Campus')

@section('content_header')
@stop

@section('content')

  <!-- Mensagem de Alerta -->
  @include('site.includes.alerts')

  <div class="box">

    <div class="box-header">
      <h3>
        <center>
          Cancelar <strong>Inscrição</strong>
        </center>
      </h3>
 

    <div class="box-body">
    <center>
    <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="email" class="form-control" id="email" placeholder="Informe o e-mail de cadastro">
                </div>
    <div class="checkbox">
          <label>
              <input type="checkbox">
                    <b>Desejo não receber mais e-mails da Bichos do Campus.</b>
          </label>
    </div>
    </center>
    </div>
    
  </div>  
@stop