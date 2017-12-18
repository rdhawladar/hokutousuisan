<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "country";
	protected $fillable = [
        'id' ,'country' ,'dial_code' , 'created_at', 'updated_at'
    ]; 
}
