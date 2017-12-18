<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsfeed extends Model
{
    protected $table = "newsfeed";
	protected $fillable = [ 'id' ,'parent_type' ,'type' ,'newsfeed_title' ,'newsfeed_description' ,'created_at' , 'updated_at' ]; 
	 
}
