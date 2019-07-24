<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';

    protected $primaryKey = 'id_email';

    protected $fillable = ['email', 'ativo'];

    public $timestamps = false;
}
