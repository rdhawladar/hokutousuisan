<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Topic;
use App\TestUpload; 

use Datatables; 
 
 
class TestUploadController extends Controller
{     
 
	
    public function index()
    {	
        $month_dates = array();
        $month_names = [ "January" , "February" , "March" , "April" , "May" , "June" , "July" , "August" , "September" , "October" , "November" , "December" ];
        
        for($j = date('Y') ; $j <= 2019 ; $j++ ) 
        {
            for($i = 0 ; $i < count($month_names) ; $i++) 
            {
                $month_digit = date('m' , strtotime($month_names[$i]));
                $date = $j."-".$month_digit."-01";
                $month_dates[] = $date;
                //echo $date.'<br/>';
            }
        }
	    return view('backend.admin.test_upload.test_entry')
	                ->with('month_dates' , $month_dates);
    }     	 
	
	public function test_upload (Request $r)
	{
		$validator = \Validator::make($r->all(),[	
			'audio_title' => 'required' ,		
			'audio_url' => 'required|file' ,
        	'publish_year' => 'required' ,	
		    'publish_month' => 'required' ,
		    'publish_date' => 'required'  ,
            'publish_hour' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Backend\TestUploadController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
    
    	$publish_date =  trim($r->input("publish_year"))."-".trim($r->input("publish_month"))."-".trim($r->input("publish_date"))." ".trim($r->input("publish_hour"));
        
        $parse = explode("-" , $publish_date);         
        
        $audio_file = date('YmdHis')."_".$_FILES["audio_url"]["name"];
        if(move_uploaded_file($_FILES["audio_url"]["tmp_name"] , "assets/dist/crazy_audio/". $audio_file )){
    		$t = new TestUpload();
    		$t->for_month  = $parse[0].'-'.$parse[1].'-01';
    		$t->title      = trim($r->input("audio_title"));    
            $t->rid   = mt_rand(111111111,999999999); 
        	$t->audio_url  = $audio_file;     
        	$t->publish_date =  $publish_date.":00:00";
    		$t->status     = "DEACTIVE";
    		$t->created_at =  date('Y-m-d H:i:s');
    		$t->updated_at =  date('Y-m-d H:i:s');
    		$t->save();
        }
		
		return redirect()->action('Backend\TestUploadController@index')->with('success','Data saved successfuly');  		 	
	}
	
	
	public function test_list()
    {	
        return view('backend.admin.test_upload.test_list');  
    }
	
	public function test_list_data_table()
	{	
		$topics = TestUpload::orderBy('id','desc')->get();
		//dd($topics);
		return Datatables::of($topics)
	        ->editColumn('for_month', function ($result) {
			   return  date("F , Y" , strtotime($result->for_month));
			})		
            ->editColumn('publish_date', function ($result) {
			   return  date("Y-m-d H" , strtotime($result->publish_date));
			})		
        
			->editColumn('status', function ($result) {
			    if($result->status == "ACTIVE")
			      return  "<span class='label label-success'>PUBLISHED</span>";
			    else
			      return  "<span class='label label-danger'>NOT PUBLISHED</span>";			    
			})	
			->editColumn('audio_url', function ($result) {
			   return  "<audio controls='true' style='width:100%;max-width:600px;'><source src='". url( 'assets/dist/crazy_audio/'. $result->audio_url ) . "' /></audio>";
			})	
			->editColumn('action', function ($result) {
			  	return "<a class='btn btn-xs btn-success' href='". url('/admin/test-list-edit/'. $result->id .'') ."'>Edit</a>&nbsp;".
			   			   "<a class='btn btn-xs btn-danger' href='". url('/admin/test-list-delete/'. $result->id .'') ."'>Delete</a>";
			})	
			->make(true);
	}
	
	
	
	public function test_delete($id)
	{
	    $c = TestUpload::find($id);
	    $c->delete();
	    return redirect('/admin/test_data_show');
	}

	
	public function test_edit($id)
	{
	     $month_dates = array();
        $month_names = [ "January" , "February" , "March" , "April" , "May" , "June" , "July" , "August" , "September" , "October" , "November" , "December" ];
        
        for($j = date('Y') ; $j <= 2019 ; $j++ ) 
        {
            for($i = 0 ; $i < count($month_names) ; $i++) 
            {
                $month_digit = date('m' , strtotime($month_names[$i]));
                $date = $j."-".$month_digit."-01";
                $month_dates[] = $date;
                //echo $date.'<br/>';
            }
        }
	    
	    
	    
		$topics = TestUpload::find($id);
		return view('backend.admin.test_upload.test_edit')
				->with('id',$id) 
				->with('topics',$topics)
				->with('month_dates' , $month_dates);
	}
	
	public function test_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[			
			'for_month' => 'required' ,	
			'audio_title' => 'required' ,					 
		    'publish_year' => 'required' ,
        	'publish_month' => 'required' ,
        	'publish_date' => 'required' ,
        	'publish_hour' => 'required' ,
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/test-list-edit/'. $id ) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $f = $_FILES["audio_url"]["name"];
        
        $old_audio_file = trim($r->input("old_audio_url"));
        if( $f == "") {
            $audio_file = $old_audio_file ;
        }else{
            $audio_file = date('YmdHis')."_".$f;
        }
        
        $pub_date = trim($r->input("publish_year"))."-".trim($r->input("publish_month"))."-".trim($r->input("publish_date"))." ".trim($r->input("publish_hour"));
    
        if(move_uploaded_file($_FILES["audio_url"]["tmp_name"] , "assets/dist/crazy_audio/". $audio_file )){
        }
    		$t = TestUpload::find($id);
    		$t->title      = trim($r->input("audio_title"));
    		$t->audio_url  = $audio_file;
            $t->publish_date =  $pub_date.":00:00";
    		$t->updated_at =  date('Y-m-d H:i:s');
    		$t->update();
        
		
		return redirect('/admin/test-list-edit/'. $id)->with('success','Data updated successfuly');  
	}
	

	
}
