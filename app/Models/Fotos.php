<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    protected $fillable = ['id_foto_animals', 'id_animal','foto_animal'];

    public $timestamps = false;
}
