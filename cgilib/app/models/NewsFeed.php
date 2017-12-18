<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeed extends Model
{
    protected $table = "news_feed";
	protected $fillable = [ 'id' ,'title' ,'description' ,'who_vote' ,'yes_vote' ,'no_vote' ,'created_at' , 'updated_at' ]; 
	 
}
