<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "users";
	protected $fillable = [ 'id' , 'sname1', 'sname2' , 'fname1', 'fname2','email','zip_code1','zip_code2','prefecture','municipality','address', 'mobile', 'status', 'created_at' , 'updated_at' ]; 
}

