<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExplanationType extends Model
{
    protected $table = "types_of_explanation";
	protected $fillable = [ 'id' ,'sname' ,'name'  ,'video' ,'audio' ,'created_at' , 'updated_at' ]; 
}
