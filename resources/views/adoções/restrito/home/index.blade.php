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
<<<<<<< HEAD
        <div class="box-header" style="text-align: center;">
            <h3>Gerenciamento de Requisições de <STRONG>Adoção</STRONG></h3>
=======
        <div class="box-header">
            <div class="input-group pull-right col-md-3">
                <input type="text" class="form-control" name="buscar" id="buscar" 
                placeholder="Buscar por Animal" value="{{(isset($buscar) ? $buscar : '')}}"> 
                <span class="input-group-btn">
                    <button id="btn-buscar" type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
>>>>>>> f5c1f2ea7fd800d050673c21c4e5952dcfc0fd55
        </div>

        <div class="box-body">
            @if(!$results->isEmpty())
                @foreach($results as $result)
                    @php                     
                        $foto = url("imagens/foto-icon.png");
            
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

@section('js')
    <script>
         $(this).on('keyup', function (e) {
            if (e.keyCode == 13) {
            if ($('#buscar').val() !== '') {
                let busca = $('#buscar').val();
                // console.log(window.location.href);
                window.location.href = getBaseAnimalUrl() + '/buscar/' + busca;
            }else{
                window.location.href = getBaseAnimalUrl();
            }
            }
        });

        $('#btn-buscar').on('click', function () {
        let busca = $('#buscar').val();
        // console.log(window.location.href);
        if ($('#buscar').val() !== '') {
            let busca = $('#buscar').val();
            // console.log(window.location.href);
            window.location.href = getBaseAnimalUrl() + '/buscar/' + busca;
        }else{
            window.location.href = getBaseAnimalUrl();
        }
        
        });

        function getBaseAnimalUrl() {
            return '/adoções';
        }
    </script>
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