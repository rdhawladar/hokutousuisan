<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderImage;

use Datatables; 
 
 
class SliderImageController extends Controller
{     
 
	
    public function index()
    {	
        
	    return view('ecm_admin.slider.slider_entry');
    }     	 
	
	public function slider_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[	
			'slider_title' => 'required' ,		
			'slider_url' => 'required|file' 
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Ecm\SliderImageController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
    
    
        
        $slider_file = date('YmdHis')."_".$_FILES["slider_url"]["name"];
        if(move_uploaded_file($_FILES["slider_url"]["tmp_name"] , "ecm/slider_img/". $slider_file )){
    		$t = new SliderImage();
    		$t->slider_title      = trim($r->input("slider_title")); 
        	$t->slider_url  = $slider_file;  
    		$t->created_at =  date('Y-m-d H:i:s');
    		$t->updated_at =  date('Y-m-d H:i:s');
    		$t->save();
        }
		
		return redirect()->action('Ecm\SliderImageController@index')->with('success','追加されました');  		 	
	}
	
	
	public function slider_list()
    {	
        return view('ecm_admin.slider.slider_list');  
    }
	
	public function slider_list_data_table()
	{	
		$topics = SliderImage::orderBy('id','asc')->get();
		//dd($topics);
		return Datatables::of($topics)
	  //       ->editColumn('slider_title', function ($result) {
			//    return  $result->slider_title;
			// })		

			->editColumn('slider_url', function ($result) {
			   return  "<img style='width:100%;max-width:600px;' src='".  url("/ecm/slider_img/". $result->slider_url ) . "' />";
			})	
			->editColumn('action', function ($result) {
			  return "<a class='btn btn-xs btn-success' href='". url('/admin/ecm/ecm/slider-image-edit/'. $result->id .'') ."'>変更</a>&nbsp;".
			   			    "<a class='btn btn-xs btn-danger' href='". url('/admin/slider-image-delete/'. $result->id .'') ."'>削除</a>";
			})	
			->make(true);
	}
	
	
	
	public function slider_delete($id)
	{
	    $c = SliderImage::find($id);
	    $c->delete();
	    return redirect('/admin/slider-image-list');
	}
	

	public function slider_edit($id)
	{
	    
		$topics = SliderImage::find($id);
		return view('ecm_admin.slider.slider_edit')
				->with('id',$id) 
				->with('topics',$topics);
	}
	
	public function slider_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[			
			'slider_url' => 'required' ,	
			'slider_title' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/slider-image-edit/'. $id ) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $f = $_FILES["slider_url"]["name"];
        
        $old_slider_file = trim($r->input("old_slider_url"));
        

        if( $f == "") {
            $slider_file = $old_slider_file ;
        }else{
            $slider_file = date('YmdHis')."_".$f;
        }
        
    
        if(move_uploaded_file($_FILES["slider_url"]["tmp_name"] , "ecm/slider_img/". $slider_file )){
        }
    		$t = SliderImage::find($id);
    		$t->slider_title      = trim($r->input("slider_title"));
    		$t->slider_url  = $slider_file;
    		$t->updated_at =  date('Y-m-d H:i:s');
    		$t->update();
        
		
		return redirect('/admin/slider-image-edit/'. $id)->with('success','更新されました。');  
	}
	

	
}
