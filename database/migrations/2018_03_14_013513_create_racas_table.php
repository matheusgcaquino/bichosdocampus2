<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raca', function (Blueprint $table) {
            $table->increments('id_raca');
            $table->integer('id_especie')->unsigned()->nullable(false);
            $table->string('raca', 30)->nullable(false);

            $table->foreign('id_especie')->references('id_especie')->on('especie')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('racas');
    }
}
