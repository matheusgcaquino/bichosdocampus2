@extends('adminlte::page')

@section('title', 'Adoções de Animais - Bichos do Campus')

@section('content_header')
@stop

@php
    use App\Http\Controllers\Suporte\StatusController;
@endphp

@section('content')
    <div class="box">
        <div class="box-header" style="background: linear-gradient(to right, #ed213a, #93291e); color:azure;">
            <h3 class="text-center">Situação do requerimento para <strong> {{$results->animal->nome_animal}} </strong></h3>
            @gerencia
                <a href="javascript:history.back()" class="btn btn-outline">
                    <span class="fa fa-arrow-circle-left"></span>
                    Voltar
                </a>
            @endgerencia
        </div>

        <div class="box-body">
            @if($results)
                @php
                    $foto = url("imagens/foto-icon.png");
                    if($results->animal->foto_perfil && Storage::disk('public_uploads')
                        ->exists($results->animal->foto_perfil)){
                        $foto = url("uploads/".$results->animal->foto_perfil);
                    }

                    $moro = ($results->residencia_adocao == 0) ? 'Casa' : 'Apartamento';

                    $stat = StatusController::last_status($results->status);
                    $acao = StatusController::acao($results->status);
                @endphp

                <div class="form-group col-md-6">
                  <img  src="{{$foto}}" alt="User profile picture"/>
                </div>


                <div class="form-group col-md-6">
                  <h4><b>DADOS DO ADOTANTE</b></h4>
                    <label for="name">Nome </label>
                <input type="text" class="form-control" value="{{$results->nome_adocao}}" disabled>
                </div>

                @guest
                 <div class="col-md-12">
                    <ul class="timeline">
                        @foreach ($results->status as $status)
                            {!! StatusController::timeline($status) !!}
                        @endforeach
                    </ul>  
                </div>
                @endguest

                @gerencia
                    <div class="form-group col-md-6">
                        <label>Status: </label>
                        {!!$stat!!}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="especie"> Data de Nascimento </label>
                        <input type="text" class="form-control" value="{{$results->nascimento_adocao}}" disabled>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="race">Telefone </label>
                        <input type="text" class="form-control" value="{{$results->telefone_adocao}}" disabled>
                    </div>
        
                    <div class="form-group col-md-6">
                        <label for="race">E-mail  </label>
                        <input type="text" class="form-control" value="{{$results->email_adocao}}" disabled>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>CPF</label>
                        <input type="text" class="form-control" value="{{$results->cpf_adocao}}" disabled>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Cep</label>
                        <input type="text" class="form-control" value="{{$results->cep_adocao}}" disabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Rua</label>
                        <input type="text" class="form-control" value="{{$results->rua_adocao}}" disabled>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Nº</label>
                        <input type="text" class="form-control" value="{{$results->numero_adocao}}" disabled>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Complemento</label>
                        @php
                            if (isset($results->complemento_adocao)){
                                $complemento = $results->complemento_adocao;
                            } else {
                                $complemento = 'Sem complemento';
                            }
                        @endphp
                        <input type="text" class="form-control" value="{{$complemento}}" disabled>
                    </div>
        
                    <div class="form-group col-md-6">
                        <label>Bairro</label>
                        <input type="text" class="form-control" value="{{$results->bairro_adocao}}" disabled>
                    </div>
    
                    <div class="form-group col-md-6">
                        <label>Estado</label>
                        <input type="text" class="form-control" value="{{$results->estado_adocao}}" disabled>
                    </div>
    
                    <div class="form-group col-md-6">
                        <label>Cidade</label>
                        <input type="text" class="form-control" value="{{$results->cidade_adocao}}" disabled>
                    </div>
    
                    <div class="form-group col-md-6">
                        <label>Moro em</label>
                        <input type="text" class="form-control" value="{{$moro}}" disabled>
                    </div>

                     <div class="form-group col-md-6">
                        <label>Ações</label></br>
                        {!!$acao!!}
                    </div>

                @endgerencia

            @else
                <center><h3>Nenhuma Adoção encontrada!</h3></br>
            @endif
        </div>
    </div>

    <!-- Modais -->

    <div class="modal modal-default fade" id="modal" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>
                <form action="{{route('requisição.status')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="box-body">
                            <input type="hidden" name="id" value="{{$results->id_adocao}}">
                            <input type="hidden" name="acao" id="acao">
                            <input type="hidden" name="codigo" value="{{$results->codigo_adocao}}">
                            <div class="form-group">
                                <label>Comentário</label>
                                <textarea class="form-control" name="comentario" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" 
                        data-dismiss="modal"><span class="fa fa-close"></span>  Cancelar</button>
                        <button type="submit" class="btn btn-success"><span class="fa fa-check"></span>  Confirmar</button>
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
    $('#modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var acao = button.data('solict-acao')
        var nome = button.data('solict-nome')
        var modal = $(this)
        modal.find('.modal-title').text(nome)
        $('#acao').val(acao)
    });
  </script>
@stop

@section('css')
<style type="text/css">
.im {
      width: 100%;
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
