<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOnCircle extends Model
{
    protected $table = "vdo_user_circle";
	protected $fillable = [ 'id' ,'parent_id' ,'vdo_user_id' ,'vdo_id' ,'created_at' , 'updated_at' ]; 
}
