<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderImage;
use App\Message;

use Datatables; 
 
 
class MessageController extends Controller
{     
 
	
    public function index()
    {	
        
	    return view('ecm_admin.message.message_entry');
    }     	 
	
	public function message_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[	
			'message_title' => 'required' ,		
			'message_description' => 'required',
			'message_banner_url' => 'required|file',
			'message_thumbnail_url' => 'required|file'
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Ecm\MessageController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 

        
        $message_file = date('YmdHis')."_".$_FILES["message_banner_url"]["name"];
        $message_thumbnail_file = date('YmdHis')."_".$_FILES["message_thumbnail_url"]["name"];

        if(move_uploaded_file($_FILES["message_banner_url"]["tmp_name"] , "ecm/message_img/". $message_file )){
	        if(move_uploaded_file($_FILES["message_thumbnail_url"]["tmp_name"] , "ecm/message_img/". $message_thumbnail_file ))
	        {
	        	//echo $message_file."<br>".$message_thumbnail_file;
	    		$t = new Message();
	    		$t->message_title      	= trim($r->input("message_title")); 
	    		$t->message_description	= trim($r->input("message_description")); 
	        	$t->message_banner_url  	= $message_file;  
	        	$t->message_thumbnail_url  = $message_thumbnail_file;  
	    		$t->created_at =  date('Y-m-d H:i:s');
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->save();
	        }
	    }
		
		return redirect()->action('Ecm\MessageController@index')->with('success','追加されました');  		 	
	}
	
	
	public function message_list()
    {	
        return view('ecm_admin.message.message_list');  
    }
	
	public function message_list_data_table()
	{	
		$topics = Message::orderBy('created_at','desc')
					-> get();
		//dd($topics);
		return Datatables::of($topics)

			->editColumn('action', function ($result) {
			  return "<a class='btn btn-xs btn-danger' href='". url('/admin/message-delete/'. $result->id .'') ."'>Delete</a>";
			})	
			->make(true);
	}
	
	
	
	public function message_delete($id)
	{
	    $c = Message::find($id);
	    $c->delete();
	    return redirect('/admin/message-list');
	}
	

	public function message_edit($id)
	{
	    
		$topics = Message::find($id);
		return view('ecm_admin.message.message_edit')
				->with('id',$id) 
				->with('topics',$topics);
	}
	
	public function message_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[			

			'message_description' => 'required',
			'message_title' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/message-edit/'. $id ) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $f = $_FILES["message_banner_url"]["name"];
        $g = $_FILES["message_thumbnail_url"]["name"];
        
        $old_message_file = trim($r->input("old_message_banner_url"));
        $old_message_thumbnail_file = trim($r->input("old_message_thumbnail_url"));
        

        if( $f == "") {
            $message_file = $old_message_file ;
        }else{
            $message_file = date('YmdHis')."_".$f;
        }        

        if( $g == "") {
            $message_thumbnail_file = $old_message_thumbnail_file ;
        }else{
            $message_thumbnail_file = date('YmdHis')."_".$g;
        }
        
    
        if(move_uploaded_file($_FILES["message_banner_url"]["tmp_name"] , "ecm/message_img/". $message_file )){}
        	
	        if(move_uploaded_file($_FILES["message_thumbnail_url"]["tmp_name"] , "ecm/message_img/". $message_thumbnail_file )){}
	    		$t = Message::find($id);
	    		$t->message_title      = trim($r->input("message_title"));
	    		$t->message_description      = trim($r->input("message_description"));
	    		$t->message_banner_url  = $message_file;
	    		$t->message_thumbnail_url  = $message_thumbnail_file;
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->update();        
        
		
		return redirect('/admin/message-list')->with('success','更新されました。');  
	}
	

	
}
