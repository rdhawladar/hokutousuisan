<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IthupiaRequest extends Model
{
    protected $table = "itupia_requests";
	protected $fillable = [ 'id' ,'name' ,'email' ,'message' ,'created_at' , 'updated_at' ]; 
}
