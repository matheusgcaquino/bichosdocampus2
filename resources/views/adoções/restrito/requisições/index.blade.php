@extends('adminlte::page')

@section('title', 'Adoções de Animais - Bichos do Campus')

@section('content_header')
@stop

@php
    use App\Http\Controllers\Suporte\StatusController;
@endphp


@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="text-center">Animal: {{$animal->nome_animal}}</h3>
        </div>

        <div class="box-body">
            @if(!$results->isEmpty())
                @php
                    $foto = url("images/foto-icon.png");
                    if($animal->foto_perfil && Storage::disk('public_uploads')->exists($animal->foto_perfil)){
                        $foto = url("uploads/".$animal->foto_perfil);
                    }
                @endphp
                {{-- <div class="im">
                    <img  src="{{$foto}}" alt="User profile picture" >
                </div> --}}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($results as $result)
                            @php
                                //$stat = StatusController::last_status($result->status);
                                $stat = null;
                            @endphp
                            <tr>
                                <td>{{$result->nome_adocao}}</td>
                                <td>{{$result->email_adocao}}</td>
                                <td>{{$result->created_at->format('d/m/y')}}</td>
                                <td>{!!$stat!!}</td>
                                <td>
                                    <a href="{{route('adocoes.requisição', 
                                        ['codigo' => $result->codigo_adocao])}}" 
                                        class="btn btn-block btn-primary">Visualisar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
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
