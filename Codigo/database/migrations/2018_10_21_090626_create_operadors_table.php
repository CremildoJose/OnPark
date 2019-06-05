<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        protected $id;
        Schema::create('individuo'), function (Blueprint $table){
            $id = $table->increments('id');        
        });
        
        Schema::create('operador', function (Blueprint $table) {
            $table->int('id') = $id;
            $table->int('nuit');
            $table->string('funcao');
            $table->string('username');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operadors');
    }
}
