<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adocao extends Model
{

    protected $table = 'adocaos';

    protected $primaryKey = 'id_adocao';

    protected $fillable = 
    [
        'id_animal',
        'nome_adocao',
        'nascimento_adocao',
        'telefone_adocao',
        'email_adocao',
        'cpf_adocao',
        'rua_adocao',
        'numero_adocao',
        'complemento_adocao',
        'bairro_adocao',
        'cidade_adocao',
        'estado_adocao',
        'cep_adocao',
        'status_adocao',
        'codigo_adocao',
        'residencia_adocao'
    ];

    public $timestamps = true;

    public function animal()
    {
        return $this->belongsto('App\Models\Animal', 'id_animal');
    }

    public function status()
    {
        return $this->hasMany('App\Models\StatusAdocao', 'id_adocao');
    }

}
