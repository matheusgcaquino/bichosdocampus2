<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_animals', function (Blueprint $table) {
            $table->increments('id_foto_animals');
            $table->integer('id_animal')->unsigned();
            $table->string('foto_animal', 1200);

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
        Schema::dropIfExists('foto_animals');
    }
}
