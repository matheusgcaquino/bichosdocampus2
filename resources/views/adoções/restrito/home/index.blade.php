@php
    // dd($results);
@endphp
@extends('adminlte::page')

@section('title', 'Adoções de Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header">
        </div>

        <div class="box-body">
            @if(!$results->isEmpty())
                @foreach($results as $result)
                    @php                     
                        $foto = url("images/foto-icon.png");
            
                        if($result->foto_perfil && Storage::disk('public_uploads')
                            ->exists($result->foto_perfil)){
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
                    
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Novas requisições</b> 
                                        <a class="pull-right">{{$result->novo}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Requisições em espera</b> 
                                        <a class="pull-right">{{$result->visualizada}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Requisições em avaliação</b> 
                                        <a class="pull-right">{{$result->avaliacao}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Total de requisições</b> 
                                        <a class="pull-right">{{$result->adocao_count}}</a>
                                    </li>
                                </ul>

                                <a href="{{route('adocoes.requisições', ['id' => $result->id_animal])}}" 
                                    class="btn btn-block btn-primary">Mostrar Requisições
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <center><h3>Nenhuma Adoção encontrada!</h3></br>
            @endif
        </div>

        <div class="box-footer">
            <div class="pull-right">
                {{$results->links()}}
            </div>
        </div>
    </div>
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