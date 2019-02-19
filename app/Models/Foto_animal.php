<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto_animal extends Model{

    protected $table = 'foto_animals';

    protected $primaryKey = 'id_foto_animal';

    protected $fillable = ['id_animal','foto_animal'];

    public $timestamps = false;

    public function animal(){
        return $this->belongsTo('Animal', 'id_animal');
    }
}
