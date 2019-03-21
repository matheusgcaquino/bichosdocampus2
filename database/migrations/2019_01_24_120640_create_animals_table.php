<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Cria a tabela animal no banco de dados -> [EikE]
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id_animal');      
            $table->string('nome_animal', 60)->nullable(false);
            $table->string('especie_animal', 60)->nullable(false);
            $table->string('raca_animal', 30)->nullable(false);
            $table->date('idade_animal')->nullable(false);
            $table->enum('sexo_animal', ['M', 'F'])->nullable(false);
            $table->string('pelagem_animal', 50)->nullable(false);
            $table->string('comportamento_animal', 50)->nullable(false);
            $table->boolean('castracao_animal')->nullable(false);
            $table->string('descricao_animal', 300)->nullable(true);
            $table->string('foto_perfil', 1200)->nullable(true);            
            $table->tinyInteger('status_animal')->nullable(false); // 0 - Ativado, 1 - Desativado, 2 - Espera, 3 - Confirmado, 4 - Cancelado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('animals');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
