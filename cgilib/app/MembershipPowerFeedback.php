<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipPowerFeedback extends Model
{
    protected $table = "membership_power_feedback";
	protected $fillable = [ 'id' ,'title' ,'description' ,'created_at' , 'updated_at' ]; 
}
