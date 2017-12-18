<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessIdeaVote extends Model
{
    protected $table = "business_idea_votes";
	protected $fillable = [
        'id' ,'user_id' ,'idea_id' ,'vote_for' , 'created_at', 'updated_at'
    ]; 
}
