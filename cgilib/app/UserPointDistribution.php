<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPointDistribution extends Model
{
    protected $table = "user_point_distribution";
	protected $fillable = [ 'id'  ,'content_page'  ,'gpoint'  ,'created_at'  , 'updated_at'  ]; 
	 
}
