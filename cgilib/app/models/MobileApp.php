<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileApp extends Model
{
    protected $table = "mobile_app";
	protected $fillable = [ 'id' ,'type' ,'file_name' ,'created_at' , 'updated_at' ]; 
}
