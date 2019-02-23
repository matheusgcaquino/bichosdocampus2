@extends('adminlte::page')

@section('title', 'Usuários - Bichos do Campus')

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
                            <th>Email</th>
                            <th>Nivel</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{$result->name_user}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{$result->nivel_user}}</td>
                            <td>{{$result->status_user}}</td>
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