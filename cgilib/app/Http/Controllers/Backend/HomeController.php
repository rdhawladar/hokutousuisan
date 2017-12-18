<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topic;
use Datatables; 
 
 
class HomeController extends Controller
{     

    public function __construct()
    {
        $this->middleware('auth');
		if(\Auth::user()->id != 1) 
		{
		   return redirect()->action('User\HomeController@index');
		}
    }
    
	
    public function index()
    {	
	     return view('backend.admin.topic_entry');  
    }     	 
	
	public function topic_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[			
			'topic_title' => 'required' ,	
			'topic_description' => 'required' ,			 		
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Backend\HomeController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
		
		$t = new Topic();
		$t->topic_title = trim($r->input("topic_title"));
		$t->topic_description = trim($r->input("topic_description"));
		$t->status = "ACTIVE";
		$t->created_at =  date('Y-m-d H:i:s');
		$t->updated_at =  date('Y-m-d H:i:s');
		$t->save();
		
		return redirect()->action('Backend\HomeController@index')->with('success','Data saved successfuly');  		 	
	}
	
	
	public function topic_list()
    {	
        return view('backend.admin.topic_list');  
    }
	
	public function topic_edit($id)
	{
		$topics = Topic::where('id','=',$id)->first();
		return view('backend.admin.topic_edit')
				->with('id',$id) 
				->with('topic',$topics);
				
	}
	
	public function topic_edit_action(Request $r)
	{
		$id = $r->input("topic_id");
		if($id != "")
		{
        	$t = Topic::find($id);
		    $t->topic_title = trim($r->input("topic_title"));
		    $t->topic_description = trim($r->input("topic_description"));
		    $t->updated_at = date('Y-m-d H:i:s');
		    $t->update();
		}
		return redirect()->action('Backend\HomeController@topic_list'); 		
	}
	
	public function data_table()
	{	
		$topics = Topic::orderBy('id','desc')->get();
		return Datatables::of($topics)
			->editColumn('id', function ($result) {
			   return "<a class='btn btn-success' href='". url('/sys/ems/edit-topic/'. $result->id .'') ."'>Edit</a>";
			})	
			->make(true);
	}
	
}
