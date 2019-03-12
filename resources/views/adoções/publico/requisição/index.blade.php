@extends('adminlte::page')

@section('title', 'Adoções de Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="text-center">Animal: {{$results->animal->nome_animal}}</h3>
        </div>

        <div class="box-body">
            @if($results)
                @php
                    $foto = url("images/foto-icon.png");
                    if($results->animal->foto_perfil && Storage::disk('public_uploads')
                        ->exists($results->animal->foto_perfil)){
                        $foto = url("uploads/".$results->animal->foto_perfil);
                    }

                    $moro = ($results->residencia_adocao == 0) ? 'Casa' : 'Apartamento';

                    switch($results->status_adocao){
                        case 0:
                            $status = 'Novo';
                            break;
                        
                        default:
                            $status = 'Novo';
                            break;
                    }
                @endphp
                <div class="im">
                    <img  src="{{$foto}}" alt="User profile picture" >
                </div>

                <div class="form-group col-md-6">
                    <label for="name">Nome </label>
                <input type="text" class="form-control" value="{{$results->nome_adocao}}" disabled>
                </div>

                <div class="form-group col-md-6">
                    <label>Status</label>
                    <input type="text" class="form-control" value="{{$status}}" disabled>
                </div>

                @gerencia('local')
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
                        <label>Logradouro</label>
                        <input type="text" class="form-control" value="{{$results->logradouro_adocao}}" disabled>
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
                @endgerencia

            @else
                <center><h3>Nenhuma Adoção encontrada!</h3></br>
            @endif
        </div>

        <div class="box-footer">
        </div>
    </div>

    <!-- Modais -->

    <div class="modal modal-info fade" id="information" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Voltar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop

@section('js')
  <script>
    $('#information').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var nome = button.data('solict-nome')
      var data = button.data('solict-data')
      var telefone = button.data('solict-telefone')
      var email = button.data('solict-email')
      var cpf = button.data('solict-cpf')
      var bairro = button.data('solict-bairro')
      var cidade = button.data('solict-cidade')
      var estado = button.data('solict-estado')
      var status = button.data('solict-status')
      var moro = button.data('solict-moro')
      var logradouro = button.data('solict-logradouro')
      var modal = $(this)
      modal.find('.modal-title').text("Informações de " + nome)
      $('#nome').val(nome)
      $('#data').val(data)
      $('#tel').val(telefone)
      $('#email').val(email)
      $('#cpf').val(cpf)
      $('#bairro').val(bairro)
      $('#cidade').val(cidade)
      $('#estado').val(estado)
      $('#status').val(status)
      $('#moro').val(moro)
      $('#logradouro').val(logradouro)
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
