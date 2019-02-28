<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Animal extends Model{

    protected $table = 'animals';

    protected $primaryKey = 'id_animal';

    protected $fillable = ['nome_animal','especie_animal', 'raca_animal', 'foto_perfil',
        'idade_animal', 'sexo_animal', 'pelagem_animal', 'comportamento_animal', 
        'castracao_animal', 'descricao_animal', 'status_animal'];

    public $timestamps = true;

    public function foto(){
        return $this->hasMany('App\ModelsFoto_animals', 'id_animal');
    }

    public function adocao(){
        return $this->hasMany('App\Models\Adocao', 'id_animal');
    }
}
