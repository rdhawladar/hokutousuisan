<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $table = "qualification";
	protected $fillable = [ 'id' ,'qualification' ,'created_at' , 'updated_at' ]; 
}
