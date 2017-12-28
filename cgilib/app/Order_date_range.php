<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_date_range extends Model
{
    protected $table = "order_date_range";
	protected $fillable = [ 'id' ,'min_delivery_date' , 'max_delivery_date', 'created_at' , 'updated_at' ]; 
}
