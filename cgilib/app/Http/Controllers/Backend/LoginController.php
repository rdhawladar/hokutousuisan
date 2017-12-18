<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminUser;
use DB;
use Mail;



class LoginController extends Controller
{     
    
    public function index()
    {	
        return view('backend.admin.login');  
    }
    	
	public function authenticate(Request $r)
    {	
        $validator = \Validator::make($r->all(),[			
			'email' => 'required|email' ,
			'password' => 'required' 
		]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       //dd($r->all());
        Auth::guard('admin')->logout();
        
		if (Auth::guard('admin')->attempt(['email' => $r->email , 'password' => $r->password ], $r->remember )) {
            // Authentication passed...
            $user_id = Auth::guard('admin')->user()->id;
            return redirect('admin/dashboard');
        }
        else{
        	return redirect()->back()->with('error_message', 'Email or Password mismatch, Please try again.');
        	//echo 2;
        }
    }
    
	public function logout()
    {	
        Auth::guard('admin')->logout();
        return redirect('/admin/login');  
    }
    	 
	
	
	 
}