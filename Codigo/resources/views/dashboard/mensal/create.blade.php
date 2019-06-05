@extends('dashboard.master')
@section('title')
	ParkOn: Cliente Mensal
@stop
@section('heading')
	Registro de Cliente Mensal
@stop
@section('content')
<form action="/pesquisa/" method="get" class="form form-group">
                  <div class="input-group fix">
                    <label class="input-group-addon">Bi:&&&&&&&&&&&&&</label>
                    <input type="text" class="form-control">
                  </div>
                  
                  <div class="input-group fix">
                    <label class="input-group-addon">Nome:&&&&&&&&&&</label>
                    <input type="text" class="form-control">
                  </div>

                  <div class="input-group fix">
                    <label class="input-group-addon">Sobrenome:&&&&&&</label>
                    <input type="text" class="form-control">
                  </div>

                  <div class="input-group fix">
                    <label class="input-group-addon">Sexo:&&&&&&&&&&&</label>
                    <select class="">
                      <optgroup>
                        <option>Femenino</option>
                        <option>Masculino</option>
                      </optgroup>
                    </select>
                  </div>

                  <div class="input-group fix">
                    <label class="input-group-addon">Data de Nascimento:</label>
                    {!! Form::date('','') !!}
                  </div>

                  <div class="input-group fix">
                    <label class="input-group-addon">Idade:</label>
                    <input type="text" class="form-control" disabled="">
                  </div>
                  
                  <div class="input-group fix">
                    <label class="input-group-addon">Endereco&&&&&&&&:</label>
                    <input type="text" class="form-control">
                  </div>

                  <div class="input-group fix">
                    <input type="hidden" class="form-control" value="id operador">
                  </div>

                  <div class="input-group fix">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                  </div>
                </form>
@stop