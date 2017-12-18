<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\VideoSetting;
use App\BusinessMemberAuditionUserRequest;
use App\CrazyMindsetAudio;
use DB; 

class BusinessMemberAuditionController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','business_member_audition')->first();
         $vidoes = VideoSetting::where('content_page','=','business_member_audition')->get();
          $months =  CrazyMindsetAudio::distinct()->select(['for_month'])
    					   ->where('for_month','<=', date('Y-m-01'))
       						->where('status','=','ACTIVE')       
       						->orderBy('for_month','asc')->get();
       
       return view('backend.user.business_member_audition.business_member_audition_page')
                ->with('e',$e)->with('vidoes',$vidoes)->with('months' , $months) ;
    }    

 
    public 	function audition_request(Request $r)
    {
        //dd($r->all());
        $validator = \Validator::make($r->all(),[			
			'name' => 'required' ,
			'email' => 'required|email' ,
			'message' => 'required' 			 
		]);
		
	    $name = trim($r->input("name"));
		$email = trim($r->input("email"));  
		$message = trim($r->input("message"));  
		
		if ($validator->fails()) {
            return redirect()->action('User\BusinessMemberAuditionController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
                
        $b = new BusinessMemberAuditionUserRequest();
        $b->name = $name;
        $b->email = $email;
        $b->message = $message;
        $b->created_at = date('Y-m-d H:i:s');
        $b->updated_at = date('Y-m-d H:i:s');
        $b->save();
        
		return redirect()->action('User\BusinessMemberAuditionController@index')
                    ->with('success','Your request has sent!');
    }
 
    
 
}
