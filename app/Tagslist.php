<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Tagslist extends Model
{
	public $table = "tagslists";
     protected $fillable = [
        'id', 'tagname',
    ];
}
?>
