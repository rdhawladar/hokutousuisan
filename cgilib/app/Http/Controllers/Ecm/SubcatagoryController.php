<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderImage;
use App\Subcatagory;
use App\Catagory;
use Datatables; 
 
 
class SubcatagoryController extends Controller
{     
 
	
    public function index()
    {	
        $sub = Catagory::orderBy('id','asc')->get();
		return view('ecm_admin.subcatagory.subcatagory_entry')
				->with('sub',$sub);
    }     	 
	
	public function subcatagory_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[	
			'subcatagory_title' => 'required' ,		
			'subcatagory_description' => 'required',
			'subcatagory_thumbnail_url' => 'required|file'
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Ecm\SubcatagoryController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
    
   
        $subcatagory_thumbnail_file = date('YmdHis')."_".$_FILES["subcatagory_thumbnail_url"]["name"];


	        if(move_uploaded_file($_FILES["subcatagory_thumbnail_url"]["tmp_name"] , "ecm/subcatagory_img/". $subcatagory_thumbnail_file ))
	        {
	        	//echo $subcatagory_file."<br>".$subcatagory_thumbnail_file;
	    		$t = new subcatagory();
	    		$t->subcatagory_title      	= trim($r->input("subcatagory_title")); 
	    		$t->subcatagory_description	= trim($r->input("subcatagory_description")); 
	    		$t->catagory_id	= trim($r->input("catagory_id")); 
	        	$t->subcatagory_thumbnail_url  = $subcatagory_thumbnail_file;  
	    		$t->created_at =  date('Y-m-d H:i:s');
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->save();
	        }
		
		return redirect()->action('Ecm\SubcatagoryController@index')->with('success','追加されました');  		 	
	}
	
	
	public function subcatagory_list()
    {	
        return view('ecm_admin.subcatagory.subcatagory_list');  
    }
	
	public function subcatagory_list_data_table()
	{	
		$topics = Subcatagory::orderBy('id','asc')
					->whereNotIn('parent_type', ['cat'])
					->WhereNotIn('parent_type', ['main'])
					-> get();
		//dd($topics);
		return Datatables::of($topics)
	  //       ->editColumn('subcatagory_title', function ($result) {
			//    return  $result->subcatagory_title;
			// })		

			->editColumn('subcatagory_banner_url', function ($result) {
			   return  "<img style='width:100%;max-width:600px;' src='".  url("/ecm/subcatagory_img/". $result->subcatagory_banner_url ) . "' />";
			})	

			->editColumn('subcatagory_thumbnail_url', function ($result) {
			   return  "<img style='width:100%;max-width:600px;' src='".  url("/ecm/subcatagory_img/". $result->subcatagory_thumbnail_url ) . "' />";
			})	

			->editColumn('action', function ($result) {
			  return "<a class='btn btn-xs btn-success' href='". url('/admin/subcatagory-edit/'. $result->id .'') ."'>変更</a>&nbsp;".
			   			    "<a class='btn btn-xs btn-danger' href='". url('/admin/subcatagory-delete/'. $result->id .'') ."'>削除</a>";
			})	
			->make(true);
	}
	
	
	
	public function subcatagory_delete($id)
	{
	    $c = Subcatagory::find($id);
	    $c->delete();
	    return redirect('/admin/subcatagory-list');
	}
	

	public function subcatagory_edit($id)
	{
	    
		$topics = Subcatagory::find($id);
		$sub = Catagory::orderBy('id','asc')->get();
		return view('ecm_admin.subcatagory.subcatagory_edit')
				->with('id',$id) 
				->with('topics',$topics)
				->with('sub',$sub);
	}
	
	public function subcatagory_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[			
			'subcatagory_description' => 'required',
			'subcatagory_title' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/subcatagory-edit/'. $id ) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $g = $_FILES["subcatagory_thumbnail_url"]["name"];
        
        $old_subcatagory_thumbnail_file = trim($r->input("old_subcatagory_thumbnail_url"));
 

        if( $g == "") {
            $subcatagory_thumbnail_file = $old_subcatagory_thumbnail_file ;
        }else{
            $subcatagory_thumbnail_file = date('YmdHis')."_".$g;
        }
        
	        if(move_uploaded_file($_FILES["subcatagory_thumbnail_url"]["tmp_name"] , "ecm/subcatagory_img/". $subcatagory_thumbnail_file )){}
	    		$t = Subcatagory::find($id);
	    		$t->subcatagory_title      = trim($r->input("subcatagory_title"));
	    		$t->catagory_id      = trim($r->input("catagory_id"));
	    		$t->subcatagory_description      = trim($r->input("subcatagory_description"));
	    		$t->subcatagory_thumbnail_url  = $subcatagory_thumbnail_file;
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->update();
	    	
        
		
		return redirect('/admin/subcatagory-edit/'. $id)->with('success','更新されました。');  
	}
	

	
}
