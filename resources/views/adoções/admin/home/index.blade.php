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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Animal</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($results as $dummy)
                        <tr>
                            <td>{{$dummy->nome_adocao}}</td>
                            <td>{{$dummy->cpf_adocao}}</td>
                            <td>{{$dummy->endereco_adocao}}</td>
                            <td>{{$dummy->telefone_adocao}}</td>
                            <td>{{$dummy->email_adocao}}</td>
                            <td>{{$dummy->data_adocao}}</td>
                            <td>{{$dummy->status_adocao}}</td>
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