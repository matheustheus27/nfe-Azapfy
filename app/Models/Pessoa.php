<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Pessoa extends Eloquent
{
    protected $fillable = [
        'nome',
        'idade',
        'sexo'
    ];

    protected $hidden = [
        '_id',
        'updated_at',
        'created_at',
    ];
}
