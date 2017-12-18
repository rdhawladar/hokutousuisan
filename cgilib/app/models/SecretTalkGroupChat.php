<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SecretTalkGroupChat extends Model
{
    protected $table = "secret_talk_group_chat";
	protected $fillable = [
        'id' ,'user_id' ,'dest_user_id' ,'file_name' ,'message' , 'created_at', 'updated_at'
    ]; 
}
