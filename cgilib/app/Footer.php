<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = "footer";
	protected $fillable = [ 'id' , 'footer_portion', 'footer_data' , 'created_at' , 'updated_at' ]; 
}
