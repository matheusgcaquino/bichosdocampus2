@extends('adminlte::page')

@section('title', 'Adicionar Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')
  <!-- Mensagem de Alerta -->
  @include('site.includes.alerts')
  
  <div class="box">

    <form action = "{{ route('adicionar.animais') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="box-header">
        <h3 class="box-title">ADICIONAR ANIMAL</h3>
      </div>

      <div class="box-body">

        <div class="form-group col-md-6">
          <label for="nome"> Nome  <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Animal"
          autofocus required>
        </div>

        <div class="form-group col-md-6">
          <label for="especie"> Espécie <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" id="especie" name="especie" placeholder="Especie do Animal">
        </div>

        <div class="form-group col-md-6">
          <label for="raca"> Raça <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" id="raca" name="raca" placeholder="Raça do Animal" required>
        </div>

        <div class="form-group col-md-6">
          <label> Idade </label><br>
          <div class="form-input col-md-3">
            <input type="number" placeholder="Anos" min="0" class="form-control" id="numeroano" name="numeroano">
          </div>

          <div class="form-input col-md-3">
            <input type="number" placeholder="Meses" min="0" class="form-control" id="numeromeses" name="numeromeses">
          </div> 
        </div>

        <div class="form-group col-md-6">
          <label for="pelagem"> Pelagem <font color="red"> * <font color="black"> </label>
          <input class="form-control" rows="2" id="pelagem" name="pelagem" 
            placeholder="Pelagem do Animal" required></textarea>
        </div>

        <div class="form-group col-md-6">
          <label for="comportamento"> Comportamento <font color="red"> * <font color="black"> </label>
          <input class="form-control" rows="2" id="comportamento" name="comportamento" 
            placeholder="Comportamento do Animal" required></textarea>
        </div>

        <div class="form-group col-md-6">
          <label for="descricao"> Descrição </label>
          <input class="form-control" rows="3" id="descricao" name="descricao" 
            placeholder="Descrição do Animal"></textarea>
        </div>

        <div class="form-group col-md-6">
          <label for="sexo"> Sexo </label>
          <div class="radio">
            <label>
              <input type="radio" id="sexo1" name="sexo" value="M" checked=""> Macho
            </label>
          </div>

          <div class="radio">
            <label>
              <input type="radio" id="sexo2" name="sexo" value="F"> Fêmea
            </label>
          </div>
        </div>

        <div class="form-group col-md-6">
          <label> Castrado </label>
          <div class="radio">
            <label>
              <input type="radio" id="castrado1" name="castrado" value="1" checked=""> Sim
            </label>
          </div>

          <div class="radio">
            <label>
              <input type="radio" id="castrado2" name="castrado" value="0"> Não
            </label>
          </div>
        </div>

        <div class="form-group col-md-6">
          <label> Status </label>
          <select class="form-control" id="status" name="status">
            <option value="1">Ativado</option>
            <option value="0">Desativado</option>
          </select>
        </div>

        <div class="form-group">
            <div class="pull-left">
                <img id="img-adocao" class="profile-user-img img-circle"
                src="{{asset('images/foto-icon.png')}}" alt="User profile picture">
            </div>
            <div class="pull-left" style="margin-left: 1%">
            <label for="foto"> Adicionar Imagem </label>
            <input type="file" name="foto" id="file-input">
            </div>
        </div>
      </div>
      <div class="box-footer with-border">
        <button type="submit" id="btnConfirmar" class="btn btn-primary">Enviar</button>
        <a href="{{route('site.animais')}}" class="btn btn-default">Cancelar</a> 
      </div>
    </form>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/modulos/animais/formulario/formulario.js')}}"></script>
    
  </div>

  <script src="{{asset('js/JavaScript-Load-Image-2.20.1/js/load-image.all.min.js')}}"></script>
  <script type="text/javascript">


          document.getElementById('file-input').onchange = function (e) {
            loadImage(
              e.target.files[0],
              function (img) {
                // document.getElementById('img-adocao').appendChild(img);

                console.log(img.src);
                // console.log(img);
                // var urlCreator = window.URL || window.webkitURL;
                // var imageUrl = urlCreator.createObjectURL(img.src);
                // document.querySelector("#file-input").src = imageUrl;

              },
              {maxWidth: 600} // Options
            );
          };


  </script>
@stop
