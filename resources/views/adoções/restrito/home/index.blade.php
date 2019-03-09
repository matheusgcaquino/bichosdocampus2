@php
    // dd($results);
@endphp
@extends('adminlte::page')

@section('title', 'Adoções de Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header">
        </div>

        <div class="box-body">
            @if(!$results->isEmpty())
                @foreach($results as $result)
                    @php                     
                        $foto = url("images/foto-icon.png");
            
                        if($result->foto_perfil && Storage::disk('public_uploads')
                            ->exists($result->foto_perfil)){
                            $foto = url("uploads/".$result->foto_perfil);
                        }
                    @endphp
                    <div class="col-md-3">
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <div class="im">
                                    <img  src="{{$foto}}" alt="User profile picture" >
                                </div>
                
                                <h3 class="profile-username text-center">{{ $result->nome_animal }}</h3>
                    
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Requisições</b> 
                                        <a class="pull-right">{{$result->adocao->count()}}</a>
                                    </li>
                                </ul>

                                <a href="{{route('adocoes.requisição', ['id' => $result->id_animal])}}" 
                                    class="btn btn-block btn-primary">Mostrar Requisições
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
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

    <div class="modal modal-default fade" id="requisicoes" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>
        
                <form action="{{route('deletar.animais')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="idAnimal" id="idAnimal"/>
                    Mostrar Requisições aki
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" 
                        data-dismiss="modal">Voltar</button>
                    {{-- <button type="submit" class="btn btn-outline">Confirmar</button> --}}
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
        $('#requisicoes').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var name = button.data('solict-name')
            var id = button.data('solict-id')
            var modal = $(this)
            modal.find('.modal-title').text("Requisições de " + name)
            $('#idAnimal').val(id)
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