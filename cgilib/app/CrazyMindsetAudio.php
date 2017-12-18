<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrazyMindsetAudio extends Model
{
    protected $table = "crazy_mindset_audios";
	protected $fillable = [
        'id' ,'for_month' ,'title' ,'rid' ,'audio_url' ,'publish_date' ,'status'  , 'created_at', 'updated_at'
    ]; 
}
