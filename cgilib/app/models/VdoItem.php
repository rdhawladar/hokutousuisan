<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VdoItem extends Model
{
    protected $table = "videos_list";
	protected $fillable = [ 'id' ,'type' ,'vdo_id' ,'created_at' , 'updated_at' ]; 
}
