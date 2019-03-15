<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'local';

    protected $primaryKey = 'id_local';

    protected $fillable = ['local'];

    public $timestamps = false;

    public function animal()
    {
        return $this->hasMany('App\Models\Animal', 'id_local');
    }
}
