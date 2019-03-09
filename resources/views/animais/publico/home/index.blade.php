@extends('adminlte::page')

@section('title', 'Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')

  <!-- Mensagem de Alerta -->
  @include('site.includes.alerts')

  @php
    use App\Http\Controllers\Suporte\DataController;  
  @endphp

  <div class="box">

    <div class="box-header">

      @auth
        <div class="form-group col-md-6">
          <a href="{{route('adicionar.animais.index')}}" class="btn btn-success">
            Adicionar Novo Animal</a>
        </div> 
      @endauth
      <div class="input-group pull-right col-md-3">
        <input type="text" class="form-control" name="buscar" id="buscar" 
      value="{{(isset($buscar) ? $buscar : '')}}"
            placeholder="Buscar Animais"> <span class="input-group-btn">
            <button id="btn-buscar" type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
      </div>
    </div>   

    <div class="box-body">
      
      @forelse ($results as $result)
        @php

          ($sexo_animal = $result->sexo_animal == 'M' ? "Macho" : "Fêmea");
          
          ($castracao_animal = $result->castracao_animal ? "Sim" : "Não");
          
          $idade = DataController::convertData($result->idade_animal);
          
          $foto = url("images/foto-icon.png");
          if($result->foto_perfil && Storage::disk('public_uploads')->exists($result->foto_perfil)){
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

              <p class="text-muted text-center">{{$result->raca_animal}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Sexo</b> <a class="pull-right">{{$sexo_animal}}</a>
                </li>
                <li class="list-group-item">
                  <b>Castrado</b> <a class="pull-right">{{$castracao_animal}}</a>
                </li>                
                <li class="list-group-item">
                  <b>Idade</b> <a class="pull-right">{{$idade}}</a>
                </li>

                @auth
                  @if ($result->status_animal)
                    <li class="list-group-item">
                      <b>Status</b> <a class="pull-right"><span class="bg-green">
                        Ativado
                      </span></a>
                    </li>
                  @else
                    <li class="list-group-item">
                      <b>Status</b> <a class="pull-right"><span class="bg-red">
                        Desativado
                      </span></a>
                    </li>
                  @endif
                @endauth
              </ul>

              <button type="button" class="btn btn-info btn-block" data-toggle="modal" 
                data-target="#information" 
                data-solict-foto="{{$foto}}"
                data-solict-idade="{{$idade}}" 
                data-solict-nome="{{$result->nome_animal}}" 
                data-solict-especie="{{$result->especie_animal}}"
                data-solict-raca="{{$result->raca_animal}}"
                data-solict-pelagem="{{$result->pelagem_animal}}" 
                data-solict-comportamento="{{$result->comportamento_animal}}" 
                data-solict-sexo="{{$sexo_animal}}"
                data-solict-descricao="{{$result->descricao_animal}}"
                data-solict-castrado="{{$castracao_animal}}"><b>+ Mais Informações</b>
              </button>
              @auth
                <a href="{{route('editar.animais.index', ['id' => $result->id_animal])}}" 
                class="btn btn-primary btn-block"><span class="fa fa-edit"></span><b> Editar</b></a>

                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" 
                  data-target="#excluir" data-solict-id="{{$result->id_animal}}" 
                  data-solict-name="{{ $result->nome_animal }}">
                  <span class="fa fa-minus-circle"></span><b> Excluir</b>
                </button>
              @else
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" 
                  data-target="#adotar" data-solict-id="{{$result->id_animal}}" 
                  data-solict-name="{{ $result->nome_animal }}"><span class="fa fa-heart"></span>
                  <b>Requisitar Adoção</b>
                </button>
              @endauth
            </div>
          </div>
        </div>
      @empty
      <center><h3>Nenhum Animal encontrado!</h3></br>
        @auth
          <h4>Para cadastrar um novo animal <a href="{{route('adicionar.animais.index')}}">CLIQUE AQUI!</a>
        @endauth
        </center>
      @endforelse
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
            <h4 class="modal-title" id="exampleModalLabel">Deletar Animais</h4>
        </div>

        <form action="{{route('deletar.animais')}}" method="POST">
          {{ csrf_field() }}
          <div class="modal-body">
            <h4 id="excluir_frase"></h4>
            <input type="hidden" name="idAnimal" id="idAnimal"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline">Confirmar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal modal-default fade" id="adotar" style="display: none;">
      
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Requisição de Adoção</h4>
        </div>
        <form action="{{route('adotar.info')}}" method="POST">
            {{ csrf_field() }}
          <div class="modal-body">
            <div class="box-body">
              <h4 id="adotar_frase"></h4>
              <input type="hidden" name="id_animal" id="id_animal_adocao"/>
            </div>
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Confirmar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

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
            <div class="form-group col-md-6">
              <label for="name">Nome </label>
              <input type="text" class="form-control" id="nome" disabled>
            </div>

            <div class="form-group col-md-6">
              <label for="especie"> Espécie </label>
              <input type="text" class="form-control" id="especie" disabled>
            </div>
            
            <div class="form-group col-md-6">
              <label for="race">Raça </label>
              <input type="text" class="form-control" id="raca" disabled>
            </div>

            <div class="form-group col-md-6">
              <label for="race">Idade </label>
              <input type="text" class="form-control" id="idade" disabled>
            </div>
            
            <div class="form-group col-md-6">
              <label>Pelagem</label>
              <textarea class="form-control" rows="2" id="pelagem" disabled></textarea>
            </div>

            <div class="form-group col-md-6">
              <label>Comportamento</label>
              <textarea class="form-control" rows="2" id="comportamento" disabled></textarea>
            </div>

            <div class="form-group col-md-6">
                <label>Descrição</label>
                <textarea class="form-control" rows="3" id="descricao" disabled></textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="race">Sexo</label>
              <input type="text" class="form-control" id="sexo" disabled>
            </div>

            <div class="form-group col-md-6">
              <label for="race">Castrado</label>
              <input type="text" class="form-control" id="castrado" disabled>
            </div>
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
    $('#excluir').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var name = button.data('solict-name')
      var id = button.data('solict-id')
      var modal = $(this)
      var frase = document.getElementById("excluir_frase");
        // modal.find('.modal-title').text("Deseja excluir " + name + "?")
      frase.innerHTML = "Deseja excluir <b>" + name + "</b>?";
      // $('#excluir_frase').text("Tem certeza que deseja excluir " + name + "?")
      $('#idAnimal').val(id)
    });

    $('#adotar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var name = button.data('solict-name')
      var id = button.data('solict-id')
      var modal = $(this)
      // modal.find('.modal-title').text(name + " - Fomulário de Adoção")
      $('#adotar_frase').text("Desaja fazer o requerimento de adoção para " + name + "?")
      $('#id_animal_adocao').val(id)
    });

    $('#information').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var nome = button.data('solict-nome')
      var idade = button.data('solict-idade')
      var raca = button.data('solict-raca')
      var especie = button.data('solict-especie')
      var pelagem = button.data('solict-pelagem')
      var comportamento = button.data('solict-comportamento')
      var descricao = button.data('solict-descricao')
      var sexo = button.data('solict-sexo')
      var castrado = button.data('solict-castrado')
      var foto = button.data('solict-foto')
      var modal = $(this)
      modal.find('.modal-title').text("Informações de " + nome)
      $('#nome').val(nome)
      $('#idade').val(idade)
      $('#raca').val(raca)
      $('#especie').val(especie)
      $('#pelagem').val(pelagem)
      $('#comportamento').val(comportamento)
      $('#descricao').val(descricao)
      $('#sexo').val(sexo)
      $('#castrado').val(castrado)
      $('#foto').val(foto)
    });

    $(this).on('keyup', function (e) {
        if (e.keyCode == 13) {
          if ($('#buscar').val() !== '') {
            let busca = $('#buscar').val();
            // console.log(window.location.href);
            window.location.href = getBaseAnimalUrl() + '/buscar/' + busca;
          }else{
            window.location.href = getBaseAnimalUrl();
          }
        }
    });

    $('#btn-buscar').on('click', function () {
      let busca = $('#buscar').val();
      // console.log(window.location.href);
      if ($('#buscar').val() !== '') {
        let busca = $('#buscar').val();
        // console.log(window.location.href);
        window.location.href = getBaseAnimalUrl() + '/buscar/' + busca;
      }else{
        window.location.href = getBaseAnimalUrl();
      }
      
    });

    function getBaseAnimalUrl() {
      return '/animais';
    }
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