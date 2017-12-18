<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ExplanationType; 
use App\BitcoinRelatedLectureComment;
use DB; 
use Datatables;


class BitcoinRelatedLectureController extends Controller
{     
    
    public function index()
    {	
         
        return view('backend.admin.bitcoin_related_lecture.user_comment_list');    
    } 
    
    
    public function user_comments_data_table()
    {
        $comments = BitcoinRelatedLectureComment::leftJoin('users','bitcoin_related_lecture_comments.user_id','=','users.id')
                        ->leftJoin('videos_info','videos_info.id','=','bitcoin_related_lecture_comments.video_id')
                        ->orderBy('bitcoin_related_lecture_comments.id','desc')
                        ->select(['bitcoin_related_lecture_comments.id','bitcoin_related_lecture_comments.message','videos_info.title','videos_info.vdo_id','bitcoin_related_lecture_comments.name','bitcoin_related_lecture_comments.email','users.profile_picture','bitcoin_related_lecture_comments.created_at'])
                        ->get();
        

        return Datatables::of($comments)  
			->editColumn('vdo_id', function($result) {
			   return '<a target="_blank" href="https://vimeo.com/'. $result->vdo_id .'">https://vimeo.com/'. $result->vdo_id .'</a><br/>'        ;
			})
		 
			->make(true);
    }

    
    
}
