@extends('adminlte::page')

@section('title', 'Editar Animal - Bichos do Campus')

@section('content_header')
@stop

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Editar Animal</h3>
    </div>
    
    <div class="box-body">
      <div class="form-group col-md-6">
        <label for="name">Nome </label>
        <input type="text" class="form-control" id="name" placeholder="Nome do Animal" value="Frajola">
      </div>
      
      <div class="form-group col-md-6">
        <label for="race">Raça </label>
        <input type="text" class="form-control" id="race" placeholder="Raça do Animal" value="Gato">
      </div>
      
      <div class="form-group col-md-6">
        <label for="race">Idade </label>
        <input type="text" class="form-control" id="idade" placeholder="Idade do Animal" value="6 meses">
      </div>
      
      <div class="form-group col-md-6">
        <label>Pelagem</label>
        <textarea class="form-control" rows="2" id="pelagem" 
        placeholder="Pelagem do Animal">Pelagem mista de preto e branco.</textarea>
      </div>

      <div class="form-group col-md-6">
        <label>Comportamento</label>
        <textarea class="form-control" rows="2" id="comportamento" 
        placeholder="Comportamento do Animal">Dócil</textarea>
      </div>

      <div class="form-group col-md-6">
          <label>Descrição</label>
          <textarea class="form-control" rows="3" id="descricao" 
          placeholder="Descrição do Animal">Pequeno.</textarea>
      </div>

      <div class="form-group col-md-6">
        <label>Sexo</label>
        <div class="radio">
          <label>
            <input type="radio" name="sexo" id="sexo1" value="macho" checked="">
            Macho
          </label>
        </div>
        
        <div class="radio">
          <label>
            <input type="radio" name="sexo" id="sexo2" value="femea">
            Fêmea
          </label>
        </div>
      </div>

      <div class="form-group col-md-6">
        <label>Castrado</label>
        <div class="radio">
          <label>
            <input type="radio" name="castrado" id="castrado1" value="True" checked="">
            Sim
          </label>
        </div>
        
        <div class="radio">
          <label>
            <input type="radio" name="castrado" id="castrado2" value="False">
            Não
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="pull-left">
            <img class="profile-user-img img-responsive img-circle" 
            src="{{asset('images/gato7.jpg')}}" alt="User profile picture">
        </div>
          <label for="foto">Alterar Imagem</label>
          <input type="file" id="foto">
      </div>

    </div>
    
    <div class="box-footer with-border">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <button type="submit" class="btn btn-default">Cancel</button> 
    </div>
  
  </div>
  </section>
@stop
