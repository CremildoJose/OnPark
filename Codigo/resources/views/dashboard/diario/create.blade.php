@extends('dashboard.master')
@section('title')
	ParkOn: Cliente Diario
@stop
@section('heading')
	Registro de Cliente Diario
@stop
@section('content')
<form action="/pesquisa/" method="get" class="form form-group">
	<div class="input-group fix">
		<label class="input-group-addon">Matr&iacute;cula</label>
		<input type="text" class="form-control">
	</div>
	                  
	<div class="input-group fix">
		<label class="input-group-addon">Marca&&</label>
		<input type="text" class="form-control">
	</div>

	<div class="input-group fix">
		<label class="input-group-addon">Modelo&</label>
		<input type="text" class="form-control">
	</div>

	<div class="input-group fix">
		<label class="input-group-addon">Espa&ccedil;o&</label>
		<select class="form">
			<optgroup>
				<option>ED01</option>
				<option>ED02</option>
				<option>ED03</option>
			</optgroup>
		</select>
	</div>                  
	                  
	<div class="input-group fix">
		<input type="submit" class="btn btn-primary" value="Registrar">
	</div>
</form>
@stop