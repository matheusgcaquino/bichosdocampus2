@extends('adminlte::page')

@section('title', 'Editar Animal - Bichos do Campus')

@section('content_header')
@stop

@section('content')
  @php
    use App\Http\Controllers\Suporte\DataController; 
    
    $idade = DataController::getData($result->idade_animal);
    
    $foto = url("imagens/foto-icon.png");

    if($result->foto_perfil && Storage::disk('public_uploads')->exists($result->foto_perfil)){
      $foto = url("uploads/".$result->foto_perfil);
    }
  @endphp

  <div class="box">
    <form action = "{{route('atualizar.animais')}}" method="POST" enctype="multipart/form-data">
      
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$result->id_animal}}">

      <div class="box-header">
        <h3 class="box-title">Editar Animal</h3>
      </div>
      
      <div class="box-body">

        <div class="form-group col-md-6">
          <label for="nome"> Nome  <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{$result->nome_animal}}">
        </div>

        <div class="form-group col-md-3">
          <label for="anos"> Anos  </label>
          <select type="number" placeholder="Anos" min="0" max="10" class="form-control" id="numeroano" name="numeroano">
            <option value="0">Menos que 1 ano</option>
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
            <option value="0"> 0 Mês</option>
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
          <select class="form-control" id="especie" name="especie" placeholder="Especie do Animal" onchange="addRaca(this.value);" style="width: 100%;" required>
          <option value=""> Escolha uma espécie. </option>
            @foreach ($resultsespecie as $resultespecie)            
              @if ($result->raca->especie->id_especie == $resultespecie->id_especie)
                <option selected="selected" value="{{ $resultespecie->id_especie }}"> {{ $resultespecie->especie }} </option>
              @else
                <option value="{{ $resultespecie->id_especie }}"> {{ $resultespecie->especie }} </option>
              @endif              
            @endforeach         
          </select>
          <input type="checkbox" id="novaespecie" name="novaespecie" value="" style="display:none" checked="checked" />
        </div>

        <div class="form-group col-md-6" id="div_raca">
          <label for="raca"> Raça <font color="red"> * <font color="black"> </label>
          <select class="form-control" id="raca" name="raca" placeholder="Raça do Animal" style="width: 100%;" required>
            <option value=""> Escolha uma raça. </option>
            @foreach ($resultsraca as $resultraca)            
              @if ($result->raca->id_raca == $resultraca->id_especie)
                <option selected="selected" value="{{ $resultraca->id_raca }}"> {{ $resultraca->raca }} </option>
              @else
                <option value="{{ $resultraca->id_raca }}"> {{ $resultraca->raca }} </option>
              @endif              
            @endforeach
          </select>
          <input type="checkbox" id="novaraca" name="novaraca" value="" style="display:none" checked="checked" />
        </div>

        <div class="form-group col-md-6">
          <label for="pelagem"> Pelagem <font color="red"> * <font color="black"> </label>
          <select class="form-control" rows="2" id="pelagem" name="pelagem" placeholder="Pelagem do Animal" style="width: 100%;" required>
            <option value=""> Escolha uma pelagem. </option>
            @foreach ($resultspelagem as $resultpelagem)            
              @if ($result->id_pelagem == $resultpelagem->id_pelagem)
                <option selected="selected" value="{{ $resultpelagem->id_pelagem }}"> {{ $resultpelagem->pelagem }} </option>
              @else
                <option value="{{ $resultpelagem->id_pelagem }}"> {{ $resultpelagem->pelagem }} </option>
              @endif              
            @endforeach
          </select>
          <input type="checkbox" id="novapelagem" name="novapelagem" value="" style="display:none" checked="checked" />
        </div>
        
        <div class="form-group col-md-6">
          <label for="localizacao"> Localização <font color="red"> * <font color="black"> </label>
          <select class="form-control" rows="2" id="localizacao" name="localizacao" placeholder="Localização do Animal" style="width: 100%;">
            <option selected="selected" value=""> Escolha uma localizacao. </option>
            @foreach ($resultslocalizacao as $resultlocalizacao)            
              @if ($result->id_local == $resultlocalizacao->id_local)
                <option selected="selected" value="{{ $resultlocalizacao->id_local }}"> {{ $resultlocalizacao->local }} </option>
              @else
                <option value="{{ $resultlocalizacao->id_local }}"> {{ $resultlocalizacao->local }} </option>
              @endif              
            @endforeach
          </select>
          <input type="checkbox" id="novalocalizacao" name="novalocalizacao" value="" style="display:none" checked="checked" />
        </div>
    
        <div class="form-group col-md-6">
          <label for="comportamento"> Comportamento <font color="red"> * <font color="black"> </label>
          <input class="form-control" rows="2" id="comportamento" name="comportamento" 
            value="{{$result->comportamento_animal}}" required>
        </div>
    
        <div class="form-group col-md-6">
            <label> Status </label>
            <select class="form-control" name="status">
              @if($result->status_animal)
                <option value="1">Ativado</option>
                <option value="0">Desativado</option>
              @else
                <option value="0">Desativado</option>
                <option value="1">Ativado</option>
              @endif
            </select>
          </div>
    
        <div class="form-group col-md-6">
            <label>Sexo</label>
            @if ($result->sexo_animal == 'M')
              <div class="radio">
                <label>
                  <input type="radio" name="sexo" id="sexo1" value="M" checked="">
                  Macho
                </label>
              </div>
              
              <div class="radio">
                <label>
                  <input type="radio" name="sexo" id="sexo2" value="F">
                  Fêmea
                </label>
              </div>
            @else
              <div class="radio">
                <label>
                  <input type="radio" name="sexo" id="sexo1" value="M">
                  Macho
                </label>
              </div>
              
              <div class="radio">
                <label>
                  <input type="radio" name="sexo" id="sexo2" value="F" checked="">
                  Fêmea
                </label>
              </div>
            @endif
          </div>
    
          <div class="form-group col-md-6">
              <label>Castrado</label>
              @if ($result->castracao_animal)
                <div class="radio">
                  <label>
                    <input type="radio" name="castrado" id="castrado1" value="1" checked="">
                    Sim
                  </label>
                </div>
                
                <div class="radio">
                  <label>
                    <input type="radio" name="castrado" id="castrado2" value="0">
                    Não
                  </label>
                </div>
              @else
                <div class="radio">
                  <label>
                    <input type="radio" name="castrado" id="castrado1" value="1">
                    Sim
                  </label>
                </div>
                
                <div class="radio">
                  <label>
                    <input type="radio" name="castrado" id="castrado2" value="0" checked="">
                    Não
                  </label>
                </div>
              @endif
            </div>
    
            <div class="form-group">
                <div class="pull-left">
                    <img class="profile-user-img img-responsive img-circle" 
                    src="{{$foto}}" alt="User profile picture">
                
                  </div>
                  <label for="foto">Alterar Imagem</label>
                  <input type="file" id="foto" name="foto">
                </div>
      
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="excluirFoto" name="excluirFoto"> Excluir Foto
                  </label>
                </div>
            </div>

        <div class="form-group col-md-6">
          <label for="descricao"> Descrição </label>
          <textarea class="form-control" rows="3" id="descricao" name="descricao" 
            placeholder="Descrição do Animal"> {{$result->descricao_animal}} </textarea>
        </div>
      
      <div class="box-footer with-border">
        <button type="submit" id="btnConfirmar" class="btn btn-primary">Salvar</button>
        <a href="{{route('site.animais')}}" class="btn btn-default">Cancelar</a>
      </div>
    </form>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/modulos/animais/formulario/formulario.js')}}"></script>

  </div>
   
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
  
      var ValorAno = "<?php echo $idade[0] ?>"
      var ValorMes = "<?php echo $idade[1] ?>"
      var ano = document.getElementById('numeroano');
      var mes = document.getElementById('numeromeses');
      ano.value = ValorAno;
      mes.value = ValorMes;

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

@stop
