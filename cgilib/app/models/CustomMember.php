<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomMember extends Model
{
    protected $table = "vip_customers";
	protected $fillable = [
        'id' ,'user_id' ,'password' ,'status' , 'created_at', 'updated_at'
    ]; 
}
