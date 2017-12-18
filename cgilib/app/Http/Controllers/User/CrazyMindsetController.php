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

class CrazyMindsetController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
    date_default_timezone_set("Asia/Tokyo");
        $e = Explanation::where('type','=','crazy_mindset')->first();
        $audios = AudioSetting::where('content_page','=','crazy_mindset')->get();
        
        $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
          //  dd($current_month);
		
        
       return view('backend.user.crazy_mindset.crazy_mindset_page')
                ->with('e',$e)
           ->with('audios' , $audios)
           ->with('months' , $months); 
    }    

 
	 
    public function audio_search($date)
    {
    date_default_timezone_set("Asia/Tokyo");
        $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
        
        $e = Explanation::where('type','=','crazy_mindset')->first();        
        $last_date = date('Y-m', strtotime($date))."-".date('t',strtotime($date));
        
        $current_date = date('Y-m-d H');
        $audios = CrazyMindsetAudio::where('for_month' , '=' , date('Y-m-01') )
                       ->where(DB::raw('DATE_FORMAT(publish_date,"%Y-%m-%d %H")') , '>=' , $current_date)
        				->where("status","=","ACTIVE")
                        ->orderBy('id','desc')
                        ->get();
    
    	//echo  date('d');
    	//

                    //    dd($audios);       
        return view('backend.user.crazy_mindset.crazy_mindset_page')
                ->with('e',$e)
                ->with('audios' , $audios)
                ->with('months' , $months);
     
    }
    
 
}
