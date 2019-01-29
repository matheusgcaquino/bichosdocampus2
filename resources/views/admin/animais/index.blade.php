@extends('adminlte::page')

@section('title', 'Animais - Bichos do Campus')

@section('content_header')
    <h1>Animais</h1>
@stop

@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Perfil dos Animais</h3>
    </div>
    <div class="box-body">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('images/gato7.jpg')}}" alt="User profile picture">

            <h3 class="profile-username text-center">Frajola</h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Sexo</b> <a class="pull-right">MACHO</a>
              </li>
              <li class="list-group-item">
                <b>Castrado</b> <a class="pull-right">SIM</a>
              </li>
              <li class="list-group-item">
                <b>Vermifulgado</b> <a class="pull-right">SIM</a>
              </li>

            </ul>

            <a href="animais/editar" class="btn btn-primary btn-block"><b>Editar</b></a>
            <a href="#" class="btn btn-danger btn-block"><b>Excluir</b></a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('images/gato6.jpg')}}" alt="User profile picture">

            <h3 class="profile-username text-center">Arya Stark</h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Sexo</b> <a class="pull-right">Fêmea</a>
              </li>
              <li class="list-group-item">
                <b>Castrado</b> <a class="pull-right">SIM</a>
              </li>
              <li class="list-group-item">
                <b>Vermifulgado</b> <a class="pull-right">SIM</a>
              </li>

            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
            <a href="#" class="btn btn-danger btn-block"><b>Excluir</b></a>
          </div>
        </div>
      </div>
    </div>  
  </div>
  </section>
@stop
