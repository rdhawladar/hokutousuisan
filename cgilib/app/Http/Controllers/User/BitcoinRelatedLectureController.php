<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\VideoSetting;
use App\BitcoinRelatedLectureComment;
use App\CrazyMindsetAudio;
use App\ForMonth;
use DB; 

class BitcoinRelatedLectureController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
    date_default_timezone_set("Asia/Tokyo");
        $e = Explanation::where('type','=','bitcoin_related_lecture')->first();
      $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
       
      $single = VideoSetting::where('content_page','=','bitcoin_related_lecture')->orderBy('id','desc')->take(1)->first();
        
        $vidoes = VideoSetting::where('content_page','=','bitcoin_related_lecture')
                ->select(['videos_info.id',  'videos_info.title','videos_info.vdo_id'])
                //->where('id','!=', $single->id )
                ->orderBy('id','desc')
                ->get();
       
       
         
       return view('backend.user.bitcoin_related.bitcoin_related_lecture_page')
                    ->with('e',$e)
                    ->with('recent_video' , $single)
                    ->with('videos' , $vidoes )
                    ->with('months' , $months);
    }    

 
	 
    public function user_comment_post(Request $r)
    {
        //dd($r->all());
        //'vdoID':vdoID , 'userID':userID , 'name': name , 'email':email , 'message': message
        
        $video_id = trim($r->input("vdoID"));
        $user_id  = trim($r->input("userID"));
        $name     = trim($r->input("name"));
        $email    = trim($r->input("email"));
        $message  = trim($r->input("message"));
        
        $v = explode("#",$video_id);
        
        $b = new BitcoinRelatedLectureComment();
        $b->video_id = $v[0];
        $b->user_id  = $user_id;
        $b->name  = $name;
        $b->email = $email;
        $b->message = $message;
        $b->created_at  = date('Y-m-d H:i:s');
        $b->updated_at  = date('Y-m-d H:i:s');
        $b->save();
        echo 1;
    }
    
 
}
