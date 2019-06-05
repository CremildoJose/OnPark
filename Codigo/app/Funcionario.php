<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $fillable = ['nuit','funcao','username'];
    protected $hidden = ['password','remember_token'];
}
