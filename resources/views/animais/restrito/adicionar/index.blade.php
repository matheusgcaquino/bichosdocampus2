@extends('adminlte::page')

@section('title', 'Adicionar Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')
  <!-- Mensagem de Alerta -->
  @include('site.includes.alerts')
  
  <div class="box">

    <form action = "{{ route('adicionar.animais') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="box-header">
        <h3 class="box-title">ADICIONAR ANIMAL</h3>
      </div>

      <div class="box-body">

        <div class="form-group col-md-6">
          <label for="nome"> Nome  <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" name="nome" placeholder="Nome do Animal"
          autofocus required>
        </div>

        <div class="form-group col-md-6">
          <label for="especie"> Espécie <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" name="especie" placeholder="Especie do Animal">
        </div>
        
        <div class="form-group col-md-6">
          <label for="raca"> Raça <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" name="raca" placeholder="Raça do Animal" required>
        </div>
        
        <div class="form-group col-md-6">
          <label> Idade </label><br>
          <div class="form-input col-md-3">
            <input type="number" placeholder="Anos" min="0" class="form-control" name="numeroano">
          </div>
        
          <div class="form-input col-md-3">
            <input type="number" placeholder="Meses" min="0" class="form-control" name="numeromeses">
          </div> 
        </div>
        
        <div class="form-group col-md-6">
          <label for="pelagem"> Pelagem <font color="red"> * <font color="black"> </label>
          <input class="form-control" rows="2" name="pelagem" 
            placeholder="Pelagem do Animal" required></textarea>
        </div>

        <div class="form-group col-md-6">
          <label for="comportamento"> Comportamento <font color="red"> * <font color="black"> </label>
          <input class="form-control" rows="2" name="comportamento" 
            placeholder="Comportamento do Animal" required></textarea>
        </div>

        <div class="form-group col-md-6">
          <label for="descricao"> Descrição </label>
          <input class="form-control" rows="3" name="descricao" 
            placeholder="Descrição do Animal"></textarea>
        </div>

        <div class="form-group col-md-6">
          <label for="sexo"> Sexo </label>
          <div class="radio">
            <label>
              <input type="radio" name="sexo" value="M" checked=""> Macho
            </label>
          </div>
          
          <div class="radio">
            <label>
              <input type="radio" name="sexo" value="F"> Fêmea
            </label>
          </div>
        </div>

        <div class="form-group col-md-6">
          <label> Castrado </label>
          <div class="radio">
            <label>
              <input type="radio" name="castrado" value="1" checked=""> Sim
            </label>
          </div>
          
          <div class="radio">
            <label>
              <input type="radio" name="castrado" value="0"> Não
            </label>
          </div>
        </div>

        <div class="form-group col-md-6">
          <label> Status </label>
          <select class="form-control" name="status">
            <option value="1">Ativado</option>
            <option value="0">Desativado</option>
          </select>
        </div>

        <div class="form-group">
            <div class="pull-left">
                <img class="profile-user-img img-circle" 
                src="{{asset('images/foto-icon.png')}}" alt="User profile picture">
            </div>
            <div class="pull-left" style="margin-left: 1%">
            <label for="foto"> Adicionar Imagem </label>
            <input type="file" name="foto">
            </div>
        </div>
      </div>      
      <div class="box-footer with-border">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{route('site.animais')}}" class="btn btn-default">Cancelar</a> 
      </div>
    </form>
  </div>
@stop
