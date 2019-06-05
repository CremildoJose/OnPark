@extends('layouts.app')
@section('title')
	ParkOn: Cliente Diario
@stop
@section('heading')
	Registro de Cliente Diario
@stop
@section('content')
    <input type="submit" class="btn btn-info" value="Adicionar">
    <hr>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Espaco</th>
                <th>Matricula</th>
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
        </tbody>
        </table>
@stop
