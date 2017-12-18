<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class BitcoinRelatedLectureComment extends Model
{
    protected $table = "bitcoin_related_lecture_comments";
	protected $fillable = [
        'id' ,'video_id' ,'user_id' ,'name' ,'email' ,'message' , 'created_at', 'updated_at'
    ]; 
}

