<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarPollRequestForm extends Model
{
    protected $table = "calendar_poll_request_form";
	protected $fillable = [
        'id' ,'news_id' ,'name' ,'email' ,'message' , 'created_at', 'updated_at'
    ]; 
}
