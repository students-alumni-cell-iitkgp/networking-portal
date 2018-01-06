<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class access extends Model
{
    
    protected $fillable = [
        'stud_id', 'name', 'access',
    ];
}
