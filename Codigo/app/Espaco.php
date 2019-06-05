<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espaco extends Model
{
    protected $fillable = ['atribuicao','estado','iddiario', 'iddmensal'];
    protected $table = 'espaco';
    protected $perPage = 2;
}
