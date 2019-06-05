@extends('dashboard.master')
@section('title')
	ParkOn: Cliente Diario
@stop
@section('heading')
	Registro de Cliente Diario
@stop
@section('content')
<a class="btn btn-primary" href="/mensal/create">Adicionar</a>
<hr>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Espaco</th>
            <th>Nome do Cliente</th>
            <th>Opcao</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>1</td>
                <td>Espaco</td>
                <td>Matricula</td>
                <td>
                    <button class="btn btn-info glyphicon glyphicon-pencil"></button>
                    <button class="btn btn-danger glyphicon glyphicon-remove"></button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Espaco</td>
                <td>Matricula</td>
                <td>
                    <button class="btn btn-info glyphicon glyphicon-pencil"></button>
                    <button class="btn btn-danger glyphicon glyphicon-remove"></button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Espaco</td>
                <td>Matricula</td>
                <td>
                    <button class="btn btn-info glyphicon glyphicon-pencil"></button>
                    <button class="btn btn-danger glyphicon glyphicon-remove"></button>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Matricula</td>
                <td>Estado</td>
                <td>
                    <button class="btn btn-info glyphicon glyphicon-pencil"></button>
                    <button class="btn btn-danger glyphicon glyphicon-remove"></button>
                </td>
            </tr>
        </tbody>
    </table>
@stop
