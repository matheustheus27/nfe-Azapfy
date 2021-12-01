<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class NFeModel extends Eloquent
{
    protected $table = 'nfe_test';

    protected $fillable = ['protNFe', 'NFe',];

    protected $hidden = ['_id','updated_at', 'created_at'];
}