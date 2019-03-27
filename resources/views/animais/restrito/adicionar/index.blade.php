@extends('adminlte::page')

@section('title', 'Adicionar Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')
  <!-- Mensagem de Alerta -->
  @include('site.includes.alerts')
  @php
  use App\Http\Controllers\Suporte\AnimaisController; 
  @endphp
  
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

        <div class="form-group col-md-3">
          <label for="anos"> Anos  </label>
          <select type="number" placeholder="Anos" min="0" max="10" class="form-control" id="numeroano" name="numeroano">
            <option selected="selected" value="0">Menos que 1 ano</option>
            <option value="1"> 01 Ano </option>
            <option value="2"> 02 Anos</option>
            <option value="3"> 03 Anos</option>
            <option value="4"> 04 Anos</option>
            <option value="5"> 05 Anos</option>
            <option value="6"> 06 Anos</option>
            <option value="7"> 07 Anos</option>
            <option value="8"> 08 Anos</option>  
            <option value="9"> 09 Anos</option>
            <option value="10"> 10 Anos</option>                
          </select>
        </div>
          <div class="form-group col-md-3">
          <label for="meses"> Meses  </label>
          <select type="number" placeholder="Meses" min="0" max="12" class="form-control" id="numeromeses" name="numeromeses">
            <option selected="selected" value="0"> 0 Mês</option>
            <option value="1"> 01 Mês</option>
            <option value="2"> 02 Meses</option>
            <option value="3"> 03 Meses</option>
            <option value="4"> 04 Meses</option>
            <option value="5"> 05 Meses</option>
            <option value="6"> 06 Meses</option>
            <option value="7"> 07 Meses</option>
            <option value="8"> 08 Meses</option>  
            <option value="9"> 09 Meses</option>
            <option value="10"> 10 Meses</option>
            <option value="11"> 11 Meses</option>
            <option value="12"> 12 Meses</option>               
          </select>
        </div>        

        <div class="form-group col-md-6">
          <label for="especie"> Espécie <font color="red"> * <font color="black"> </label>
          <select class="form-control" id="especie" name="especie" placeholder="Especie do Animal"
          onchange="addRaca(this.value);" style="width: 100%;">
          <option selected="selected" value=""> Escolha uma espécie. </option>
            @foreach ($resultsespecie as $resultespecie)
              <option value="{{ $resultespecie->id_especie }}"> {{ $resultespecie->especie }} </option>
            @endforeach         
          </select>
          <input type="checkbox" id="novaespecie" name="novaespecie" value="" style="display:none" checked="checked" />
        </div>
        
        <div class="form-group col-md-6" id="div_raca" style="display: none;">
          <label for="raca"> Raça <font color="red"> * <font color="black"> </label>
          <select class="form-control" id="raca" name="raca" placeholder="Raça do Animal" style="width: 100%;" required>
              <option selected="selected" value=""> Escolha uma raça. </option>
          </select>
          <input type="checkbox" id="novaraca" name="novaraca" value="" style="display:none" checked="checked" />
        </div>
        
        <div class="form-group col-md-6">
          <label for="pelagem"> Pelagem <font color="red"> * <font color="black"> </label>
          <select class="form-control" rows="2" id="pelagem" name="pelagem" placeholder="Pelagem do Animal" style="width: 100%;" required>
            <option selected="selected" value=""> Escolha uma pelagem. </option>
            @foreach ($resultspelagem as $resultpelagem)
              <option value="{{ $resultpelagem->id_pelagem }}"> {{ $resultpelagem->pelagem }} </option>
            @endforeach
          </select>
          <input type="checkbox" id="novapelagem" name="novapelagem" value="" style="display:none" checked="checked" />
        </div>

        <div class="form-group col-md-6">
          <label for="localizacao"> Localização <font color="red"> * <font color="black"> </label>
          <select class="form-control" rows="2" id="localizacao" name="localizacao" placeholder="Localização do Animal" style="width: 100%;">
            <option selected="selected" value=""> Escolha uma localizacao. </option>
            @foreach ($resultslocalizacao as $resultlocalizacao)
              <option value="{{ $resultlocalizacao->id_local }}"> {{ $resultlocalizacao->local }} </option>
            @endforeach
          </select>
          <input type="checkbox" id="novalocalizacao" name="novalocalizacao" value="" style="display:none" checked="checked" />
        </div>

        <div class="form-group col-md-6">
          <label for="comportamento"> Comportamento <font color="red"> * <font color="black"> </label>
          <input class="form-control" rows="2" id="comportamento" name="comportamento" 
            placeholder="Comportamento do Animal" required>
        </div>

        <div class="form-group col-md-6">
            <label> Status </label>
            <select class="form-control" id="status" name="status">
              <option value="1">Ativado</option>
              <option value="0">Desativado</option>
            </select>
          </div>

          <div class="form-group col-md-6">
              <div class="form-group col-md-3">
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
        
                <div class="form-group col-md-3">
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
              </div>

        <div class="form-group col-md-6">
            <div class="col-md-3">
                <img class="profile-user-img img-circle" 
                src="{{asset('images/foto-icon.png')}}" alt="User profile picture">
            </div>
            <div class="pull-left" style="margin-top: 1%">
                <label for="foto"> Selecionar Imagem </label>
            <input type="file" id="foto" name="foto">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="descricao"> Descrição </label>
            <textarea class="form-control" rows="3" id="descricao" name="descricao" 
              placeholder="Descrição do Animal"></textarea>
          </div>
      </div>      
      <div class="box-footer with-border">
        <button type="submit" id="btnConfirmar" class="btn btn-primary">Enviar</button>
        <a href="{{route('site.animais')}}" class="btn btn-default">Cancelar</a> 
      </div>
    </form>
    
    <script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/modulos/animais/formulario/formulario.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    
    <script>

      function cleanRaca() {
        var x = document.getElementById("raca");
        while (x.options[1] != null) {
          x.options.remove(1);
        }
      }

      function addSelect(select, id, text)
      {
        var x = document.getElementById(select);
        var option = document.createElement("option");
        option.text = text;
        option.value = id;
        x.add(option);
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
              addSelect("raca", id_raca, raca);
            });
          });
        } 
      }

      $(document).ready(function() {

        $("#especie").select2({
          tags: true,
          escapeMarkup: function(markup) {
            return markup;
          },
          createTag: function(params) {
            var obj = {
              id: params.term,
              text: params.term,
              title: params.term
            };
            return obj;
          },
          insertTag: function(data, tag){    
            tag.text = "Adicionar nova especie: '" + tag.text + "'";          
            data.push(tag);
            var novaespecie = document.getElementById("novaespecie");
            $(novaespecie).val('1');
          }            
        });      

        $("#raca").select2({
          tags: true,
          escapeMarkup: function(markup) {
            return markup;
          },
          createTag: function(params) {
            var obj = {
              id: params.term,
              text: params.term,
              title: params.term
            };
            return obj;
          },
          insertTag: function(data, tag){    
            tag.text = "Adicionar nova raça: '" + tag.text + "'";          
            data.push(tag);
            var novaraca = document.getElementById("novaraca");
            $(novaraca).val('1');
          }
        }); 

        $("#pelagem").select2({
          tags: true,
          escapeMarkup: function(markup) {
            return markup;
          },
          createTag: function(params) {
            var obj = {
              id: params.term,
              text: params.term,
              title: params.term
            };
            return obj;
          },
          insertTag: function(data, tag){    
            tag.text = "Adicionar nova pelagem: '" + tag.text + "'";          
            data.push(tag);
            var novapelagem = document.getElementById("novapelagem");
            $(novapelagem).val('1');
          }
        });
        
        $("#localizacao").select2({
          tags: true,
          escapeMarkup: function(markup) {
            return markup;
          },
          createTag: function(params) {
            var obj = {
              id: params.term,
              text: params.term,
              title: params.term
            };
            return obj;
          },
          insertTag: function(data, tag){    
            tag.text = "Adicionar nova localizacao: '" + tag.text + "'";          
            data.push(tag);
            var novalocalizacao = document.getElementById("novalocalizacao");
            $(novalocalizacao).val('1');
          }
        }); 

      });
    </script>

  </div>
@stop
