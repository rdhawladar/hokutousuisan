<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\CustomMember; 
use App\User; 
use Datatables; 
 

class MembersController extends Controller
{     
 /*   public function __construct()
    {
        $this->middleware('auth');
    }      */
	
	public function index()
    {	
        return view('backend.admin.members.member_registration');  
    }
	
	
	public function registration(Request $r)
	{		
		$first_name      = trim($r->input("first_name"));
		$last_name       = trim($r->input("last_name"));
		$member_email    = trim($r->input("email"));
		$member_password = trim($r->input("password"));
		$member_encrypt_password = bcrypt(trim($r->input("password")));
		
		$validator = \Validator::make($r->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email' ,
            'password' => 'required|'              
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect()->action('Backend\MembersController@index')
                        ->withErrors($validator)
                        ->withInput();
        }
		 
		$u = User::where('email','=',$member_email)->count();
		if($u == 0) 
		{
			$user = new User();	
			$user->first_name = $first_name;
			$user->last_name = $last_name;
			$user->nick_name = '';
			$user->email = $member_email;
			$user->readable_password = $member_password;
			$user->password = $member_encrypt_password;
            $user->premium_password = '';
            $user->premium_amount = 0.00;
			$user->status = "ACTIVE";
			$user->email_perm    = "public";
			$user->line_id_perm  = "public";
			$user->dob_year_perm = "public";
			$user->created_at = date('Y-m-d H:i:s');
			$user->updated_at = date('Y-m-d H:i:s');
			$user->save();
		}
		
		return redirect()->action('Backend\MembersController@index')
				->with('success','Data saved successfuly');
	}
	
	
	public function customer_member_registration()
	{
	    $users =  User::all();
	    return view("backend.admin.members.custom_member_registration")->with('users',$users);
	}
	
	public function custom_member_registration_action(Request $r)
	{  
        $user_id = trim($r->input("user_id"));
        $password =  trim($r->input("password"));
        
        $validator = \Validator::make($r->all(), [
            'user_id' => 'required',
            'password' => 'required',                    
        ]);

        if ($validator->fails()) {             
            return redirect()->action('Backend\MembersController@customer_member_registration')
                        ->withErrors($validator)
                        ->withInput();
        }
        
	    
	    $cc = User::where('id','=',$user_id)->count();        
        if($cc==0)
	    {
    	    $c = User::find($user_id);
    	    $c->premium_password = $password ;             
    	    $c->status = 'ACTIVE';
    	    $c->updated_at = date("Y-m-d H:i:s");
    	    $c->update();
    	    return redirect()->action('Backend\MembersController@customer_member_registration')
				->with('success','Data saved successfuly');
	    }
	    return redirect()->action('Backend\MembersController@customer_member_registration')
				->with('success','Member Already Exist');
	}
	
	public function members_list()
	{
		
		return view("backend.admin.members.members_list");


	}
	
	public function members_list_data_table()
	{	
		$members = User::orderBy('id','desc')->get();

		if(true){
		return Datatables::of($members)
			->editColumn('id', function($result){
			   return  $result->first_name  ." ".$result->last_name;
			})
			->editColumn('status', function($result){
				if( $result->status == "ACTIVE")
				    return  "<span class='badge bg-green'><a href='".  url('/admin/user-deactive/'. $result->id .'/'. $result->status ) ."' style='color:#fff;'>".   $result->status ."</a></span>";
				else
				    return  "<span class='badge bg-red'><a href='". url('/admin/user-deactive/'. $result->id .'/' . $result->status  ) ."' style='color:#fff;'>".   $result->status ."</a></span>";					
			})			
			->make(true);
		}


	}
	
	
	public function user_deactive($id , $status)
	{
	    if($status == 'ACTIVE'){
	        $u =  User::find($id);
	        $u->status = 'DEACTIVE';
	        $u->update();
	    }else{
	        $u =  User::find($id);
	        $u->status = 'ACTIVE';
	        $u->update(); 
	    }
	   
	   return redirect()->action('Backend\MembersController@members_list');
	}
	

}
