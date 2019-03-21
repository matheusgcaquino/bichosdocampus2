<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusAdocaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_adocao', function (Blueprint $table) {
            $table->increments('id_status');
            $table->integer('id_user')->unsigned()->nullable(true);
            $table->integer('id_adocao')->unsigned()->nullable(false);
            $table->tinyInteger('status_adocao')->default(0)->nullable(false);
            $table->string('comentario', 150)->nullable(true);
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('set null');
            $table->foreign('id_adocao')->references('id_adocao')->on('adocaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_adocao');
    }
}
