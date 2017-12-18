<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefectures extends Model
{
    protected $table = "prefectures";
	protected $fillable = [ 'id' , 'name']; 
}
