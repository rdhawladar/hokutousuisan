<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderImage;
use App\Catagory;

use Datatables; 
 
 
class CatagoryController extends Controller
{     
 
	
    public function index()
    {	
        
	    return view('ecm_admin.catagory.catagory_entry');
    }     	 
	
	public function catagory_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[	
			'catagory_title' => 'required' ,		
			'catagory_description' => 'required',
			'catagory_banner_url' => 'required|file'
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Ecm\CatagoryController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 

        
        $catagory_file = date('YmdHis')."_".$_FILES["catagory_banner_url"]["name"];

        if(move_uploaded_file($_FILES["catagory_banner_url"]["tmp_name"] , "ecm/catagory_img/". $catagory_file ))
	        {
	        	//echo $catagory_file."<br>".$catagory_thumbnail_file;
	    		$t = new Catagory();
	    		$t->catagory_title      	= trim($r->input("catagory_title")); 
	    		$t->catagory_description	= trim($r->input("catagory_description")); 
	        	$t->catagory_banner_url  	= $catagory_file;  
	    		$t->created_at =  date('Y-m-d H:i:s');
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->save();
	        }
		
		return redirect()->action('Ecm\CatagoryController@index')->with('success','追加されました');  		 	
	}
	
	
	public function catagory_list()
    {	
        return view('ecm_admin.catagory.catagory_list');  
    }
	
	public function catagory_list_data_table()
	{	
		$topics = Catagory::orderBy('id','asc')
					-> get();
		//dd($topics);
		return Datatables::of($topics)
	  //       ->editColumn('catagory_title', function ($result) {
			//    return  $result->catagory_title;
			// })		

			->editColumn('catagory_banner_url', function ($result) {
			   return  "<img style='width:100%;max-width:600px;' src='".  url("/ecm/catagory_img/". $result->catagory_banner_url ) . "' />";
			})	

			->editColumn('action', function ($result) {
			  return "<a class='btn btn-xs btn-success' href='". url('/admin/catagory-edit/'. $result->id .'') ."'>変更</a>&nbsp;".
			   		 "<a id='delete' class='btn btn-xs btn-danger' href='". url('/admin/catagory-delete/'. $result->id .'') ."'>削除</a>"/*.
			   		 "<button id='myModal'  type='submit' name = '".$result->id."' class='btn btn-xs btn-danger' >削除</button>"*/;
			})	
			->make(true);
	}
	
	
	
	public function catagory_delete(Request $r)
	{
	    $id = trim($r->input('id'));
	    $c = Catagory::find($id);
	    $c->delete();
	    //return redirect('/admin/catagory-list');
	    return redirect::back()->with('message','Operation Successful !');
	}
	

	public function catagory_edit($id)
	{
	    
		$topics = Catagory::find($id);
		return view('ecm_admin.catagory.catagory_edit')
				->with('id',$id) 
				->with('topics',$topics);
	}
	
	public function catagory_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[			

			'catagory_description' => 'required',
			'catagory_title' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/catagory-edit/'. $id ) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $f = $_FILES["catagory_banner_url"]["name"];
        
        $old_catagory_file = trim($r->input("old_catagory_banner_url"));
        

        if( $f == "") {
            $catagory_file = $old_catagory_file ;
        }else{
            $catagory_file = date('YmdHis')."_".$f;
        }        
        
    
        if(move_uploaded_file($_FILES["catagory_banner_url"]["tmp_name"] , "ecm/catagory_img/". $catagory_file )){}
	    		$t = Catagory::find($id);
	    		$t->catagory_title      = trim($r->input("catagory_title"));
	    		$t->catagory_description      = trim($r->input("catagory_description"));
	    		$t->catagory_banner_url  = $catagory_file;
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->update();        
        
		
		return redirect('/admin/catagory-list')->with('success','更新されました。');  
	}
	

	
}

?>
