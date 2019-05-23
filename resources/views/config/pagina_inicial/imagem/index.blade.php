@extends('adminlte::page')

@section('title', 'Configuração da Pagina Inicial - Bichos do Campus')

@section('content_header')
@stop

@php
    // dd($results);
@endphp

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>
                <center>Configuração da Imagem Principal</center> 
                <a href="{{route('site.config')}}" class="btn btn-danger">
                    <span class="fa fa-arrow-circle-left"></span>
                    Voltar
                </a>
            </h3>
        </div>
        <div class="box-body">
            <div class="callout callout-warning">
                <h4>A Imagem da página inicial, deve estar no formato paisagem!</h4>
                <p>Utilizar imagens que não estão nesse formato, poderá não atender às suas expectativas.</p>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success" 
                    data-toggle="modal" data-target="#adicionar"><span class="fa fa-plus"></span>
                    <b>Adicionar Imagem</b>
                </button>
            </div>
            @foreach($results as $result)
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="im">
                                <img  src="{{url("uploads/".$result->home_imagem)}}" 
                                    alt="User profile picture" >
                            </div>
                            @if ($result->selecionada)
                                <center>
                                    <span class="bg-green label">Foto selecionada</span>
                                </center>
                            @else
                                <button type="button" class="btn btn-success btn-block" 
                                    data-toggle="modal" 
                                    data-target="#selecionar" 
                                    data-solict-foto="{{$result->home_imagem}}"
                                    data-solict-id="{{$result->id_home}}">
                                    <b>Selecionar</b>
                                </button>
                                <button type="button" class="btn btn-danger btn-block" 
                                    data-toggle="modal" 
                                    data-target="#excluir" 
                                    data-solict-foto="{{$result->home_imagem}}"
                                    data-solict-id="{{$result->id_home}}">
                                    <b>Excluir</b>
                                </button>                                    
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
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
                    <h4 class="modal-title" id="exampleModalLabel">Deletar Imagem</h4>
                </div>
        
                <form action="{{route('config.paginaInicial.excluir')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="idHome" id="idHome"/>
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

    <div class="modal modal-success fade" id="selecionar" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Selecionar Imagem</h4>
                </div>
        
                <form action="{{route('config.paginaInicial.selecionar')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="idHome" id="idHome2"/>
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

    <div class="modal modal-default fade" id="adicionar" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Adicionar nova Imagem</h4>
                </div>
        
                <form action="{{route('config.paginaInicial.adicionar')}}" method="POST"
                enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="pull-left" id="card-adocao">
                                <img id="img-adocao" class="profile-user-img img-circle"
                                src="{{asset('imagens/foto-icon.png')}}" alt="User profile picture">
                            </div>
                            <div class="pull-left" style="margin-left: 1%">
                                <label for="foto"> Adicionar Imagem </label>
                                <input type="file" name="foto" id="file-input">
                            </div>
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
    <script src="{{asset('js/JavaScript-Load-Image-2.20.1/js/load-image.all.min.js')}}"></script>

    <script>
        $('#excluir').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var foto = button.data('solict-foto')
            var id = button.data('solict-id')
            var modal = $(this)
            $('#idHome').val(id)
        });

        $('#selecionar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var foto = button.data('solict-foto')
            var id = button.data('solict-id')
            var modal = $(this)
            $('#idHome2').val(id)
        });

        document.getElementById('file-input').onchange = function (e) {
            loadImage(
                e.target.files[0],
                function (img) {                
                    $('#card-adocao').empty();
                    document.getElementById('card-adocao').appendChild(img);
                    $('#card-adocao img').attr('class', 'profile-user-img img-circle');

                },
                {
                    maxWidth: 90,
                    maxHeight: 90,
                    // orientation: 2,
                } // Options
            );            
        };

    </script>
@stop

@section('css')
    <style type="text/css">
        .im {
            max-width: 100%;
            background-repeat: no-repeat;
            padding: 5%;
            display:flex;
            align-items: center;
            justify-content: center;}

        div img {
        max-width: 100%;
        max-height: 100%;
        
        }
    </style>
@stop