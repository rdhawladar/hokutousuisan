<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipPowerUserFeedback extends Model
{
    protected $table = "membership_power_user_feedback";
	protected $fillable = [
        'id' ,'feedback_id' ,'user_id' ,'vote_for' , 'created_at', 'updated_at'
    ]; 
}
