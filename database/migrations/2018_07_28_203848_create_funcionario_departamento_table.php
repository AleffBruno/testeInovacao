<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_departamento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_funcionario');
            $table->unsignedInteger('id_departamento');
            $table->foreign('id_departamento')->references('id')->on('departamento');
            $table->foreign('id_funcionario')->references('id')->on('funcionario');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario_departamento');
    }
}
