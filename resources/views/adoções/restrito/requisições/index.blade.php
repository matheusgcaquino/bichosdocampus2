@extends('adminlte::page')

@section('title', 'Adoções de Animais - Bichos do Campus')

@section('content_header')
@stop

@php
    use App\Http\Controllers\Suporte\StatusController;
    // dd($results);
@endphp

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="text-center">Requisições para <strong> {{$animal->nome_animal}} </strong></h3>
            <a href="javascript:history.back()" class="btn btn-danger">
                <span class="fa fa-arrow-circle-left"></span>
                Voltar
            </a>
        </div>

        <div class="box-body">
            @if(!$results->isEmpty())
                @php
                    $foto = url("imagens/foto-icon.png");
                    if($animal->foto_perfil && Storage::disk('public_uploads')->exists($animal->foto_perfil)){
                        $foto = url("uploads/".$animal->foto_perfil);
                    }
                @endphp

                <div class="form-group col-md-4">
                    <img  src="{{$foto}}" alt="User profile picture"/>
                </div>

                <div class="table-responsive">
                
                <table class="table table-bordered">
                    <thead style="background-color: #f1f1f1">
                        <tr>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Adotante</th>
                            <th>Ação</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($results as $result)
                            @php
                                $stat = StatusController::last_status($result->status);
                            @endphp
                            <tr>
                                <td>{{$result->nome_adocao}}</td>
                                <td>{{$result->email_adocao}}</td>
                                <td>{{$result->created_at->format('d/m/y')}}</td>
                                <td>{!!$stat!!}</td>
                                <td>
                                    <a href="{{route('adocoes.requisição', 
                                        ['codigo' => $result->codigo_adocao])}}" 
                                        class="btn btn-block btn-primary"><span class="fa fa-eye"></span>  Visualizar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
                </div>
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
      background-repeat: no-repeat;
      padding: 5%;
      display:flex;
      align-items: center;
      justify-content: center;}

div img {
 max-width: 100%;
  max-height: 100%;
 
}
</style>
@stop
