<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $table = 'especie';

    protected $primaryKey = 'id_especie';

    protected $fillable = ['especie'];

    public $timestamps = false;

    public function raca()
    {
        return $this->hasMany('App\Models\Raca', 'id_especie');
    }
}
