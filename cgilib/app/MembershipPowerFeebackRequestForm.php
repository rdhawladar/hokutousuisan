<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipPowerFeebackRequestForm extends Model
{
    protected $table = "membership_power_user_feedback_request";
	protected $fillable = [
        'id' ,'feedback_id' ,'name' ,'email' ,'description' , 'created_at', 'updated_at'
    ]; 
}
