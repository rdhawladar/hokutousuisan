<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessMembersAudition extends Model
{
    protected $table = "bm_audition_requests";
	protected $fillable = [ 'id' ,'name' ,'email' , 'detail' ,'created_at' , 'updated_at' ]; 
}
