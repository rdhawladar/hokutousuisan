<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Country; 
use App\UserProfileFieldPermission;
 use App\CrazyMindsetAudio;
use App\ForMonth;
use Activity;
 

class ProfileController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
    date_default_timezone_set("Asia/Tokyo");
        $activities = Activity::users()->mostRecent()->get();

		$all_users = array();
		foreach($activities as $a)
		{
			$all_users[] = $a->user_id ;
		}
		$online_users = User::whereIn('id',$all_users)->get();
		$countries = Country::orderBy('country','asc')->get();
		
		
		
	$current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
       	
		return view('backend.user.profile.profile')
		    ->with('online_users',$online_users)
			->with('countries',$countries)->with('months' , $months);
    }     
	 
	
	public function update_basic_info(Request $r)
	{
	    $id                = trim($r->input("user_id"));
        $first_name        = trim($r->input("first_name"));
    	$last_name         = trim($r->input("last_name"));
    	$nick_name         = trim($r->input("nick_name"));
	    $email             = trim($r->input("email"));
    	$line_id           = trim($r->input("line_id"));
		$dob_date          = trim($r->input("dob_date"));
		$dob_month         = trim($r->input("dob_month"));
		$dob_year          = trim($r->input("dob_year"));
	    $hobby             = trim($r->input("hobby"));
		$special_skill     = trim($r->input("special_skill"));
		$gender_type       = trim($r->input("gender_type"));
		$future_dream      = trim($r->input("future_dream"));
		$self_introduction = trim($r->input("self_introduction"));

	    $email_perm        = trim($r->input("email_perm"));		
		$line_perm         = trim($r->input("line_perm"));
		$dob_year_perm     = trim($r->input("dob_year_perm"));

	    if($id != "" )
	    {
    	    $u = User::find($id);
	        $u->first_name        = $first_name;
    	    $u->last_name         = $last_name;
	        $u->nick_name         = $nick_name;
	        $u->email             = $email;
			$u->line_id           = $line_id;
			$u->dob               = $dob_year."-".$dob_month ."-".$dob_date ;
			$u->hobby             =   trim($r->input("hobby"));
			$u->special_skill     = trim($r->input("special_skill"));
			$u->gender_type       = trim($r->input("gender_type"));
			$u->future_dream      = trim($r->input("future_dream"));
			$u->self_introduction = trim($r->input("self_introduction"));
			$u->email_perm        = $email_perm;
	        $u->line_id_perm      = $line_perm;
	        $u->dob_year_perm     = $dob_year_perm;
			$u->updated_at        = date('Y-m-d H:i:s');
	        $u->update();
	    }

	    return redirect()->action("User\ProfileController@index");
	}
 
 
    public function whois_online_members()
    {
    date_default_timezone_set("Asia/Tokyo");
         $activities = Activity::users()->mostRecent()->get();

		$all_users = array();
		foreach($activities as $a)
		{
			$all_users[] = $a->user_id ;
		}
		$online_users = User::whereIn('id',$all_users)->get();
		$current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
       
		return view("backend.user.profile.whois_online_members")
		        ->with('online_users',$online_users)->with('months' , $months);
    }
 

	public function update_additional_info(Request $r)
	{
	    $id = trim($r->input("user_id"));
	    
		//dd($r->all());
		
	    if($id != "" )
	    {
    	    $u = User::find($id);	        
			$u->hobby = trim($r->input("hobby"));
			$u->profession = trim($r->input("profession"));
			$u->about_yourself = trim($r->input("about_yourself"));
			$u->updated_at = date('Y-m-d H:i:s');
	        $u->update();
	    }
	    return redirect()->action("User\ProfileController@index");		
	}	
	
	public function change_profile_picture(Request $r)
	{
		$id = trim($r->input("user_id"));	    
		//dd($r->all());		
		
		$file_name = str_replace(' ', '_', $_FILES["profile_photo"]["name"]);		
		$default_photo = "user4-128x128.jpg";		
		$profile_picture = date('YmdHis')."_". trim($file_name);		
		
	    if($id != "" )
	    {
			if(move_uploaded_file($_FILES["profile_photo"]["tmp_name"], "assets/dist/img/profile/".$profile_picture ))
			{	
				$u = User::find($id);	        
				$u->profile_picture = $profile_picture;
				$u->updated_at = date('Y-m-d H:i:s');
				$u->update();
			}
	    }	    	    
	    return redirect()->action("User\ProfileController@index");
	}

	
	public function change_password(Request $r)
	{		
		$id = trim($r->input("user_id"));	  
		
		//dd($r->all());
		
		
		if($id != "" )
	    {			 	
			if(trim($r->input("new_password")) != "" )
			{
				$u = User::find($id);	        
				$u->readable_password = trim($r->input("new_password"));
				$u->password = bcrypt(trim($r->input("new_password")));
				$u->updated_at = date('Y-m-d H:i:s');
				$u->update();			 
			}
	    }	
		
		return redirect()->action("User\ProfileController@index");	
		
	}	
	
	
	public function other_members_profile()
	{
    date_default_timezone_set("Asia/Tokyo");
	    $countries = Country::where('country','asc')->get();
	    $id = \Auth::user()->id;
	    $users = User::where('users.id','!=',$id )->get();
	  $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
       
	    return view('backend.user.profile.other_members_profile')          
	            ->with('users',$users)->with('months' , $months);
	}
	
	
	
}
