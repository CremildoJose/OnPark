@extends('dashboard.master')
@section('title')
	ParkOn: Cliente Diario
@stop
@section('heading')
	Registro de Cliente Diario
@stop
@section('content')
    <a class="btn btn-primary" href="/clienteDiario/create">Adicionar</a>
    <hr>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Opcao</th>
            </tr>
        </thead>
        <tbody>
            @foreach($diarios as $diario)
            <tr>
                <td>{{$diario->matricula}}</td>
                <td>{{$diario->marca}}</td>
                <td>{{$diario->modelo}}</td>
                <td>
                    <button class="btn btn-info glyphicon glyphicon-pencil"></button>
                    <button class="btn btn-danger glyphicon glyphicon-remove"></button>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
@stop
