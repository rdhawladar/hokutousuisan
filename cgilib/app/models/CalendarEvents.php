<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvents extends Model
{
    protected $table = "event_table";
	protected $fillable = [ 'id' ,'event_title' ,'description' ,'event_date' , 'created_at', 'updated_at'    ]; 
}
