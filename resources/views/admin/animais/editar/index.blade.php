@extends('adminlte::page')

@section('title', 'Editar Animal - Bichos do Campus')

@section('content_header')
@stop

@section('content')
  @php
    
    $idade = \Carbon\Carbon:: today() -> diffInMonths($results->idade_animal);
    ($idade = $idade == 1 ? $idade." Mês" : $idade." Meses");
    
    if($results->foto_animal){
      if(Storage::disk('local')->exists('storage/'.$results->foto_animal)){
        $foto = 'storage/'.$results->foto_animal;
      }else{
        $foto = "images/foto-icon.png";
      }
    }else{
      $foto = "images/foto-icon.png";
    }
  @endphp
  <div class="box">
    <form action = "{{route('atualizar.animais')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" id="id" value="{{$results->id_animal}}">
      <div class="box-header">
        <h3 class="box-title">Editar Animal</h3>
      </div>
      
      <div class="box-body">
        <div class="form-group col-md-6">
          <label for="name">Nome </label>
          <input type="text" class="form-control" id="name" value="{{$results->nome_animal}}">
        </div>
        
        <div class="form-group col-md-6">
          <label for="race">Raça </label>
          <input type="text" class="form-control" id="race" value="{{$results->raca_animal}}">
        </div>
        
        <div class="form-group col-md-6">
          <label for="race">Idade </label>
          <input type="text" class="form-control" id="idade" value="{{$idade}}">
        </div>
        
        <div class="form-group col-md-6">
          <label>Pelagem</label>
          <textarea class="form-control" rows="2" id="pelagem" 
          placeholder="Pelagem do Animal">{{$results->pelagem_animal}}</textarea>
        </div>

        <div class="form-group col-md-6">
          <label>Comportamento</label>
          <textarea class="form-control" rows="2" id="comportamento" 
          placeholder="Comportamento do Animal">{{$results->comportamento_animal}}</textarea>
        </div>

        <div class="form-group col-md-6">
            <label>Descrição</label>
            <textarea class="form-control" rows="3" id="descricao" 
            placeholder="Descrição do Animal">{{$results->descricao_animal}}</textarea>
        </div>

        <div class="form-group col-md-6">
          <label>Sexo</label>
          @if ($results->sexo_animal == 'M')
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
          @if ($results->castracao_animal)
            <div class="radio">
              <label>
                <input type="radio" name="castrado" id="castrado1" value="1" checked="">
                Sim
              </label>
            </div>
            
            <div class="radio">
              <label>
                <input type="radio" name="castrado" value="0">
                Não
              </label>
            </div>
          @else
            <div class="radio">
              <label>
                <input type="radio" name="castrado"  value="1">
                Sim
              </label>
            </div>
            
            <div class="radio">
              <label>
                <input type="radio" name="castrado" value="0" checked="">
                Não
              </label>
            </div>
          @endif
        </div>

        <div class="form-group col-md-6">
          <label> Status </label>
          <select class="form-control" name="status">
            @if($results->status_animal)
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
              src="{{url($foto)}}" alt="User profile picture">
          </div>
            <label for="foto">Alterar Imagem</label>
            <input type="file" id="foto">
        </div>

      </div>
      
      <div class="box-footer with-border">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/animais/ver" class="btn btn-default">Cancelar</a>
      </div>
    </form>
  </div>
@stop
