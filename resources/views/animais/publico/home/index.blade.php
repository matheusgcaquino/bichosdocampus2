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

      @gerencia('local')
        <h3>
          <center>
            Gerenciamento de <strong>Animais </strong>
            <a href="{{route('adicionar.animais.index')}}" class="btn btn-success">
              <span class="fa fa-plus"></span>  NOVO  
            </a>
          </center>
        </h3>
      @else
      <h3>
        <center>
          Animais <strong>para Adotar</strong>
        </center>
      </h3>
      @endgerencia

      <div class="form-group pull-right"> 
        @if (isset($buscar))
          <a href="{{route('site.animais')}}" class="btn btn-danger ">
            Limpar Busca</a>
        @endif
        <button type="button" class="btn btn-info" data-toggle="modal" 
          data-target="#buscar">
          <span class="fa fa-search"></span><b> Buscar Animal</b>
        </button>
      </div>
    </div>   

    <div class="box-body">
      
      @forelse ($results as $result)
        @php

          ($sexo_animal = $result->sexo_animal == 'M' ? "Macho" : "Fêmea");
          
          ($castracao_animal = $result->castracao_animal ? "Sim" : "Não");
          
          $idade = DataController::convertData($result->idade_animal);

          $foto = url("imagens/foto-icon.png");

          if($result->foto_perfil && Storage::disk('public_uploads')->exists($result->foto_perfil)){
            $foto = url("uploads/".$result->foto_perfil);
          }
  
        @endphp
        <div class="col-md-3">
          <div class="box box-danger cardA">
            <div class="box-body box-profile" style="border: solid 2px #f1f1f1;padding: 0;">
              <div style="width: 100%; height: 100%;">
              
                @if ($result->foto->count() > 0)
                  <div id="carousel-example-generic{{$result->id_animal}}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="height: 200px;">
                      <div class="item active im" style="background-image: url({{$foto}}); 
                        background-position: center; height: 100%; background-size: cover; "> 
                      </div>
                      @foreach ($result->foto as $foto)            
                          <div class="item im" style="background-image: url({{'uploads/'.$foto->foto_animal}}); 
                            background-position: center; height: 100%; background-size: cover; "> 
                          </div>             
                      @endforeach  
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic{{$result->id_animal}}" data-slide="prev">
                      <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic{{$result->id_animal}}" data-slide="next">
                      <span class="fa fa-angle-right"></span>
                    </a>
                  </div>
                @else
                  <div class="im" style=" padding: 0; background-image: url({{$foto}});
                  background-position: center; width:100%; height: 200px; background-size: cover; ">
                  </div> 

                @endif                  
              </div>

              <h3 class="profile-username text-center">{{ $result->nome_animal }}</h3>

              <p class="text-muted text-center">{{$result->raca->raca}}</p>

              <ul class="list-group list-group-unbordered" style="padding: 10px;">
                <li class="list-group-item">
                  <b>Sexo</b> <a class="pull-right">{{$sexo_animal}}</a>
                </li>
                <li class="list-group-item">
                  <b>Castrado</b> <a class="pull-right">{{$castracao_animal}}</a>
                </li>                
                <li class="list-group-item">
                  <b>Idade</b> <a class="pull-right">{{$idade}}</a>
                </li>

                @gerencia('local')
                  @if ($result->status_animal == 1)
                    <li class="list-group-item">
                      <b>Status</b> <a class="pull-right"><span class="bg-green label">
                        Ativado
                      </span></a>
                    </li>
                  @elseif ($result->status_animal == 2)
                    <li class="list-group-item">
                      <b>Status</b> <a class="pull-right"><span class="bg-blue label">
                        Adotado
                      </span></a>
                    </li>
                  @else
                    <li class="list-group-item">
                      <b>Status</b> <a class="pull-right"><span class="bg-red label">
                        Desativado
                      </span></a>
                    </li>
                  @endif
                @endgerencia
              </ul>

              <button type="button" class="btn btn-info btn-block" data-toggle="modal" 
                data-target="#information" 
                data-solict-foto="{{$foto}}"
                data-solict-idade="{{$idade}}" 
                data-solict-nome="{{$result->nome_animal}}"
                data-solict-local="{{$result->local->local}}" 
                data-solict-especie="{{$result->raca->especie->especie}}"
                data-solict-raca="{{$result->raca->raca}}"
                data-solict-pelagem="{{$result->pelagem->pelagem}}" 
                data-solict-comportamento="{{$result->comportamento_animal}}" 
                data-solict-sexo="{{$sexo_animal}}"
                data-solict-descricao="{{$result->descricao_animal}}"
                data-solict-castrado="{{$castracao_animal}}"><b>+ Mais Informações</b>
              </button>
              @gerencia('local')
                <a href="{{route('editar.animais.index', ['id' => $result->id_animal])}}" 
                class="btn btn-primary btn-block"><span class="fa fa-edit"></span><b> Editar</b></a>

                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" 
                  data-target="#excluir" data-solict-id="{{$result->id_animal}}" 
                  data-solict-name="{{ $result->nome_animal }}">
                  <span class="fa fa-trash"></span><b> Excluir</b>
                </button>
              @else
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" 
                  data-target="#adotar" data-solict-id="{{$result->id_animal}}" 
                  data-solict-name="{{ $result->nome_animal }}"><span class="fa fa-heart"></span>
                  <b>Requisitar Adoção</b>
                </button>
              @endgerencia
            </div>
          </div>
        </div>
      @empty
      <center><h3>Nenhum Animal encontrado!</h3></br>
        @gerencia('local')
          <h4>Para cadastrar um novo animal <a href="{{route('adicionar.animais.index')}}">CLIQUE AQUI!</a>
        @endgerencia
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

            @gerencia('local')
              <div class="form-group col-md-6">
                <label for="race">Localidade </label>
                <input type="text" class="form-control" id="local" disabled>
              </div>
            @endgerencia

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

  <div class="modal modal-default fade" id="buscar" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Buscar Animal</h4>
        </div>
        <form action="{{route('buscar.animais')}}" method="POST">
            {{ csrf_field() }}
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group col-md-6">
                <label>Nome </label>
                <input type="text" class="form-control" id="S_nome" name="nome" 
                  placeholder="Buscar por nome(opcional)">
              </div>
  
              <div class="form-group col-md-6">
                <label>Espécie</label>
                <select class="form-control" id="S_especie" name="especie" 
                  onchange="addRaca(this.value)">
                  <option selected="selected" value="">Todas</option>
                </select>
              </div>

              <div class="form-group col-md-6" id="div_raca" style="display: none;">
                <label>Raça </label>
                <select class="form-control select2" id="S_raca" name="raca"
                  style="width: 100%;">
                  <option selected="selected" value="">Todas</option>
                </select>
              </div>
  
              @gerencia('local')
                <div class="form-group col-md-6">
                  <label>Localidade </label>
                  <select class="form-control select2" id="S_local" name="local"
                    style="width: 100%;">
                    <option selected="selected" value="">Todas</option>
                  </select>
                </div>
              @endgerencia
              
              <div class="form-group col-md-6">
                <label>Pelagem</label>
                <select class="form-control select2" id="S_pelagem" name="pelagem"
                  style="width: 100%;">
                  <option selected="selected" value="">Todas</option>
                </select>
              </div>
  
              <div class="form-group col-md-6">
                <label>Sexo</label>
                <select class="form-control" id="S_sexo" name="sexo"">
                    <option selected="selected" value="">Todos</option>
                    <option value="M">Macho</option>
                    <option value="F">Fêmea</option>
                  </select>
              </div>
  
              <div class="form-group col-md-6">
                <label for="race">Castrado</label>
                <select class="form-control" id="S_castrado" name="castrado">
                  <option selected="selected" value="">Ambos</option>
                  <option value="2">Sim</option>
                  <option value="1">Não</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="race">Idade</label>
                <select class="form-control" id="S_idade" name="idade">
                  <option selected="selected" value="">Todas</option>
                  <option value="1">Até 2 meses</option>
                  <option value="2">De 2 á 5 meses</option>
                  <option value="3">De 5 á 12 meses</option>
                  <option value="4">De 1 á 2 anos</option>
                  <option value="5">Acima de 2 anos</option>
                </select>
              </div>

              @gerencia('local')
                <div class="form-group col-md-6">
                  <label for="race">Status</label>
                  <select class="form-control" id="S_status" name="status">
                    <option selected="selected" value="">Todos</option>
                    <option value="2">Ativado</option>
                    <option value="1">Desativado</option>
                    <option value="3">Adotados</option>
                  </select>
                </div>
              @endgerencia

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
  
@stop

@section('js')
  {{-- <script src="{{asset('js/buscar/buscar_animal.js')}}"></script> --}}
  
  <script>

    $(document).ready(function() {
      $('.select2').select2();
    });

    function addSelect(select, id, text)
    {
      var x = document.getElementById(select);
      var option = document.createElement("option");
      option.text = text;
      option.value = id;
      x.add(option);
    }

    function buscar(data, callback)
    {
      $.each(data['especie'], function (i, item) {
        const {id_especie, especie} = item;
        addSelect("S_especie", id_especie, especie);
      });

      $.each(data['pelagem'], function (i, item) {
        const {id_pelagem, pelagem} = item;
        addSelect("S_pelagem", id_pelagem, pelagem);
      });

      if ('local' in data) {
        $.each(data['local'], function (i, item) {
          const {id_local, local} = item;
          addSelect("S_local", id_local, local);
        }); 
      }

      @if (isset($raca))
        var raca = {!! json_encode($raca, JSON_HEX_TAG) !!};        
        $.each(raca, function (i, item) {
          const {id_raca, raca} = item;
          addSelect("S_raca", id_raca, raca);
        });
        var div = document.getElementById("div_raca");
        div.style.display = "block";
      @endif
      callback();  
    }

    function cleanRaca() {
      var x = document.getElementById("S_raca");
      while (x.options[1] != null) {
        x.options.remove(1);
      }
    }

    function addRaca(value)
    {
      var div = document.getElementById("div_raca");
      if (value == '') {
        div.style.display = "none";
        cleanRaca();
      } else {
        if (div.style.display == "block") {
          cleanRaca();
        } else {
          div.style.display = "block";
        }
        $.getJSON("/animais/ajax_raca/" + value, function (data) {
          $.each(data, function (i, item) {
            const {id_raca, id_especie, raca} = item;
            addSelect("S_raca", id_raca, raca);
          });
        });
      } 
    }

    function buscar_option()
    {
      @if (isset($buscar))
        var busca = {!! json_encode($buscar, JSON_HEX_TAG) !!};
        $.each(busca, function (i, item) {
          if (i == 'nome') {
            var x = document.getElementById("S_nome");
            x.value = item;
          } else {
            var x = document.getElementById("S_" + i);
            var j = 1;
            while (x.options[j] != null) {
              if (x.options[j].value == item) {
                x.options[j].selected = true;
                break;
              }
              j++;
            }
          }
        });
      @endif
    }

    function buscar_modal(callback) 
    {
      $.getJSON("{{route('buscar.ajax')}}", function (data) {
        buscar(data, buscar_option);
      });
    }

    window.onload = buscar_modal;
  </script>


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
      var local = button.data('solict-local')
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
      $('#local').val(local)
      $('#raca').val(raca)
      $('#especie').val(especie)
      $('#pelagem').val(pelagem)
      $('#comportamento').val(comportamento)
      $('#descricao').val(descricao)
      $('#sexo').val(sexo)
      $('#castrado').val(castrado)
      $('#foto').val(foto)
    });
  </script>
@stop