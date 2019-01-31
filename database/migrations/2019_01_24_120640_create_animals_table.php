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
        // Cria a tabela animal no banco de dados -> [EikE]
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id_animal');
            $table->integer('user_id') -> unsigned();            
            $table->string('nome_animal', 60);
            $table->string('raca_animal', 30);
            $table->date('idade_animal');
            $table->enum('sexo_animal', ['M', 'F']);
            $table->string('pelagem_animal', 50);
            $table->string('comportamento_animal', 50);
            $table->boolean('castracao_animal');
            $table->string('descricao_animal', 150);
            $table->string('foto_animal', 150);
            $table->boolean('status_animal');
            $table->timestamps();

            $table->foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
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
