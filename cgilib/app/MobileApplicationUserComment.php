<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileApplicationUserComment extends Model
{
    protected $table = "mobile_app_user_comments";
	protected $fillable = [ 'id' ,'video_id' ,'user_id' ,'comment' ,'created_at' , 'updated_at' ]; 
}
