<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacao', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_funcionario_departamento');
            $table->longText('descricao',500);
            //$table->decimal('valor', 8, 2); //ISSO É O CORRETO
            $table->string('valor'); // ISSO É UMA GAMBIARRA
            $table->foreign('id_funcionario_departamento')->references('id')->on('funcionario_departamento');


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
        Schema::dropIfExists('movimentacao');
    }
}
