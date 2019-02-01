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
            $table->integer('id_adotante')->unsigned();            
            $table->integer('id_animal')->unsigned();
            $table->date('data_adocao');
            $table->boolean('status_adocao');
            $table->timestamps();

            $table->foreign('id_adotante')->references('id_adotante')->on('adotantes')->onDelete('cascade');
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
