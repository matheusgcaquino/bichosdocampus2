<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id_animal');
            $table->string('nome_animal', 50);
            $table->string('raca_animal', 30);
            $table->date('idade_animal');
            $table->enum('sexo_animal', ['M', 'F']);
            $table->string('pelagem_animal', 30);
            $table->string('comportamento_animal', 50);
            $table->boolean('castracao_animal');
            $table->string('descricao_animal', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
