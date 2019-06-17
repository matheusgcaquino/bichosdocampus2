@extends('adminlte::page')

@section('title', 'Usuários - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
            <div class="box-header" style="text-align: center;">
                <h3>
                    Gerenciamento de <strong>Usuários</strong> 
                    <button  type="button" class="btn btn-success" data-toggle="modal" 
                    data-target="#adicionar">
                        <span class="fa fa-plus"></span> NOVO
                    </button>
                </h3>
                
            </div>
        @include('site.includes.alerts')
        
        <div class="box-header">
            
        </div>
        
        <div class="box-body">
            @if(!$results->isEmpty())
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="background-color: #f1f1f1">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Nivel</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($results as $result)
                            @php
                                ($status_user = $result->status_user == 0 ? 'Desativado'
                                    : 'Ativado');
                                
                                ($nivel_user = $result->nivel_user == 0 ? 'Administrador' 
                                    : 'Gerência');
                                                                
                            @endphp
                        <tr>
                            <td>{{$result->name_user}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{$nivel_user}}</td>
                            <td>{{$status_user}}</td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" 
                                    data-target="#editar" data-solict-id="{{$result->id_user}}" 
                                    data-solict-nivel="{{$result->nivel_user}}" 
                                    data-solict-name="{{ $result->name_user }}" 
                                    data-solict-email="{{ $result->email }}" 
                                    data-solict-status="{{ $result->status_user}}">
                                    <span class="fa fa-edit"></span>
                                </button>
                
                                <button type="button" class="btn btn-danger" data-toggle="modal" 
                                    data-target="#excluir" data-solict-id="{{$result->id_user}}" 
                                    data-solict-name="{{ $result->name_user }}">
                                    <span class="fa fa-minus-circle"></span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            @else
                <center><h3>Nenhuma Adoção encontrada!</h3></br>
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
                    <h4 class="modal-title" id="exampleModalLabel">Deletar Usuário</h4>
                </div>
        
                <form action="{{route('deletar.usuarios')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <h4 id="excluir_frase"></h4>
                        <input type="hidden" name="idUser" id="idUser"/>
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
        
                <form action="{{route('editar.usuarios')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="idUser" id="idUser2"/>
                        
                        <div class="form-group col-md-6">
                            <label for="nome"> Nome  </label>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
            
                        <div class="form-group col-md-6">
                            <label for="email"> E-mail </label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group col-md-6">
                            <label> Nivel de Acesso </label>
                            <select class="form-control" name="nivel" id="nivel">
                                <option value="0">Administrador</option>
                                <option value="1">Gerência</option>
                            </select>
                        </div>
            
                        <div class="form-group col-md-6">
                            <label> Status </label>
                            <select class="form-control" name="status" id="status">
                                <option value="0">Desativado</option>
                                <option value="1">Ativado</option>
                            </select>
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

    <div class="modal modal-default fade" id="adicionar" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Adicionar Novo Usuário</h4>
                </div>

                <center>
                    <div class="modal-body">
                       <div class="form-group">
                        <h3>PARA CADASTRAR UM USUÁRIO AGORA CLIQUE EM:</h3>
                        <a href="{{route('novo.usuarios.agora')}}" class="btn btn-primary">
                               <span class="fa fa-plus" /> ADICIONAR</a>
                        <h3>PARA ENVIAR UM CONVITE DE CADASTRO CLIQUE EM:</h3>   
                            <a href="{{route('novo.usuarios.convite')}}" class="btn btn-success">
                              <span class="fa fa-send" /> CONVIDAR</a>
                        </div> 
                    </div>
                </center>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" 
                        data-dismiss="modal">Cancelar</button>
                </div>
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
            var name = button.data('solict-name')
            var id = button.data('solict-id')
            var modal = $(this)
            var frase = document.getElementById("excluir_frase");
            // modal.find('.modal-title').text("Deseja excluir " + name + "?")
            frase.innerHTML = "Deseja excluir <b>" + name + "</b>?";
            $('#idUser').val(id)
        });

        $('#editar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('solict-id')
            var name = button.data('solict-name')
            var email = button.data('solict-email')
            var nivel = button.data('solict-nivel')
            var status = button.data('solict-status')
            var modal = $(this)
            modal.find('.modal-title').text("Editar " + name )
            $('#idUser2').val(id)
            $('#nome').val(name)
            $('#email').val(email)
            if(nivel == 0){
                document.getElementById("nivel").selectedIndex = "0";
            }else{
                document.getElementById("nivel").selectedIndex = "1";
            }
            if(status == 0){
                document.getElementById("status").selectedIndex = "0";
            }else{
                document.getElementById("status").selectedIndex = "1";
            }
        });
    </script>
@stop

@section('css')
    <style>
        th, td {
            text-align: center;
        }
    </style>
@stop
