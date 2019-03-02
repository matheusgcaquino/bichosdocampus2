<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convite extends Model
{
    protected $table = 'convites';

    protected $primaryKey = 'id_convite';

    protected $fillable = ['key', 'email', 'nivel_user', 'status_user'];

    public $timestamps = true;
}
