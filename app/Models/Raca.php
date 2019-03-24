<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    protected $table = 'raca';

    protected $primaryKey = 'id_raca';

    protected $fillable = ['id_especie', 'raca'];

    public $timestamps = false;

    public function especie()
    {
        return $this->belongsto('App\Models\Especie', 'id_especie');
    }

    public function animal()
    {
        return $this->hasMany('App\Models\Animal', 'id_raca');
    }
}
