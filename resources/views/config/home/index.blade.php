@extends('adminlte::page')

@section('title', 'Usuários - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Animais</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        
            <div class="box-body">
                <label>Editar Caracteristicas</label>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td>Espécie</td>
                            <td>
                                <button type="button" class="btn btn-primary pull-right" 
                                onclick="editar('especie');">
                                <span class="fa fa-cog"></span>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Raça</td>
                            <td>
                                <button type="button" class="btn btn-primary pull-right" 
                                onclick="editar('raca');">
                                <span class="fa fa-cog"></span>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Pelagem</td>
                            <td>
                                <button type="button" class="btn btn-primary pull-right" 
                                onclick="editar('pelagem');">
                                <span class="fa fa-cog"></span>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Localização</td>
                            <td>
                                <button type="button" class="btn btn-primary pull-right" 
                                onclick="editar('local');">
                                <span class="fa fa-cog"></span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="box-footer">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Página Inicial</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
                <label>Editar Caracteristicas</label>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td>Imagem principal</td>
                            <td>
                                <button type="button" class="btn btn-primary pull-right" 
                                onclick="editar('im_pricipal');">
                                <span class="fa fa-cog"></span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="box-footer">
            </div>
        </div>
    </div>

    <div id="paste"></div>

    <!-- Modais -->
    <div class="modal modal-danger fade" id="excluir" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>

                <form action="{{route('config.excluir')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal_excluir">
                        <input type="hidden" id="idExcluir">
                        <input type="hidden" id="tipoExcluir">
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

                <form action="{{route('config.editar')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal_editar">
                        <input type="hidden" id="idEditar">
                        <input type="hidden" id="tipoEditar">

                        <div class="form-group col-md-6">
                            <label>Conteúdo </label>
                            <input type="text" id="text">
                        </div>
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

@stop

@section('js')
    <script>
        $('#excluir').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var text = button.data('solict-name')
            var tipo = button.data('solict-tipo')
            var id = button.data('solict-id')
            var modal = $(this)
            modal.find('.modal-title').text("Deseja excluir " + text + "?")
            $('#idExcluir').val(id)
            $('#tipoExcluir').val(tipo)
        });

        $('#editar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var text = button.data('solict-name')
            var tipo = button.data('solict-tipo')
            var id = button.data('solict-id')
            var modal = $(this)
            modal.find('.modal-title').text("Editar " + text + " - " + tipo)
            $('#idExcluir').val(id)
            $('#text').val(idExcluir)
            $('#tipoEditar').val(tipo)
        });
    </script>
    
    <script>

        function criarTabela(tipo, data) 
        {
            info = `<table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>${tipo}</th>
                            <th class='pull-right'>ação</th>
                        </tr>
                    </thead>
                    
                    <tbody>`;
            console.log(data);
            
            $.each(data, function (i, item) {
                const {id, text} = item;
                // console.log("item: " + item);
                
                info += `<tr>
                            <td>${id}</td>
                            <td>${text}</td>
                            <td class='pull-right'>
                                <button type="button" class="btn btn-primary" 
                                data-toggle="modal" data-target="#editar"  
                                data-solict-tabela=${tipo}
                                data-solict-id=${id}
                                data-solict-text=${text}
                                data-solict-tipo='editar'>
                                <b>Editar</b>
                                </button>
                                <button type="button" class="btn btn-danger" 
                                data-toggle="modal" data-target="#excluir"  
                                data-solict-tabela=${tipo}
                                data-solict-id=${id}
                                data-solict-text=${text}
                                data-solict-tipo='excluir'>
                                <b>Excluir</b>
                                </button>
                            </td>
                        </tr>`;
            });
            info += ` </tbody>
                    </table>`;
            return info;
            
        }

        function criarBox(tipo, data)
        {
            var info = `<div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Configuração de ${tipo}</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="box-body">`;
            
            info += criarTabela(tipo, data);

            info += `    </div>
                        </div>
                    </div>`;
            
            var x = document.getElementById("paste");
            var temp = x.innerHTML;
            x.innerHTML = info + temp;
            console.log('criado');
            
        }

        function editar(tipo)
        {
            $.getJSON('config/box/' + tipo, function (data) {
                criarBox(tipo, data);
                load_js();
            });
        }

        function load_js()
        {
            console.log('carregar');
            var head= document.getElementsByTagName('head')[0];
            var script= document.createElement('script');
            script.src= '/vendor/jquery/dist/jquery.min.js';
            head.appendChild(script);
        }
    </script>
@stop