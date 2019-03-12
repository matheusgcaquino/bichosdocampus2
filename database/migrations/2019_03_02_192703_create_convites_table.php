<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convites', function (Blueprint $table) {
            $table->increments('id_convite');
            $table->string('key')->unique();
            $table->string('email')->unique();
            $table->tinyInteger('nivel_user');
            $table->tinyInteger('status_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convites');
    }
}
