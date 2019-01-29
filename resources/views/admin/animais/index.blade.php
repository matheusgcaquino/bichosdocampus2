@extends('adminlte::page')

@section('title', 'Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Perfil dos Animais</h3>
        <div class="form-group pull-right">
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Buscar">
          </div>
        </div>
      </div>
      <div class="box-body">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('images/gato7.jpg')}}" alt="User profile picture">

              <h3 class="profile-username text-center">Frajola</h3>

              <p class="text-muted text-center">Gato Munchkin</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Sexo</b> <a class="pull-right">Macho</a>
                </li>
                <li class="list-group-item">
                  <b>Castrado</b> <a class="pull-right">SIM</a>
                </li>
                <li class="list-group-item">
                  <b>Idade</b> <a class="pull-right">5 meses</a>
                </li>

              </ul>
              <a href="animais/perfil" class="btn btn-success btn-block"><b>+ Mais Informaçoes</b></a>
              <a href="animais/editar" class="btn btn-primary btn-block"><b>Editar</b></a>
              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-danger">
                <b>Excluir</b>
              </button>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('images/gato6.jpg')}}" alt="User profile picture">

              <h3 class="profile-username text-center">Arya Stark</h3>

              <p class="text-muted text-center">Gato Munchkin</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Sexo</b> <a class="pull-right">Fêmea</a>
                </li>
                <li class="list-group-item">
                  <b>Castrado</b> <a class="pull-right">SIM</a>
                </li>
                <li class="list-group-item">
                  <b>Idade</b> <a class="pull-right">3 meses</a>
                </li>

              </ul>

              <a href="animais/perfil" class="btn btn-success btn-block"><b>+ Mais Informaçoes</b></a>
              <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-danger">
                <b>Excluir</b>
              </button>
            </div>
          </div>
        </div>
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
            <p>Deseja excluir X animal?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-outline">Confirmar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </section>
@stop
