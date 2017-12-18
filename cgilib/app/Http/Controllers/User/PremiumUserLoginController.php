<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
 use App\CrazyMindsetAudio;
 use App\ForMonth;
use Session;
 

class PremiumUserLoginController extends Controller
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
		
       
		return view('backend.user.premium_login')->with('months' , $months);				
    }     
	 
	public function login_action(Request $r)
	{
	    //dd($r->all());   
	    $email = trim($r->input("email"));
	    $pass = trim($r->input("password"));
	    $uc = User::where('email','=',$email)->where('premium_password','=',$pass)->count();
	    if( $uc == 1 ) {
	        $r->session()->put('email', $email);
	        $r->session()->put('prem', 1);
	        return redirect('/user/premium/home');
	    }else{
	        $r->session()->forget('email');
	        $r->session()->forget('prem');
	        return redirect('/user/premium/login');
	    }
	}

	public function home()
	{
    date_default_timezone_set("Asia/Tokyo");
	    $email = Session::get('email');
	    $u = User::where('email','=',$email)->first();
	    $amount = $u->premium_amount;
    
	      $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
       
	     return view('backend.user.premium_home')->with('amount', $amount)->with('months' , $months);
	}
	
}
