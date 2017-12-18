<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessIdea extends Model
{
    protected $table = "business_ideas";
	protected $fillable = [
        'id' ,'title' ,'idea_detail' ,'status' , 'created_at', 'updated_at'
    ]; 
}
