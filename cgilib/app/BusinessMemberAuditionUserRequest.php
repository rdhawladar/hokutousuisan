<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessMemberAuditionUserRequest extends Model
{
    protected $table = "business_member_audition_request";
	protected $fillable = [ 'id' ,'name' ,'email' ,'message' ,'created_at' , 'updated_at' ]; 
}
