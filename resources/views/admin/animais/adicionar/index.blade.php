@extends('adminlte::page')

@section('title', 'Adicionar Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')

<form action = "{{ route('adicionar.animais') }}" method="POST">

  {{ csrf_field() }}

  <section class="content">
    <div class="box">

      <div class="box-header">
        <h3 class="box-title"> Adicinar Novos Animais </h3>
      </div>
      
      <div class="box-body">
        <div class="form-group col-md-6">
          <label for="nome"> Nome </label>
          <input type="text" class="form-control" name="nome" placeholder="Nome do Animal">
        </div>
        
        <div class="form-group col-md-6">
          <label for="raca"> Raça </label>
          <input type="text" class="form-control" name="raca" placeholder="Raça do Animal">
        </div>
        
        <div class="form-group col-md-6">
          <label> Idade </label><br>
          <div class="form-input col-md-3">
            <input type="number" class="form-control" name="numeroidade">
          </div>
          
          <div class="form-input col-md-6">
            <select class="form-control" name="tipoidade">
              <option> Meses </option>
              <option> Ano </option>
            </select>
          </div>
        </div>
        
        <div class="form-group col-md-6">
            <label for="pelagem"> Pelagem </label>
          <input class="form-control" rows="2" name="pelagem" placeholder="Pelagem do Animal"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="comportamento"> Comportamento </label>
          <input class="form-control" rows="2" name="comportamento" placeholder="Comportamento do Animal"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="descricao"> Descrição </label>
            <input class="form-control" rows="3" name="descricao" placeholder="Descrição do Animal"></textarea>
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

        <div class="form-group">
            <div class="pull-left">
                <img class="profile-user-img img-responsive img-circle" 
                src="{{asset('images/cat-profile.png')}}" alt="User profile picture">
            </div>
            <label for="foto"> Adicionar Imagem </label>
            <input type="file" name="foto">
        </div>

      </div>
      
      <div class="box-footer with-border">
        <button type="submit" class="btn btn-primary"> Enviar </button>
        <button type="submit" class="btn btn-default"> Cancel </button> 
      </div>
    
    </div>
  </section>

</form>
@stop
