<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestUpload extends Model
{
    protected $table = "test_upload";
	protected $fillable = [
        'id' ,'for_month' ,'title' ,'rid' ,'audio_url' ,'publish_date' ,'status'  , 'created_at', 'updated_at'
    ]; 
}
