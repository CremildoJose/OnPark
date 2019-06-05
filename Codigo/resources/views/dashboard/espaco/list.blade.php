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
        @foreach($espacos as $espaco)
        <tr>
            <td>{{$espaco->id}}</td>
            <td>{{$espaco->nome}}</td>
            <td>{{$espaco->atribuicao}}</th>
            <td>{{$espaco->estado}}</th>
            <td>
                <a href="/espaco/{{$espaco->id}}/edit" class="btn btn-info glyphicon glyphicon-pencil"></a>
                <a href="/espaco/{{$espaco->id}}" class="btn btn-danger glyphicon glyphicon-remove"></a>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
<?php echo $espacos->render(); ?>
@stop
