<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pro_order extends Model
{
    protected $table = "pro_order";
	protected $fillable = [ 'id' , 'order_id', 'member_id','session','product_id','sname1', 'sname2' , 'fname1', 'fname2','email','zip_code1','zip_code2','prefecture','municipality','address', 'mobile', 'quantity', 'price','order_date','order_time','payment_method', 'step', 'status', 'created_at' , 'updated_at' ]; 
}
