@extends('adminlte::page')

@section('title', 'Editar Animal - Bichos do Campus')

@section('content_header')
@stop

@section('content')
  @php
    use App\Http\Controllers\Suporte\DataController; 
    
    $idade = DataController::getData($result->idade_animal);
    
    $foto = url("images/foto-icon.png");

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
          <label for="name">Nome <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{$result->nome_animal}}">
        </div>
        
        <div class="form-group col-md-6">
          <label for="especie"> Espécie <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" id="especie" name="especie" value="{{$result->especie_animal}}">
        </div>

        <div class="form-group col-md-6">
          <label for="race">Raça <font color="red"> * <font color="black"> </label>
          <input type="text" class="form-control" id="raca" name="raca" value="{{$result->raca_animal}}">
        </div>
        
        <div class="form-group col-md-6">
          <label> Idade </label><br>
          <div class="form-input col-md-3">
          <input type="number" value="{{$idade[0]}}" min="0" class="form-control" id="numeroano" name="numeroano">
          </div>
        
          <div class="form-input col-md-3">
            <input type="number" value="{{$idade[1]}}" min="0" class="form-control" id="numeromeses" name="numeromeses">
          </div> 
        </div>
        
        <div class="form-group col-md-6">
          <label> Pelagem <font color="red"> * <font color="black"> </label>
          <textarea class="form-control" rows="2" id="pelagem" name="pelagem" 
          placeholder="Pelagem do Animal">{{$result->pelagem_animal}}</textarea>
        </div>

        <div class="form-group col-md-6">
          <label> Comportamento <font color="red"> * <font color="black"> </label>
          <textarea class="form-control" rows="2" id="comportamento" name="comportamento"
          placeholder="Comportamento do Animal">{{$result->comportamento_animal}}</textarea>
        </div>

        <div class="form-group col-md-6">
            <label> Descrição </label>
            <textarea class="form-control" rows="3" id="descricao" name="descricao"
            placeholder="Descrição do Animal">{{$result->descricao_animal}}</textarea>
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
      
      <div class="box-footer with-border">
        <button type="submit" id="btnConfirmar" class="btn btn-primary">Salvar</button>
        <a href="{{route('site.animais')}}" class="btn btn-default">Cancelar</a>
      </div>
    </form>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/modulos/animais/formulario/formulario.js')}}"></script>

  </div>
@stop
