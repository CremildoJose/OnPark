<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDiario extends Model 
{
    protected $fillable = ['matricula','marca','modelo', 'dataEntrada', 'dataSaida', 'funcid'];
    protected $table = 'cliente_diario';
    protected $perPage = 2;
}
