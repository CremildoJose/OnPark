@extends('dashboard.master')
@section('title')
	ParkOn: Espaco
@stop
@section('heading')
	Registro de Espaco
@stop
@section('content')
<a class="btn btn-primary" href="/espaco/create">Adicionar</a>
<hr>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Espaco</th>
            <th>Atribuicao</th>
            <th>Estado</th>
            <th>Opcao</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Espaco</td>
            <td>Atribuicao</th>
            <td>Estado</th>
            <td>
                <button class="btn btn-info glyphicon glyphicon-pencil"></button>
                <button class="btn btn-danger glyphicon glyphicon-remove"></button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Espaco</td>
            <td>Atribuicao</th>
            <td>Estado</th>
            <td>
                <button class="btn btn-info glyphicon glyphicon-pencil"></button>
                <button class="btn btn-danger glyphicon glyphicon-remove"></button>
            </td>
        </tr>
    </tbody>
</table>
@stop
