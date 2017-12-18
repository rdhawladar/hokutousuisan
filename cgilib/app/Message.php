<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "message";
	protected $fillable = [ 'id' , 'name', 'fname', 'email' , 'mobile', 'message', 'created_at' , 'updated_at' ]; 
}
