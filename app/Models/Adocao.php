<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adocao extends Model{

    protected $table = 'adocaos';

    protected $primaryKey = 'id_adocao';

    protected $fillable = ['id_animal','nome_adocao', 'cpf_adocao', 
    'endereco_adocao', 'telefone_adocao', 'email_adocao', 'data_adocao', 
    'status_adocao', 'codigo_adocao'];

    public $timestamps = true;

    public function animal(){
        $this->belongsto('Animal');
    }
}
