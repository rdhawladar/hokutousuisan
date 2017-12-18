<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcatagory extends Model
{
    protected $table = "sub_catagory";
	protected $fillable = [ 'id' , 'type', 'catagory_id', 'subcatagory_title' , 'subcatagory_banner_url', 'subcatagory_thumbnail_url', 'subcatagory_description', 'created_at' , 'updated_at' ]; 
}
