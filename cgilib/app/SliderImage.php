<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    protected $table = "slider_image";
	protected $fillable = [ 'id' ,'slider_title' , 'slider_url', 'created_at' , 'updated_at' ]; 
}
