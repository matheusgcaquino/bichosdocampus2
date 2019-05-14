@extends('adminlte::page')

@section('title', 'Configuração do Animal - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>
                <center>Configuração de {{$nome}}</center> 
                <a href="{{route('site.config')}}" class="btn btn-default">
                    <span class="fa fa-angle-double-left"></span>
                    Voltar
                </a>
            </h3>
        </div>

        <div class="box-body">
            @if(!$results->isEmpty())
                @if ($nome != 'Raça')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>{{$nome}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->id}}</td>
                                    <td>{{$result->text}}</td>
                                    <td class="pull-right">
                                        <button type="button" class="btn btn-primary" 
                                            data-toggle="modal" data-target="#editar"  
                                            data-solict-id="{{$result->id}}"
                                            data-solict-text="{{$result->text}}"
                                            data-solict-tipo='editar'>
                                            <b>Editar</b>
                                        </button>
                                        <button type="button" class="btn btn-danger" 
                                            data-toggle="modal" data-target="#excluir"  
                                            data-solict-id="{{$result->id}}"
                                            data-solict-text="{{$result->text}}"
                                            data-solict-tipo='excluir'>
                                            <b>Excluir</b>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Espécie</th>
                                <th>Raça</th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->id}}</td>
                                    <td>{{$result->especie->especie}}</td>
                                    <td>{{$result->text}}</td>
                                    <td class="pull-right">
                                        <button type="button" class="btn btn-primary" 
                                            data-toggle="modal" data-target="#editar"  
                                            data-solict-id="{{$result->id}}"
                                            data-solict-text="{{$result->text}}"
                                            data-solict-tipo='editar'>
                                            <b>Editar</b>
                                        </button>
                                        <button type="button" class="btn btn-danger" 
                                            data-toggle="modal" data-target="#excluir"  
                                            data-solict-id="{{$result->id}}"
                                            data-solict-text="{{$result->text}}"
                                            data-solict-tipo='excluir'>
                                            <b>Excluir</b>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                @endif
            @else
                <center><h3>Nenhuma registro encontrado!</h3></br>
            @endif
        </div>

        <div class="box-footer">
            <div class="pull-right">
                {{$results->links()}}
            </div>
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

                <form action="{{route('config.animal.excluir')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal_excluir">
                        <input type="hidden" id="idExcluir" name="idExcluir">
                        <input type="hidden" name="tipo" value="{{$tipo}}">
                        <h3>
                            ATENÇÃO: Você não poderar deletar essa {{$nome}} se houver
                            algum alnimal designada a ela.
                        </h3>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" 
                            data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline">Confirmar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <div class="modal modal-default fade" id="editar" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>

                <form action="{{route('config.animal.editar')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal_editar">
                        <input type="hidden" id="idEditar" name="idEditar">
                        <input type="hidden" name="tipo" value="{{$tipo}}">

                        <div class="form-group">
                            <label>Conteúdo </label>
                            <input type="text" class="form-control" id="text-editar" name="text">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" 
                            data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop

@section('js')
<script>
        $('#excluir').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var text = button.data('solict-text')
            var id = button.data('solict-id')
            var modal = $(this)
            modal.find('.modal-title').text("Deseja excluir " + text + "?")
            $('#idExcluir').val(id)
        });

        $('#editar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var text = button.data('solict-text')
            var id = button.data('solict-id')
            var modal = $(this)
            modal.find('.modal-title').text("Editar " + text)
            $('#idEditar').val(id)
            $('#text-editar').val(text)
        });
    </script>
@stop