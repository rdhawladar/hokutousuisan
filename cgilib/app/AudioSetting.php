<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioSetting extends Model
{
    protected $table = "audios_info";
	protected $fillable = [ 'id' ,'user_id' ,'title' ,'audio_url' ,'created_at' , 'updated_at' ]; 
}
