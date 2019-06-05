@extends('dashboard.master')
@section('title')
	ParkOn: Espaco
@stop
@section('heading')
	Registro de Espaco
@stop
@section('content')
<form action="{{url('espacos', [$espaco->id])}}" method="POST" class="form form-group">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}

    <div class="input-group fix">
		<label class="input-group-addon">Atribuicao:</label>
		<select class="">
			<optgroup>
				<option>Diario</option>
				<option>Mensal</option>
			</optgroup>
		</select>
	</div>
	                  
	<div class="input-group fix">
		<label class="input-group-addon">Estado:</label>
		<select class="">
			<optgroup>
				<option>Desocupado</option>
				<option>Ocupado</option>
			</optgroup>
		</select>
	</div>

	<div class="input-group fix">
		<label class="input-group-addon">Parque:</label>
		<input type="text" class="form-control" disabled="" value="#1000">
	</div>

	<div class="input-group fix">
		<input type="submit" class="btn btn-primary" value="Registrar">
	</div>
</form>
@stop
