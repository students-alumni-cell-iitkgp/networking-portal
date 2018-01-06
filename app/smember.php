<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smember extends Model
{
    protected $fillable = [
        'name', 'email','url','access'
    ];
}
