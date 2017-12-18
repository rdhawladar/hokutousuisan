<?php
namespace App\Http\Controllers\User;

 
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth; 
use Mail;


class AuthController extends Controller
{
    
    public function login()
    {	
        return view('backend.user.auth.login');  
    }
    
    public function loginAction(Request $r)
	{
		$validator = \Validator::make($r->all(), [	        
	        'email' => 'required|email|max:255',	        
	        'password' => 'required'
	    ]);    

        $errors = ['email'=> 'Email and Password required'];
		if ($validator->fails()) 
		{
            return redirect()->action('User\AuthController@login')
                        ->withErrors($errors)    
                        ->withInput();
        }
		
	    if (Auth::attempt(['email' => $r->email, 'password' => $r->password , 'status' => 'ACTIVE']  , $r->remember)) {
            Auth::user()->type = 'user';
            \Session::forget('prem');
            return redirect('/user/home');
        }else{
        	return redirect()->back()->withInput()->with('error_message', 'Wrong email address or password! Please try again');
        }
	}
	
	public function forgot_password()
    {
    	return view("backend.user.auth.forgot_password");
    }

	public function forgot_password_action(Request $r)
    {
    	$user_email = trim($r->input("email"));
    	$validator = \Validator::make($r->all(), [	        
	        'email' => 'required|email|max:255',	        
	    ]);
    	
    	if ($validator->fails()) 
		{
            return redirect()->action('User\AuthController@forgot_password')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $query = User::where("email" , "=" , $user_email);   
        if( $query->count() <= 0 ){
             return redirect()->action('User\AuthController@forgot_password')
             	->with('error' , 'Email doesn`t exist');
        }
    	else
        {
        	 $u = $query->first();	        
             $readable_password = $u->readable_password;
             $full_name = $u->first_name ." ". $u->last_name;
       		 $sitename = "俺達の秘密基地";	
             $mailsubject = "Forgot Password Mail http://俺達の秘密基地.com";

             $message  = "Dear ".$full_name.",<br/><br/>";
			 $message .= "Your Password: ". $readable_password .". For any query mail us.<br/><br/><br/>Thanks,<br/>". $sitename;
		     	
                
			 $headers  = 'MIME-Version: 1.0' . "\r\n";
			 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 $headers .= 'From: '.$sitename.' <support@xn--u9j926gj4ecxa32lwx8cf56a.com>' . "\r\n";						
			 @mail($user_email , $mailsubject , html_entity_decode($message) , $headers );
        
             return redirect()->action('User\AuthController@forgot_password')
             	->with('success' , 'Your password sent to email.Please check you mail.');
        }
    	//dd($r->all());    
    }


	public function logout()
	{
		Auth::logout();
		return redirect('/user/login');	
	}
	
}	