<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockchainRelatedLectureComment extends Model
{
    protected $table = "blockchain_related_lecture_comments";
	protected $fillable = [
        'id' ,'video_id' ,'user_id' ,'name' ,'email' ,'message' , 'created_at', 'updated_at'
    ]; 
}

