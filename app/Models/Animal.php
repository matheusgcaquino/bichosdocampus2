<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Animal extends Model
{
    protected $fillable = ['nome_animal','especie_animal', 'raca_animal', 'idade_animal', 'sexo_animal', 'pelagem_animal', 'comportamento_animal', 'castracao_animal', 'descricao_animal', 'foto_animal', 'status_animal'];

    public $timestamps = true;
}
