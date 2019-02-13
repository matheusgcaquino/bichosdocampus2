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
            $table->integer('id_animal')->unsigned();
            $table->string('nome_adotante', 60);
            $table->string('cpf_adotante', 15);
            $table->string('endereco_adotante', 150);
            $table->string('telefone_adotante', 12);
            $table->string('email_adotante', 50);          
            $table->date('data_adocao');
            $table->boolean('status_adocao');
            $table->timestamps();

            $table->foreign('id_animal')->references('id_animal')->on('animals')
                ->onDelete('cascade');
            
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
