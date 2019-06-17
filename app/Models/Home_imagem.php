<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home_imagem extends Model
{
    protected $table = 'home_imagems';

    protected $primaryKey = 'id_home';

    protected $fillable = ['home_imagem', 'posicao'];

    public $timestamps = false;
}
