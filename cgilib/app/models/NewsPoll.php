<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsPoll extends Model
{
    protected $table = "news_poll";
	protected $fillable = [ 'id' ,'news_id' ,'user_id' ,'vote_for' ,'created_at' , 'updated_at' ]; 
	 
}
