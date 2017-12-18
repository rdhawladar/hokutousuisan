<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\AudioSetting;
use App\VideoSetting;
use App\CrazyMindsetAudio;
use App\ForMonth;
use DB; 

class WorldSecretTalkController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
    date_default_timezone_set("Asia/Tokyo");
        $e = Explanation::where('type','=','world_secret_talk')->first();
         $audios = AudioSetting::where('content_page','=','world_secret_talk')->get();
        $vidoes = VideoSetting::where('content_page','=','world_secret_talk')->get();
       
         $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
       
        
       return view('backend.user.secret_talk.secret_talk_of_wold_page')
                ->with('e',$e)
           ->with('audios' , $audios)
           ->with('vidoes' , $vidoes)->with('months' , $months);
    }    

 
	 
 
    
 
}
