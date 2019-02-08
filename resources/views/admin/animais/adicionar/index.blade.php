@extends('adminlte::page')

@section('title', 'Adicionar Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')

<form action = "{{ route('adicionar.animais') }}" method="POST" enctype="multipart/form-data">

  {{ csrf_field() }}

  <section class="content">
    <div class="box">

      <div class="box-header">
        <h3 class="box-title"> Adicinar Novos Animais </h3>
      </div>
      
      <!-- Mensagem de Alerta -->
      @include('admin.includes.alerts')

      <div class="box-body">

        <div class="form-group col-md-6">
          <label for="nome"> Nome </label>
          <input type="text" class="form-control" name="nome" placeholder="Nome do Animal">
        </div>

        <div class="form-group col-md-6">
            <label for="especie"> Especie </label>
            <input type="text" class="form-control" name="especie" placeholder="Especie do Animal">
          </div>
        
        <div class="form-group col-md-6">
          <label for="raca"> Raça </label>
          <input type="text" class="form-control" name="raca" placeholder="Raça do Animal">
        </div>
        
        <div class="form-group col-md-6">
          <label> Idade </label><br>

          <div class="form-input col-md-3">
            <input type="number" placeholder="Meses" min="0" class="form-control" name="numeromeses">
          </div>

          <div class="form-input col-md-3">
              <input type="number" placeholder="Anos" min="0" class="form-control" name="numeroano">
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
        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-danger"> Enviar </button>
        <button type="button" onclick="window.location='{{ route ('site.home') }}'" class="btn btn-default"> Cancel </button> 
      </div>
    
    </div>

    <div class="modal modal-danger fade" id="modal-danger" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Excluir animal</h4>
            </div>
            <div class="modal-body">
              <p> Deseja adicionar o animal? </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline"> Confirmar </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

  </section>

</form>
@stop
