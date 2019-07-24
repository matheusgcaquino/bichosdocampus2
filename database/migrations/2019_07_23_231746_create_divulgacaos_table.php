<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivulgacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divulgacaos', function (Blueprint $table) {
            $table->increments('id_divulgacao');
            $table->bigInteger('id_user')->unsigned()->nullable(true);
            $table->string('conteudo', 700)->nullable(false);
            $table->boolean('enviado')->default(false);

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divulgacaos');
    }
}
