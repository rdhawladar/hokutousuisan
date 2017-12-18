<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ExplanationType; 
use App\BlockchainRelatedLectureComment;
use DB; 
use Datatables;


class BlockchainRelatedLectureController extends Controller
{     
    
    public function index()
    {	
         
        return view('backend.admin.blockchain_related_lecture.user_comment_list');    
    } 
    
    
    public function user_comments_data_table()
    {
        $comments = BlockchainRelatedLectureComment::leftJoin('users','blockchain_related_lecture_comments.user_id','=','users.id')
                        ->leftJoin('videos_info','videos_info.id','=','blockchain_related_lecture_comments.video_id')
                        ->orderBy('blockchain_related_lecture_comments.id','desc')
                        ->select(['blockchain_related_lecture_comments.id','blockchain_related_lecture_comments.message','videos_info.title','videos_info.vdo_id','blockchain_related_lecture_comments.name','blockchain_related_lecture_comments.email','users.profile_picture','blockchain_related_lecture_comments.created_at'])
                        ->get();
        

        return Datatables::of($comments)  
			->editColumn('vdo_id', function($result){
			   return '<a target="_blank" href="https://vimeo.com/'. $result->vdo_id .'">https://vimeo.com/'. $result->vdo_id .'</a>';
			})
			->make(true);
    }

    
    
}
