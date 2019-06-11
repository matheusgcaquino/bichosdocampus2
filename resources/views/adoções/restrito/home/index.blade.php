@extends('adminlte::page')

@section('title', 'Adoções de Animais - Bichos do Campus')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header" style="text-align: center;">
            <h3>Gerenciamento de Requisições de <STRONG>Adoção</STRONG></h3>
        <div class="box-header">
            @if (isset($buscar))
                <a href="{{route('site.adocoes')}}" class="btn btn-danger pull-left">
                Limpar Busca</a>
            @endif
            <div class="input-group pull-right col-md-3">
                <input type="text" class="form-control" name="buscar" id="buscar" 
                placeholder="Buscar por Animal" value="{{(isset($buscar) ? $buscar : '')}}"> 
                <span class="input-group-btn">
                    <button id="btn-buscar" type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
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
                    @endphp
                    <div class="col-md-3">
                        <div class="box box-danger cardA">
                            <div class="box-body box-profile" style="border: solid 2px #f1f1f1; padding: 0;">
                                <div style="width: 100%;" >
                                    <img  src="{{$foto}}" alt="User profile picture" >
                                </div>
                
                                <h3 class="profile-username text-center">{{ $result->nome_animal }}</h3>
                                @if ($result->status_animal == 2)
                                        <div class="form-group">
                                            <div class="bg-orange-active color-palette">
                                                <span>Adotado</span>
                                            </div>
                                        </div>
                                @else
                                    <ul class="list-group list-group-unbordered" style="padding: 4%; font-size: 0.9em;">
                                        <li class="list-group-item">
                                            <b>Requisições em avaliação</b> 
                                            <a class="pull-right">
                                                <span class="label" style="background-color: #9f0bba;">
                                                    {{$result->avaliando}}
                                                </span>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Requisições em espera</b> 
                                            <a class="pull-right">
                                                <span class="label" style="background-color: #0400FF;">
                                                    {{$result->visualizado}}
                                                </span>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Novas requisições</b> 
                                            <a class="pull-right">
                                                <span class="label" style="background-color: #26FF00;">
                                                    {{$result->novo}}
                                                </span>
                                            </a>
                                        </li>                                        
                                        <li class="list-group-item">
                                            <b>Total de requisições</b> 
                                            <a class="pull-right">
                                                <span class="label" style="background-color: #000000;">
                                                    {{$result->adocao_count}}
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                                

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
  width: 100%;
  height: 150px;
 
}
</style>
@stop