@extends('adminlte::page')

@section('title', 'Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')

  @php
    use App\Http\Controllers\Suporte\DataController;  
  @endphp

  <div class="box">
    <div class="box-header">
      @auth
        <div class="form-group col-md-6">
          <a href="{{route('adicionar.animais.index')}}" class="btn btn-success">Adicionar Novo Animal</a>
        </div> 
      @endauth
      <form action="{{route('buscar.animais')}}" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group pull-right col-md-3">
          <input type="text" class="form-control" name="buscar" id="buscar"
              placeholder="Buscar Animais"> <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search"></span>
              </button>
          </span>
        </div>
      </form>
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
              <img class="profile-user-img img-responsive img-circle" 
                src="{{$foto}}" alt="User profile picture">

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
                  <b>Adotar</b>
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
            <h4 class="modal-title" id="exampleModalLabel"></h4>
        </div>

        <form action="{{route('deletar.animais')}}" method="POST">
          {{ csrf_field() }}
          <div class="modal-body">
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
            <h4 class="modal-title" id="exampleModalLabel"> </h4>
        </div>

        <form action="{{route('adotar.animais')}}" method="POST">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="box-body">
              <input type="hidden" name="idAnimal2" id="idAnimal2"/>

              <div class="form-group col-md-6">
                <label for="name">Nome Completo </label>
                <input type="text" class="form-control" name="name" placeholder="Nome Completo">
              </div>
              
              <div class="form-group col-md-6">
                <label for="race">Logradouro </label>
                <input type="text" class="form-control" name="logradouro" placeholder="Logradouro">
              </div>
              
              <div class="form-group col-md-6">
                <label for="race">Bairro </label>
                <input type="text" class="form-control" name="bairro" placeholder="Bairro">
              </div>
              
              <div class="form-group col-md-6">
                <label>E-mail</label>
                <input type="text" class="form-control" name="email" placeholder="E-mail">
              </div>

              <div class="form-group col-md-6">
                <label>Telefone </label>
                <div class="input-group">
                  <input type="text" class="form-control" name="telefone"
                    data-inputmask='"mask": "(999) 999-9999"' data-mask="">
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group col-md-6">
                <label>Moro em </label>
                <div class="radio">
                  <label>
                    <input type="radio" name="moro" id="moro1" value="casa" checked="">
                    Casa
                  </label>
                </div>
                
                <div class="radio">
                  <label>
                    <input type="radio" name="moro" id="moro2" value="apartamento">
                    Apartamento
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Confirmar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal modal-default fade" id="information" style="display: none;">
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
          modal.find('.modal-title').text("Deseja excluir " + name + "?")
          $('#idAnimal').val(id)
    });

    $('#adotar').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var name = button.data('solict-name')
          var id = button.data('solict-id')
          var modal = $(this)
          modal.find('.modal-title').text(name + " - Fomulário de Adoção")
          $('#idAnimal2').val(id)
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
    });
  </script>
@stop