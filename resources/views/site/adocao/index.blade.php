@extends('adminlte::page')

@section('title', 'Fomulário de Adoção - Bichos do Campus')

@section('content_header')
@stop

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Fomulário de Adoção</h3>
    </div>
    
    <div class="box-body">
      <div class="form-group col-md-6">
        <label for="name">Nome Completo </label>
        <input type="text" class="form-control" id="name" placeholder="Nome Completo">
      </div>
      
      <div class="form-group col-md-6">
        <label for="race">Logradouro </label>
        <input type="text" class="form-control" id="logradouro" placeholder="Logradouro">
      </div>
      
      <div class="form-group col-md-6">
        <label for="race">Bairro </label>
        <input type="text" class="form-control" id="bairro" placeholder="Bairro">
      </div>
      
      <div class="form-group col-md-6">
        <label>E-mail</label>
        <input type="text" class="form-control" id="email" placeholder="E-mail">
      </div>

      <div class="form-group col-md-6">
        <label>Telefone </label>
        <div class="input-group">
          <input type="text" class="form-control" id="telefone"
            data-inputmask='"mask": "(999) 999-9999"' data-mask="">
        </div>
        <!-- /.input group -->
      </div>

      <div class="form-group col-md-6">
        <label>Moro em </label>
        <div class="radio">
          <label>
            <input type="radio" name="moro" id="moro1" value="casa" checked="">
            Casa
          </label>
        </div>
        
        <div class="radio">
          <label>
            <input type="radio" name="moro" id="moro2" value="apartamento">
            Apartamento
          </label>
        </div>
      </div>

    </div>
    
    <div class="box-footer with-border">
      <button type="submit" class="btn btn-primary">Enviar</button>
      <button type="submit" class="btn btn-default">Cancel</button> 
    </div>
  
  </div>
  </section>

  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('js/jquery.inputmask.js')}}"></script>
  <script src="{{asset('js/jquery.inputmask.extensions.js')}}"></script>
@stop
