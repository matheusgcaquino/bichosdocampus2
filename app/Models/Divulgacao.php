<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divulgacao extends Model
{
    protected $table = 'divulgacaos';

    protected $primaryKey = 'id_divulgacao';

    protected $fillable = ['id_user', 'conteudo', 'enviado'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsto('App\User', 'id_user');
    }
}
