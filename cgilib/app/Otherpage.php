<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otherpage extends Model
{
    protected $table = "other_page";
	protected $fillable = [ 'id' ,'otherpage_type' ,'otherpage_title'  ,'otherpage_description' , 'otherpage_banner_url', 'ordering' ,'created_at' , 'updated_at' ]; 
}
