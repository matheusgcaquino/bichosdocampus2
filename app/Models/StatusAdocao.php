<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusAdocao extends Model
{
    protected $table = 'status_adocao';

    protected $primaryKey = 'id_status';

    protected $fillable = ['id_user', 'status_adocao', 'comentario', 'id_adocao'];

    public $timestamps = true;

    public function adocao()
    {
        return $this->belongsto('App\Models\Adocao', 'id_adocao');
    }

    public function user()
    {
        return $this->belongsto('App\User', 'id_user');
    }
}
