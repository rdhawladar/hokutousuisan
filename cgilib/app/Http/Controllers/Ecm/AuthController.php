<?php
namespace App\Http\Controllers\Ecm;

 
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth; 
use Mail;

use App\Menu; 
use App\SliderImage;
use App\Logo;
use App\Catagory;
use App\Product;
use App\Otherpage;
use App\Footer;
use App\Newsfeed;
use App\Message;
use Anam\Phpcart\Cart; 


class AuthController extends Controller
{
    
    public function login()
    {	 
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

        return view('ecm.login')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('total', $test = $this->cart_cal())  ;    
    }
    
    public function loginAction($id, Request $r)
	{
		$validator = \Validator::make($r->all(), [	        
	        'email' => 'required|email|max:255',	        
	        'password' => 'required'
	    ]);    

        $errors = ['email'=> 'Email and Password required'];
		if ($validator->fails()) 
		{
            return redirect()->action('Ecm\AuthController@login')
                        ->withErrors($errors)    
                        ->withInput();
        }
		
	    if (Auth::attempt(['email' => $r->email, 'password' => $r->password , 'status' =>'ACTIVE']  , $r->remember)) {
            Auth::user()->type = 'member';
            //Session::forget('prem');j
            if ($id==1) {
                return redirect('/user/panel');
            }
            else return redirect('/checkout/3');
            
        }else{
        	return redirect()->back()->withInput()->with('wrong_auth', 'メールアドレスまたはパスワードが違います！正しい情報を入力してください。');
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
             	->with('success' , 'パスワードを再発行すしメールで送りしました。 <br> 受信トレイと迷惑メールフォルダを確認してください。 ');
        }
    	//dd($r->all());    
    }

    public function cart_cal(){
        $cart = new Cart();     
        $carts  = $cart->getItems();
        $tprice = 0;
        $tquantity = 0;
        foreach ($carts as $key => $value) {
            $tprice += ($value->price*$value->quantity);
            $tquantity += $value->quantity;
        }
        return $arrayName = array('tprice' => $tprice, 'tquantity' => $tquantity);
    }   

	public function logout()
	{
		Auth::logout();
		return redirect('/user/login');	
	}
	
}	