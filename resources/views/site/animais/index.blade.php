@extends('adminlte::page')

@section('title', 'Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')
  @guest
    <div class="box-body">
      <h1>COMO ADOTAR?</h1>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-paw"></i></span>

          <div class="info-box-content"> 
            <span class="info-box-number" style="text-align: center;">ESCOLHA PET IDEAL PARA VOCÊ!</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-file-text"></i></span>

          <div class="info-box-content">
            <span class="info-box-number" style="text-align: center;">PREENCHA O FORMULÁRIO DE ADOÇÃO!</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-check"></i></span>

          <div class="info-box-content">
            <span class="info-box-number" style="text-align: center;">AGUARDE A APROVAÇÃO DA ADOÇÃO!</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-heart"></i></span>

          <div class="info-box-content">
            <span class="info-box-number" style="text-align: center;">SEJA FELIZ COM SEU PET!</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
  @endguest

  @php
    use App\Http\Controllers\Suporte\DataController;   
  @endphp

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Perfil dos Animais</h3>
    </div>

    <div class="box-body">
      @forelse ($results as $result)
        @php
          ($sexo_animal = $result->sexo_animal == 'M' ? "Macho" : "Fêmea");
          
          ($castracao_animal = $result->castracao_animal ? "Sim" : "Não");
          
          $idade = DataController::convertData($result->idade_animal);
          
          $foto = url("storage/".$result->foto_animal);
          //$foto = url("images/foto-icon.png");
          
          if($result->foto_animal && Storage::disk('public')->exists("storage/".$result->foto_animal)){
            $foto = url("storage/".$result->foto_animal);
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
                <a href="editar/{{$result->id_animal}}" class="btn btn-primary btn-block">
                <span class="fa fa-edit"></span><b> Editar</b></a>

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
      <center><h3>Não há animais cadastrados!</h3></br>
        @auth
          <h4>Para cadastra um novo animal <a href="/animais/adicionar">CLIQUE AQUI!</a>
        @endauth
        </center>
      @endforelse
    
    <div class="box-footer">
       {{-- $results->links()--}} 
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

        <form>
          <div class="modal-body">
            <div class="box-body">
              <input type="hidden" name="idAnimal" id="idAnimal"/>

              <div class="form-group col-md-6">
                <label for="name">Nome Completo </label>
                <input type="text" class="form-control" id="name" placeholder="Nome Completo">
              </div>
              
              <div class="form-group col-md-6">
                <label for="race">Logradouro </label>
                <input type="text" class="form-control" id="logradouro" placeholder="Logradouro">
              </div>
              
              <div class="form-group col-md-6">
                <label for="race">Bairro </label>
                <input type="text" class="form-control" id="bairro" placeholder="Bairro">
              </div>
              
              <div class="form-group col-md-6">
                <label>E-mail</label>
                <input type="text" class="form-control" id="email" placeholder="E-mail">
              </div>

              <div class="form-group col-md-6">
                <label>Telefone </label>
                <div class="input-group">
                  <input type="text" class="form-control" id="telefone"
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
            <button type="button" class="btn btn-success">Confirmar</button>
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
          $('#idAnimal').val(id)
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