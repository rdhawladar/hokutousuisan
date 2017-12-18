<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = "logo";
	protected $fillable = [ 'id' ,'logo_title' , 'logo_url', 'created_at' , 'updated_at' ]; 
}
