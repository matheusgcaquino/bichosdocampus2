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
        // Cria tabela adocao -> [EiKE]
        Schema::create('adocaos', function (Blueprint $table) {
            $table->increments('id_adocao');         
            $table->integer('id_animal')->unsigned()->nullable(false);
            $table->string('nome_adocao', 60)->nullable(false);
            $table->string('cpf_adocao', 15)->nullable(false);
            $table->string('endereco_adocao', 150)->nullable(false);
            $table->string('telefone_adocao', 12)->nullable(false);
            $table->string('email_adocao', 50)->nullable(false);
            $table->date('data_adocao')->nullable(false);
            $table->boolean('status_adocao')->nullable(false); // 0 - Pedido, 1 - Confirmado, 2 - Cancelado
            $table->string('codigo_adocao')->nullable(false);
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
