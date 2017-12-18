<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\Qualification; 
use App\VideoSetting;
use App\MajimeTerroristRequest;   
use App\CrazyMindsetAudio;
use App\ForMonth;
use DB; 

class MajimeTerroristController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        date_default_timezone_set("Asia/Tokyo");
      $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
         
       
         $single = VideoSetting::where('content_page','=','majime_terrorist')->orderBy('id','desc')->take(1)->first();
      
        $e = Explanation::where('type','=','majime_terrorist')->first();
        $q = Qualification::all();
        $vidoes = VideoSetting::where('content_page','=','majime_terrorist')
                ->where('id','!=',89)
                ->where('id','!=', $single->id )
                ->get();
                      
       return view('backend.user.majme_terorist.majime_terorist_page')
                ->with('e',$e)
                ->with('q',$q)
                ->with('recent_video' , $single)
           ->with('videos',$vidoes)
           ->with('months' , $months);
    }    

 
	 
    public function user_request(Request $r)
    {
        //dd($r->all());
        $validator = \Validator::make($r->all(),[	
			'name' => 'required' ,
			'email' => 'required' ,
			'message' => 'required' ,
		]);
		
	    $name = trim($r->input("name"));		 
		$email = trim($r->input("email"));  
		$message = trim($r->input("message"));
		
		if ($validator->fails()) {
            return redirect()->action('User\MajimeTerroristController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $mc = MajimeTerroristRequest::where('name','=',$name)->count();
            
        if($mc == 0) {
            $m = new MajimeTerroristRequest();
            $m->name = $name;
            $m->email  = $email;
            $m->message = $message;
            $m->created_at = date('Y-m-d H:i:s');
            $m->updated_at = date('Y-m-d H:i:s');
            $m->save();
            $msg = 'Your request sent!';
        }  else{
            $msg = 'Your have already requested!';
        }  
        
        return redirect()->action('User\MajimeTerroristController@index')->with('success',$msg);
    }
    
 
}
