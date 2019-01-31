<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdotantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Cria a tabela adotante -> [EiKE]
        Schema::create('adotantes', function (Blueprint $table) {
            $table->increments('id_adotante');
            $table->string('nome_adotante', 60);
            $table->string('cpf_adotante', 15);
            $table->string('endereco_adotante', 150);
            $table->string('telefone_adotante', 12);
            $table->string('email_adotante', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adotantes');
    }
}
