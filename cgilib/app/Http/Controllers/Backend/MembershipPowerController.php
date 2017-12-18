<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\MembershipPowerFeedback; 
use App\MembershipPowerUserFeedback;
use App\MembershipPowerFeebackRequestForm; 
use App\User; 
use Datatables; 
use DB; 

class MembershipPowerController extends Controller
{     
 
 	public function index()
    {	
        return view('backend.admin.membership_power.membership_power_feedback_list');  
    }
	
	
	public function membership_power_feedback_data_table()
	{	
	    $mp = MembershipPowerFeebackRequestForm::leftJoin('membership_power_feedback','membership_power_feedback.id','=','membership_power_user_feedback_request.feedback_id')
	                    ->orderBy('membership_power_user_feedback_request.id','desc')
	                    ->select(['membership_power_user_feedback_request.id','membership_power_feedback.title','membership_power_feedback.description','membership_power_user_feedback_request.name','membership_power_user_feedback_request.email','membership_power_user_feedback_request.message','membership_power_user_feedback_request.created_at'])
	                    ->get();
	    
	    
	    //dd($mp);
	    
	    return Datatables::of($mp)
			->make(true);
	}
	

	
	public function feedback_entry()
    {			
       return view('backend.admin.membership_power.feedback_entry')	;
    }     
    
	
	public function feedback_entry_action(Request $r)
	{
		$validator = \Validator::make($r->all(),[		 
			'title' => 'required'  ,
			'description' => 'required' 
		]);
		
	    $title = trim($r->input("title"));
	    $description = trim($r->input("description"));
	    
		 
		if ($validator->fails()) {
            return redirect()->action('Backend\MembershipPowerController@feedback_entry')
                        ->withErrors($validator)
                        ->withInput();
        } 
		
		$qa_count = MembershipPowerFeedback::where('title','=',$title)->count();
		if($qa_count == 0 ) {
			$mqa = new MembershipPowerFeedback();
			$mqa->title = $title;
			$mqa->description = $description;
			$mqa->created_at = date('Y-m-d H:i:s');
			$mqa->updated_at = date('Y-m-d H:i:s');
			$mqa->save();
			$msg = 'Data saved successfully';
		}else{
			$msg = 'Data already exist';
		}
		//dd($r);
		return redirect()->action('Backend\MembershipPowerController@feedback_entry')
				->with('success',$msg);
	}	
	
		
	//all counting 
	public function membership_power_feedback_list()
	{
		return view('backend.admin.membership_power.feedback_list');		
	}
	
	public function membership_power_feedback_list_data_table()
	{
		$exps = MembershipPowerFeedback::leftJoin('membership_power_user_feedback','membership_power_feedback.id','=','membership_power_user_feedback.feedback_id')
                ->select(['membership_power_feedback.id' ])		        
		        ->groupBy('membership_power_feedback.id')
                ->orderBy('membership_power_feedback.id' , 'desc')
		        ->get();
		    
		    
		$data = collect();        
		foreach($exps as $e)   {     
		    $t    = MembershipPowerFeedback::where('id','=',$e->id)->first();
    		$yes  = MembershipPowerUserFeedback::where('vote_for','=','yes')->where('feedback_id','=', $e->id )->count();
    		$no   = MembershipPowerUserFeedback::where('vote_for','=','no')->where('feedback_id','=', $e->id )->count();       
    		$none = MembershipPowerUserFeedback::where('vote_for','!=','yes')->where('vote_for','!=','no')->where('feedback_id','=', $e->id )->count();
            $create_date = date("Y-m-d H:i:s", strtotime($t->created_at));
    		$data[] = collect([ "id" => $e->id , "title"=> $t->title ,  "yes_count"=> $yes , "no_count"=> $no , "none_count" => $none , "created_at" =>  $create_date ]);    		   }   
    
   	   return Datatables::of($data)	
		    ->editColumn('yes_count', function($result){
		        return "<a href='". url('/admin/membership-power-agree-count/'. $result['id']   ) ."' style='font-weight:bold;'>".$result['yes_count'] ."</a>";
		    })            
			->editColumn('no_count', function($result){
		        //return "<a href='". url('/admin/membership-power-disagree-count/'. $result["id"] ) ."' style='font-weight:bold;'>".$result['no_count']."</a>";	
             return "<span style='font-weight:bold;'>".$result['no_count']."</span>";	
			})
			->editColumn('none_count', function($result){
            return "<span style='font-weight:bold;'>".$result['none_count']."</span>";	
		        //return "<a href='". url('/admin/membership-power-none-count/'.  $result["id"] ) ."' style='font-weight:bold;'>".$result['none_count'] ."</a>";
			})        
        	->addColumn("action" , function($result){
                return "<a href='". url('/admin/membership-power-feedback-entry-edit/'. $result["id"]  )  ."' class='btn btn-xs btn-success'>編集</a>&nbsp;".
                		"<a href='". url('/admin/membership-power-feedback-entry-delete/'.  $result["id"]  )  ."' class='btn btn-xs btn-danger'>削除する</a>"	;
            })      
			->make(true); 
	}
	




	public function membership_power_feedback_list_edit($id)
    {
        $m = MembershipPowerFeedback::find($id);
    	return view('backend.admin.membership_power.feedback_entry_edit')
        	->with("id" , $id)
        	->with("m" , $m);        
    }

    public function membership_power_feedback_list_edit_action(Request $r)
    {
    	$id = trim($r->input("id"));
    
    	$validator = \Validator::make($r->all(),[		 
			'title' => 'required'  ,
			'description' => 'required' 
		]);
		
	    $title = trim($r->input("title"));
	    $description = trim($r->input("description"));
	    
		 
		if ($validator->fails()) {
            return redirect('/admin/membership-power-feedback-entry-edit/'. $id  )
                        ->withErrors($validator)
                        ->withInput();
        } 
		 
		$mqa = MembershipPowerFeedback::find($id);
		$mqa->title = $title;
		$mqa->description = $description;
		$mqa->updated_at = date('Y-m-d H:i:s');
		$mqa->save();
		$msg = 'Data saved successfully';
    
		return redirect('/admin/membership-power-feedback-entry-edit/'. $id) 
				->with('success',$msg);
    }


    public function membership_power_agree_feedback_entry_delete($id)
    {
    	$m = MembershipPowerFeedback::find($id);
        $m->delete();
       return redirect('/admin/membership-power-feedback-list');
    }


	
	//all agree counting 
	public function membership_power_agree_feedback_list($id)
	{    	
		return view('backend.admin.membership_power.feedback_list_agree')
        			->with('id',$id);		
	}
	
	public function membership_power_agree_feedback_list_data_table(Request $r)
	{	    
	    $id = trim($r->get("id"));
	   
	    
        $data =  MembershipPowerFeebackRequestForm::leftJoin('users','membership_power_user_feedback_request.email','=','users.email')          
               ->where('membership_power_user_feedback_request.feedback_id','=',$id) 
               ->select(['membership_power_user_feedback_request.id','users.first_name','users.last_name','users.email','users.nick_name','membership_power_user_feedback_request.message',
                        'membership_power_user_feedback_request.created_at'])
        		->get();
        
     
	               
	   	return Datatables::of($data)
	   	    ->addColumn('who', function($result){
		        return $result->first_name." ".$result->last_name;
		    }) 
        
          ->addColumn('msg', function($result){
		        return $result->message;
		    })
          ->addColumn('email', function($result){
		        return $result->email;
		    })
		    ->editColumn('created_at', function($result){
		          return date('d M ,Y', strtotime($result->created_at));
		     })
			->make(true);      
	}    
	
	
	
	
	//all disagree counting
	public function membership_power_disagree_feedback_list($id)
	{
		return view('backend.admin.membership_power.feedback_list_disagree')
        			->with('id' , $id);		
	}
	
	public function membership_power_disagree_feedback_list_data_table(Request $r)  
    {
    	 $id = trim($r->get("id"));
	    $data = 						MembershipPowerUserFeedback::leftJoin('membership_power_feedback','membership_power_feedback.id','=','membership_power_user_feedback.feedback_id')
	                ->leftJoin('users','membership_power_user_feedback.user_id','=','users.id')    
    ->select(['membership_power_user_feedback.id','users.first_name','users.last_name','users.nick_name','membership_power_user_feedback.vote_for','membership_power_user_feedback.user_id',
	                'membership_power_user_feedback.created_at','membership_power_feedback.title'])
	                ->where('membership_power_user_feedback.vote_for','=','no')
	                ->where('membership_power_user_feedback.feedback_id','=', $id )
	                ->get();
     
	                
	   	return Datatables::of($data)
	   	    ->addColumn('who', function($result){
		        return $result->first_name." ".$result->last_name;
		    })
		    ->editColumn('created_at', function($result){
		          return date('d M ,Y', strtotime($result->created_at));
		     })
			->make(true);    
    }



	
	//all none counting
	public function membership_power_none_feedback_list($id)
	{
		return view('backend.admin.membership_power.feedback_list_none')->with('id' , $id);		
	}	
	


	public function membership_power_none_feedback_list_data_table(Request $r)  
    {
    	 $id = trim($r->get("id"));
	    $data =  MembershipPowerFeebackRequestForm::where('feedback_id','=',$id)
        			 ->leftJoin('users','membership_power_user_feedback_request.email','=','users.email')  
        	->select(['membership_power_user_feedback_request.id','users.first_name','users.last_name','users.nick_name','users.message','users.created_at'])
        ->get();
        
        
       
	                
	   	return Datatables::of($data)
	   	    ->addColumn('who', function($result){
		        return $result->first_name." ".$result->last_name;
		    })
               ->addColumn('msg', function($result){
		        return $result->message;
		    })
		    ->editColumn('created_at', function($result){
		          return date('d M ,Y', strtotime($result->created_at));
		     })
			->make(true);    
    }
	
	
	
	
	
	
	
	
	/*public function builQ()
    {
    	$id = 2;
    	$m = MembershipPowerUserFeedback::leftJoin("users","users.id","=","membership_power_user_feedback.user_id")
        			->leftJoin("membership_power_feedback","membership_power_feedback.id","=","membership_power_user_feedback.feedback_id")
        			->where("membership_power_user_feedback.id","=",$id)
        			->get();
         dd($m);
    }*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function membership_power_feedback_edit($id)
	{
	    $mp = MembershipPowerFeedback::find($id);
	    return view("backend.admin.membership_power.feedback_edit")
	            ->with('mp',$mp);
	}
	 
	public function membership_power_feedback_edit_action(Request $r)
	{
	    $validator = \Validator::make($r->all(),[		 
			'title' => 'required'  ,
			'description' => 'required' 
		]);
		
	    $id = trim($r->input("feedback_id"));
	    $title = trim($r->input("title"));
	    $description = trim($r->input("description"));
	    
		 
		if ($validator->fails()) {
            return redirect('/admin/membership-power-feedback-edit/'. $id )
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        
        $mp = MembershipPowerFeedback::find($id);
        $mp->title = $title;
        $mp->description = $description;
        $mp->updated_at = date('Y-m-d H:i:s');
        $mp->update();
        
        	return redirect('/admin/membership-power-feedback-edit/'. $id) 
				->with('success','Data updated successfuly');
	}
	
 
	
	public function feedback_delete($id)
	{
	    $f = MembershipPowerFeedback::find($id);
	    $f->delete();
	    return redirect('/admin/membership-power-feedback-list' ) ;
	}

}
