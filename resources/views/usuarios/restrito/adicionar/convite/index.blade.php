@extends('adminlte::page')

@section('title', 'Convidar Usuário - Bichos do Campus')

@section('content_header')
@stop

@section('content')

  <div class="box">
    <form action = "{{ route('novo.usuarios.convidar') }}" method="POST" autocomplete="off" id="formulario">
        {{ csrf_field() }}
        <div class="box-header">
            <h3 class="box-title">CONVIDAR NOVO USUÁRIO</h3>
        </div>
        
        <!-- Mensagem de Alerta -->
        @include('site.includes.alerts')

        <div class="box-body">

            <div class="form-group col-md-6">
                <label for="email"> E-mail </label>
                <input type="text" class="form-control" name="email" autocomplete="off" required>
            </div>
            
            <div class="form-group col-md-6">
                <label> Nivel de Acesso </label>
                <select class="form-control" name="nivel">
                    <option value="0">Administrador</option>
                    <option value="1">Gerência</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label> Status </label>
                <select class="form-control" name="status">
                    <option value="1">Ativado</option>
                    <option value="0">Desativado</option>
                </select>
            </div>
        </div>
         
        <div class="box-footer with-border">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{route('site.usuarios')}}" class="btn btn-default">Cancelar</a> 
        </div>
    </form>
  </div>
@stop
