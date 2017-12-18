<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
	protected $fillable = [ 'id' , 'type', 'catagory_id', 'product_title' , 'product_banner_url', 'product_thumbnail_url', 'product_description', 'created_at' , 'updated_at' ]; 
}
