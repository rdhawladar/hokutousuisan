<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu_item";
	protected $fillable = [ 'id' ,'menu_title' ,'created_at' , 'updated_at' ]; 
}
