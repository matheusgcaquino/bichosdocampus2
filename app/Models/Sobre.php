<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sobre extends Model
{
    protected $table = 'sobre';

    protected $primaryKey = 'id_sobre';

    protected $fillable = ['sobre'];

    public $timestamps = false;
}
