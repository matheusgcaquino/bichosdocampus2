@extends('adminlte::page')

@section('title', 'Configuração da Pagina Inicial - Bichos do Campus')

@section('content_header')
@stop

@php
    // dd($results);
@endphp

@section('content')
    @if ($tipo == 'sobre')
        <div class="box">
            <div class="box-header">
                <h3>Configuração de <b>Quem somos</b></h3>
            </div>
            <form action="{{route('config.animal.editar')}}" method="POST">
                <div class="box-body">
                    <textarea class="textarea" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;
                        border: 1px solid #dddddd; padding: 10px;" name="text">
                        {{$results->sobre}}
                    </textarea>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-outline">Confirmar</button>
                </div>
            </form>
        </div>
    @else
        <div class="box">
            <div class="box-header">
                <h3>Configuração da Imagem Principal</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <button type="button" class="btn btn-success" 
                        data-toggle="modal" data-target="#adicionar">
                        <b>Adicionar nova</b>
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
                                        <span class="bg-green">Foto selecionada</span>
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
                                <div class="pull-left">
                                    <img class="profile-user-img img-circle" 
                                    src="{{asset('images/foto-icon.png')}}" alt="User profile picture">
                                </div>
                                <div class="pull-left" style="margin-left: 1%">
                                    <label for="foto">Escolher Imagem</label>
                                    <input type="file" id="foto" name="foto">
                                </div>
                        
                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox" name="selecionada"> Selecionar
                                    </label>
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
    @endif
@stop

@section('js')
    <!-- Bootstrap WYSIHTML5 -->
    <script href="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>

    <script>
        $(function () {
          //bootstrap WYSIHTML5 - text editor
          $('.textarea').wysihtml5()
        })

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
  height: 150px;
 
}
</style>
@stop