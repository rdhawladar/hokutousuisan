<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderImage;
use App\Newsfeed;

use Datatables; 
 
 
class NewsfeedController extends Controller
{     
 
	
    public function index()
    {	
        
	    return view('ecm_admin.newsfeed.newsfeed_entry');
    }     	 
	
	public function newsfeed_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[	
			'newsfeed_title' => 'required' ,		
			'newsfeed_description' => 'required',
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Ecm\NewsfeedController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 

    	//echo $newsfeed_file."<br>".$newsfeed_thumbnail_file;
		$t = new Newsfeed();
		$t->newsfeed_title      	= trim($r->input("newsfeed_title")); 
		$t->newsfeed_description	= trim($r->input("newsfeed_description")); 
		$t->created_at =  date('Y-m-d H:i:s');
		$t->updated_at =  date('Y-m-d H:i:s');
		$t->save();
		
		return redirect()->action('Ecm\NewsfeedController@index')->with('success','追加されました');  		 	
	}
	
	
	public function newsfeed_list()
    {	
        return view('ecm_admin.newsfeed.newsfeed_list');  
    }
	
	public function newsfeed_list_data_table()
	{	
		$topics = Newsfeed::orderBy('id','asc')
					-> get();
		//dd($topics);
		return Datatables::of($topics)

			->editColumn('action', function ($result) {
			  return "<a class='btn btn-xs btn-success' href='". url('/admin/newsfeed-edit/'. $result->id .'') ."'>変更</a>&nbsp;"/*.
			   			    "<a class='btn btn-xs btn-danger' href='". url('/admin/newsfeed-delete/'. $result->id .'') ."'>削除</a>"*/;
			})	
			->make(true);
	}
	
	
	
	public function newsfeed_delete($id)
	{
	    $c = Newsfeed::find($id);
	    $c->delete();
	    return redirect('/admin/newsfeed-list');
	}
	

	public function newsfeed_edit($id)
	{
	    
		$topics = Newsfeed::find($id);
		return view('ecm_admin.newsfeed.newsfeed_edit')
				->with('id',$id) 
				->with('topics',$topics);
	}
	
	public function newsfeed_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[			

			'newsfeed_description' => 'required',
			'newsfeed_title' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/newsfeed-edit/'. $id ) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        

	    		$t = Newsfeed::find($id);
	    		$t->newsfeed_title      = trim($r->input("newsfeed_title"));
	    		$t->newsfeed_description      = trim($r->input("newsfeed_description"));
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->update();        
        
		
		return redirect('/admin/newsfeed-list')->with('success','更新されました。');  
	}
	

	
}
