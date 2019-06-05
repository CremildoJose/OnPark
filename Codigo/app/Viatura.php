<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\

class Viatura extends Model
{
	protected $fillable = ['clientid','dataEntrada','dataSaida', 'marca','matricula','modelo',];
    protected $table = 'viatura';
}
