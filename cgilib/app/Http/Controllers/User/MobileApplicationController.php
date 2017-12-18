<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\VideoSetting;
use App\Explanation;
use App\MobileApplicationUserComment;
use App\CrazyMindsetAudio;
use App\ForMonth;
use DB; 

class MobileApplicationController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
    date_default_timezone_set("Asia/Tokyo");
        $e = Explanation::where('type','=','mobile_application')->first();
        
        $single = VideoSetting::where('content_page','=','mobile_application')
                        ->orderBy('id','desc')
                        ->take(1)
                        ->first();
        
        $videos = VideoSetting::where('content_page','=','mobile_application')
                        ->where('id','!=' , $single->id )
                        ->orderBy('id','desc')
                        ->get();
                        
                        
       $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
                  	   
        $comments =  MobileApplicationUserComment::leftJoin('users','users.id','=','mobile_app_user_comments.user_id')
        ->orderBy('mobile_app_user_comments.id','desc')->get();
        
        return view('backend.user.mobile_app.mobile_application_page')
                ->with('e',$e)
                ->with('comments',$comments)
                ->with('recent_video' , $single)
                ->with('videos',$videos)
                ->with('months' , $months);
    }    

 
	public function user_comment_post(Request $r) 
	{
	    $all_id = trim($r->input("post_id"));
	    $comment = trim($r->input("comment"));
	    
	    
	    $parse = explode("_" , $all_id);
	    $vdo_id = $parse[1];
	    $user_id = $parse[2];
	    
	    $m = new MobileApplicationUserComment();
	    $m->video_id = $vdo_id;
	    $m->user_id = $user_id;
	    $m->comment = $comment;
	    $m->created_at = date('Y-m-d H:i:s');
	    $m->updated_at = date('Y-m-d H:i:s');
	    $m->save();
	    
	    echo 1;
	}
 
    public function recent_single_comment($video_id)
    {
        
        
        $vd = VideoSetting::where('id','=',$video_id)->first();
        $vdo_title = $vd->title;
        $query = MobileApplicationUserComment::leftJoin('users','mobile_app_user_comments.user_id','=','users.id')
                        
                        ->where('mobile_app_user_comments.video_id','=',$video_id)
                        ->orderBy('mobile_app_user_comments.id','desc')
                        ->select(['mobile_app_user_comments.id','mobile_app_user_comments.comment','users.first_name','users.last_name','users.profile_picture','mobile_app_user_comments.created_at'])
                        ->take(1)
                        ->first();
                        
        $data = array("data" => $query);
        return response($query);
    }    

    public function recent_comments($video_id)
    {
        date_default_timezone_set("Asia/Tokyo");
        
        $vd = VideoSetting::where('id','=',$video_id)->first();
        $vdo_title = $vd->title;
        
        $query = MobileApplicationUserComment::leftJoin('users','mobile_app_user_comments.user_id','=','users.id')
                       // ->leftJoin('videos_info','videos_info.id','=','mobile_app_user_comments.video_id')
                        ->where('mobile_app_user_comments.video_id','=',$video_id)
                        ->orderBy('mobile_app_user_comments.id','desc')
                        ->select(['mobile_app_user_comments.id','mobile_app_user_comments.comment' ,'users.first_name','users.last_name','users.profile_picture','mobile_app_user_comments.created_at'])
                        ->get();
                        
        //dd($query);         //そこそこの達人       
                       $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
       
        return view('backend.user.mobile_app.users_comment')
                ->with('comments',$query)
                ->with('vdo_title' , $vdo_title)
                ->with('months' , $months);
    }
 
}
