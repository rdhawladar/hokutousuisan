<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
    protected $table = "order_list";
	protected $fillable = [ 'id' , 'order_id','member_id','product_id','quantity', 'price', 'created_at' , 'updated_at' ]; 
}
