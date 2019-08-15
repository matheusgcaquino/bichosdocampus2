@extends('adminlte::page')

@section('title', 'Divulgações - Bichos do Campus')

@section('content_header')
@stop

@php
  use App\Http\Controllers\Suporte\DataController; 
@endphp

@section('content')

  <!-- Mensagem de Alerta -->
  @include('site.includes.alerts')

  <div class="box">

    <div class="box-header">
      <h3>
        <center>
          Divulgações <strong>de Parcerias</strong>
        </center>
      </h3>
    </div>

    <div class="box-body">
     
        @if (!$results->isEmpty())
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Parceiro</th>
                <th>Data</th>
                <th>Enviado</th>
                <th class="pull-right"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($results as $result)
                <tr>
                  <td>{{$result->user->name_user}}</td>
                  <td>{{DataController::diaFormat($result->created_at)}}</td>
                  <td>{{$result->enviado}}</td>
                  <td class="pull-right">
                    <button type="button" class="btn btn-success" 
                      data-toggle="modal" data-target="#enviar"  
                      data-solict-id="{{$result->id_divulgacao}}"
                      data-solict-conteudo="{{$result->conteudo}}">
                      <span class="fa fa-paper-plane"></span>
                      <b>Enviar</b>
                    </button>
                    <button type="button" class="btn btn-danger" 
                      data-toggle="modal" data-target="#excluir"  
                      data-solict-id="{{$result->id_divulgacao}}">
                      <span class="fa fa-trash"></span>
                      <b>Excluir</b>
                    </button>
                  </td>
                </tr>   
              @endforeach
            </tbody>
          </table>
        @else
          <div class="alert alert-warning">
            <h3>
              <center>
                Não há divulgações cadastradas!
              </center>
            </h3>
          </div>
        @endif
    </div>
  </div>  

  <!-- Modais -->
  <div class="modal modal-danger fade" id="excluir" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="exampleModalLabel"></h4>
        </div>
        <form action="{{route('divulgações.excluir')}}" method="POST">
          {{ csrf_field() }}
          <div class="modal-body" id="modal_excluir">
            <input type="hidden" id="idExcluir" name="idExcluir">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" 
                data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline">Confirmar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal modal-default fade" id="enviar" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="exampleModalLabel"></h4>
        </div>
        <form action="{{route('divulgações.enviar')}}" method="POST">
          {{ csrf_field() }}
          <div class="modal-body">
            {{-- <textarea class="form-control" id="texto" name="texto" disabled></textarea> --}}
            <input type="hidden" id="idEnviar" name="idEnviar">
            <div id="texto"></div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" 
                data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop

@section('js')
  <script>
    $('#excluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('solict-id')
        var modal = $(this)
        modal.find('.modal-title').text("Deseja excluir essa mensagem?")
        $('#idExcluir').val(id)
    });

    $('#enviar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var texto = button.data('solict-conteudo')
        var id = button.data('solict-id')
        var modal = $(this)
        modal.find('.modal-title').text("Enviar Mensagem")
        var divulgacao = document.getElementById("texto");
        divulgacao.innerHTML = texto
        $('#idEnviar').val(id)
    });
  </script>
@stop
