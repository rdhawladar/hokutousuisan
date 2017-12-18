<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrazyMindSetAudio extends Model
{
    protected $table = "crazy_mindset_audio";
	protected $fillable = [ 'id' ,'title' ,'file_name' , 'created_at', 'updated_at' ]; 
}
