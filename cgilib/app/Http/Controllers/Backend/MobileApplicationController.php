<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ExplanationType; 
use App\MobileApplicationUserComment;
use DB; 
use Datatables;


class MobileApplicationController extends Controller
{     
    
    public function index()
    {	
         
        return view('backend.admin.mobile_app.user_comment_list');    
    } 
    
    
    public function user_comments_data_table()
    {
        $comments = MobileApplicationUserComment::leftJoin('users','mobile_app_user_comments.user_id','=','users.id')
                        ->leftJoin('videos_info','videos_info.id','=','mobile_app_user_comments.video_id')
                        ->orderBy('mobile_app_user_comments.id','desc')
                        ->select(['mobile_app_user_comments.id','mobile_app_user_comments.comment','videos_info.title','videos_info.vdo_id','users.first_name','users.last_name','users.profile_picture','mobile_app_user_comments.created_at'])
                        ->get();
        

        return Datatables::of($comments)  
        	->editColumn('id', function($result){
			   return $result->first_name .' '.$result->last_name;
			})
			->editColumn('vdo_id', function($result){
			   return '<a target="_blank" href="https://vimeo.com/'. $result->vdo_id .'">https://vimeo.com/'. $result->vdo_id .'</a>';
			})
			->make(true);
    }

    
    
}
