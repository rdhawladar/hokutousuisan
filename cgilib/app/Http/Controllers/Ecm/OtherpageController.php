<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderImage;
use App\Otherpage;

use Datatables; 
 
 
class OtherpageController extends Controller
{     
 
	
    public function index()
    {	
        
	    return view('ecm_admin.otherpage.otherpage_entry');
    }     	 
	
	public function otherpage_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[	
			'otherpage_type' => 'required' ,		
			'otherpage_title' => 'required' ,		
			'otherpage_description' => 'required',
			'otherpage_banner_url' => 'required|file'
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Ecm\OtherpageController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
    
    
        
        $otherpage_file = date('YmdHis')."_".$_FILES["otherpage_banner_url"]["name"];

        if(move_uploaded_file($_FILES["otherpage_banner_url"]["tmp_name"] , "ecm/img/". $otherpage_file )){
	        {
	        	//echo $otherpage_file."<br>".$otherpage_thumbnail_file;
	    		$t = new otherpage();
	    		$t->otherpage_type      	= trim($r->input("otherpage_type")); 
	    		$t->otherpage_title      	= trim($r->input("otherpage_title")); 
	    		$t->otherpage_description	= trim($r->input("otherpage_description")); 
	        	$t->otherpage_banner_url  	= $otherpage_file;  
	    		$t->created_at =  date('Y-m-d H:i:s');
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->save();
	        }
	    }
		
		return redirect()->action('Ecm\OtherpageController@index')->with('success','追加されました');  		 	
	}
	
	
	public function otherpage_list()
    {	
        return view('ecm_admin.otherpage.otherpage_list');  
    }
	
	public function otherpage_list_data_table()
	{	
		$topics = Otherpage::orderBy('id','asc')->get();
		//dd($topics);
		return Datatables::of($topics)
	  //       ->editColumn('otherpage_title', function ($result) {
			//    return  $result->otherpage_title;
			// })		

			->editColumn('otherpage_banner_url', function ($result) {
			   return  "<img style='width:100%;max-width:600px;' src='".  url("/ecm/img/". $result->otherpage_banner_url ) . "' />";
			})		

			->editColumn('action', function ($result) {
			  return "<a class='btn btn-xs btn-success' href='". url('/admin/otherpage-edit/'. $result->id .'') ."'>変更</a>&nbsp;".
			   			    "<a class='btn btn-xs btn-danger' href='". url('/admin/otherpage-delete/'. $result->id .'') ."'>削除</a>";
			})	
			->make(true);
	}
	
	
	
	public function otherpage_delete($id)
	{
	    $c = Otherpage::find($id);
	    $c->delete();
	    return redirect('/admin/otherpage-list');
	}
	

	public function otherpage_edit($id)
	{
	    
		$topics = Otherpage::find($id);
		return view('ecm_admin.otherpage.otherpage_edit')
				->with('id',$id) 
				->with('topics',$topics);
	}
	
	public function otherpage_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[			

			'otherpage_description' => 'required',
			'otherpage_title' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/otherpage-edit/'. $id ) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $f = $_FILES["otherpage_banner_url"]["name"];
        
        $old_otherpage_file = trim($r->input("old_otherpage_banner_url"));
        

        if( $f == "") {
            $otherpage_file = $old_otherpage_file ;
        }else{
            $otherpage_file = date('YmdHis')."_".$f;
        }     

    
        if(move_uploaded_file($_FILES["otherpage_banner_url"]["tmp_name"] , "ecm/img/". $otherpage_file )){}

	    		$t = Otherpage::find($id);$t->otherpage_type      	= trim($r->input("otherpage_type")); 
	    		$t->otherpage_title      	= trim($r->input("otherpage_title")); 
	    		$t->otherpage_description	= trim($r->input("otherpage_description")); 
	    		$t->otherpage_banner_url  = $otherpage_file;
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->update();      

        
		
		return redirect('/admin/otherpage-edit/'. $id)->with('success','更新されました。');  
	}
	

	
}
