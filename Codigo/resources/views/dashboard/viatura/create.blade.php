@extends('dashboard.master')
@section('title')
	ParkOn: Viatura
@stop
@section('heading')
	Registro de Viatura de Cliente Mensal
@stop
@section('content')
    <form action="/pesquisa/" method="get" class="form form-group">
        <div class="input-group fix">
            <label class="input-group-addon">Matricula:</label>
            <input type="text" class="form-control">
        </div>

        <div class="input-group fix">
            <label class="input-group-addon">Marca:&&</label>
            <input type="text" class="form-control">
        </div>

        <div class="input-group fix">
            <label class="input-group-addon">Modelo:&</label>
            <input type="text" class="form-control">
        </div>

        <div class="input-group fix">
            <label class="input-group-addon">Cliente Mensal:</label>  
            <select class="">
                <optgroup>
                    <option>#1000</option>
                    <option>#1001</option>
                    <option>#1002</option>
                    <option>#1003</option>
                    <option>#1004</option>
                    <option>#1005</option>
                </optgroup>
            </select>
            <label>Nome do Cliente</label>
        </div>

        <div class="input-group fix">
            <input type="submit" class="btn btn-primary" value="Registrar">
        </div>
    </form>
@stop
