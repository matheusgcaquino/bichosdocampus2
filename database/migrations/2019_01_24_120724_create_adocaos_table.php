<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdocaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adocaos', function (Blueprint $table) {
            $table->increments('id_adocao');         
            $table->integer('id_animal')->unsigned()->nullable(false);
            $table->string('nome_adocao', 60)->nullable(false);
            $table->string('nascimento_adocao', 60)->nullable(false);
            $table->string('telefone_adocao', 20)->nullable(false);
            $table->string('email_adocao', 50)->nullable(false);
            $table->string('cpf_adocao', 20)->nullable(false);
            $table->string('logradouro_adocao', 150)->nullable(false);
            $table->string('bairro_adocao', 150)->nullable(false);   
            $table->string('cidade_adocao', 150)->nullable(false);
            $table->string('estado_adocao', 150)->nullable(false);
            $table->string('cep_adocao', 150)->nullable(false);
            $table->string('residencia_adocao', 150)->nullable(false);
            $table->string('codigo_adocao')->nullable(true);
            $table->timestamps();

            $table->foreign('id_animal')->references('id_animal')->on('animals')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adocaos');
    }
}
