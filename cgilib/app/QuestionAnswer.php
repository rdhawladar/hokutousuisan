<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $table = "question_answers";
	protected $fillable = [
        'id' ,'title' ,'file_name' ,'status' , 'created_at', 'updated_at'
    ]; 
}
