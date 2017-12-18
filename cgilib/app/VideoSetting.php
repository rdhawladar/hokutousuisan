<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoSetting extends Model
{
    protected $table = "videos_info";
	protected $fillable = [ 'id' ,'content_page' ,'reference' ,'owner' ,'title' ,'vdo_id' ,'created_at' , 'updated_at' ]; 
}
