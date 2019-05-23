<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Animal extends Model
{

    protected $table = 'animals';

    protected $primaryKey = 'id_animal';

    protected $fillable = ['nome_animal','id_local', 'id_raca', 'foto_perfil',
        'idade_animal', 'sexo_animal', 'id_pelagem', 'comportamento_animal', 
        'castracao_animal', 'descricao_animal', 'status_animal'];

    public $timestamps = true;

    public function foto()
    {
        return $this->hasMany('App\Models\Foto_animals', 'id_animal');
    }

    public function adocao()
    {
        return $this->hasMany('App\Models\Adocao', 'id_animal');
    }

    public function raca()
    {
        return $this->belongsto('App\Models\Raca', 'id_raca');
    }

    public function pelagem()
    {
        return $this->belongsto('App\Models\Pelagem', 'id_pelagem');
    }

    public function local()
    {
        return $this->belongsto('App\Models\Local', 'id_local');
    }

    public function status_adocao()
    {
        return $this->hasManyThrough(
            'App\Models\StatusAdocao', 
            'App\Models\Adocao', 
            'id_animal',    // Foreign key on adocao table..
            'id_adocao',    // Foreign key on status table..
            'id_animal',    // Local key on animal table...
            'id_adocao'     // Local key on adocao table...
        );
    }
}
