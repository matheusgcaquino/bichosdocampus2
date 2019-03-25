@extends('adminlte::page')

@section('title', 'Configurações - Bichos do Campus')

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
                                <a href="{{route('config.animal', ['tipo' => 'especie'])}}" 
                                    class="btn btn-primary pull-right" target="_blank">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Raça</td>
                            <td>
                                <a href="{{route('config.animal', ['tipo' => 'raca'])}}" 
                                    class="btn btn-primary pull-right" target="_blank">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Pelagem</td>
                            <td>
                                <a href="{{route('config.animal', ['tipo' => 'pelagem'])}}" 
                                    class="btn btn-primary pull-right" target="_blank">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Localização</td>
                            <td>
                                <a href="{{route('config.animal', ['tipo' => 'local'])}}" 
                                    class="btn btn-primary pull-right" target="_blank">
                                    Editar
                                </a>
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
                                <a href="{{route('config.paginaInicial', ['tipo' => 'imagem'])}}" 
                                    class="btn btn-primary pull-right" target="_blank">
                                    Editar
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Quem somos</td>
                            <td>
                                <a href="{{route('config.paginaInicial', ['tipo' => 'sobre'])}}" 
                                    class="btn btn-primary pull-right" target="_blank">
                                    Editar
                                </a>
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

@stop

@section('js')
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