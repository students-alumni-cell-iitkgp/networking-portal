<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addtag extends Model
{
     protected $fillable = [
        'alum_id', 'alum_name', 'tags'
    ];
}
