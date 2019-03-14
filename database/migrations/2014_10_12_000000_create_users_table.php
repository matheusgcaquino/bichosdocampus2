<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Cria a tabela Usuarios -> [AdminLTE]
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('name_user');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('nivel_user');
            $table->tinyInteger('status_user')->nullable(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
