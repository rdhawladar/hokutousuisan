<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerroristRequest extends Model
{
    protected $table = "majime_terrorist_requests";
	protected $fillable = [ 'id' ,'name' ,'qualification' ,'created_at' , 'updated_at' ]; 
}
