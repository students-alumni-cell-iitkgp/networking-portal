<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = [
        'name', 'email', 'address','city','country','mobile','dob','industry','year','notes'
    ];
}
