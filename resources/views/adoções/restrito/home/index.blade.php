@php
    // dd($results);
@endphp
@extends('adminlte::page')

@section('title', 'Adoções de Animais - Bichos do Campus')

@section('content_header')
@stop

@php
    use App\Http\Controllers\Suporte\StatusController;
@endphp

@section('content')
    <div class="box">
        <div class="box-header" style="text-align: center;">
            <h3>Gerenciamento de Requisições de <STRONG>Adoção</STRONG></h3>
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
                        $status = StatusController::status_num($result->adocao);
                    @endphp
                    <div class="col-md-3">
                        <div class="box box-primary" style="border: solid 2px #f1f1f1; border-top: 2px solid #dd4b39;">
                            <div class="box-body box-profile" style="border: solid 2px #f1f1f1;">
                                <div class="im">
                                    <img  src="{{$foto}}" alt="User profile picture" >
                                </div>
                
                                <h3 class="profile-username text-center">{{ $result->nome_animal }}</h3>
                    
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Novas requisições</b> 
                                        <a class="pull-right">{{$status[0]}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Requisições em espera</b> 
                                        <a class="pull-right">{{$status[1]}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Requisições em avaliação</b> 
                                        <a class="pull-right">{{$status[2]}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Total de requisições</b> 
                                        <a class="pull-right">{{$result->adocao->count()}}</a>
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