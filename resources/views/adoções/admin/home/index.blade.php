@php
    dd($results->all());
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