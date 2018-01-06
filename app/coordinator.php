<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coordinator extends Model
{
    protected $fillable = [
    'name','email','url'
    ];
}
