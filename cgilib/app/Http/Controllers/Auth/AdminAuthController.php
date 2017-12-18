<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AdminAuthController extends Controller
{   
	use AuthenticatesAndRegistersUsers, ThrottlesLogins;
	
	
	public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }	
	
	public function index()
	{
		return view('admin-auth.login');
	}
	
	public function admin_login(Request $r)
	{		 
		if(\Auth::attempt(['email'=> $r->input("email") , 'password'=> $r->input("password") , 'id'=>1]))
		{			
			\Auth::login(\Auth::user(),true);
			return redirect('/sys/ems/dashboard');
		}else{
			return 	redirect()->action('Auth\AdminAuthController@index');		
		}		 
	}   
}
