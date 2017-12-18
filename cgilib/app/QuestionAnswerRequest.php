<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerRequest extends Model
{
    protected $table = "question_answer_requests";
	protected $fillable = [ 'id' ,'name' ,'email' ,'message' ,'created_at' , 'updated_at' ]; 
}
