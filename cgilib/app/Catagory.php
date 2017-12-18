<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table = "catagory";
	protected $fillable = [ 'id' , 'type', 'catagory_title' , 'catagory_banner_url', 'catagory_thumbnail_url', 'catagory_description', 'created_at' , 'updated_at' ]; 
}
