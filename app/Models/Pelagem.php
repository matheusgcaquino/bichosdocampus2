<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelagem extends Model
{
    protected $table = 'pelagem';

    protected $primaryKey = 'id_pelagem';

    protected $fillable = ['pelagem'];

    public $timestamps = false;

    public function animal()
    {
        return $this->hasMany('App\Models\Animal', 'id_pelagem');
    }
}
