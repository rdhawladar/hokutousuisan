<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Explanation extends Model
{
    protected $table = "explanation_info";
	protected $fillable = [ 'id' ,'type' ,'title' ,'explanation_detail' ,'created_at' , 'updated_at' ]; 
}
