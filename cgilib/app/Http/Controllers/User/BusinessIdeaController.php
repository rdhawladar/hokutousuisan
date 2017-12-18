<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\CrazyMindsetAudio; 
use App\ForMonth;
use DB; 

class BusinessIdeaController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
    date_default_timezone_set("Asia/Tokyo");
        $e = Explanation::where('type','=','business_idea')->first();
        $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
         
       return view('backend.user.business_idea.business_idea_page')->with('e',$e)->with('months' , $months);
    }    

 
	 
 
    
 
}
