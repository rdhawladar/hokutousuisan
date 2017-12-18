<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logo;

 
class LogoController extends Controller
{     
	public function logo_edit($id)
	{
		$topics = Logo::find($id);
		return view('ecm_admin.slider.logo_edit')
				->with('id',$id) 
				->with('topics',$topics);
	}
	
	public function logo_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[				
			'logo_title' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/logo-edit/'.$id) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $logo_file = trim($r->input("old_logo_url"));
        
    
        if(move_uploaded_file($_FILES["logo_url"]["tmp_name"] , "ecm/slider_img/". $logo_file )){
        }
    		$t = Logo::find($id);
    		$t->logo_title      = trim($r->input("logo_title"));
    		$t->logo_url  = $logo_file;
    		$t->updated_at =  date('Y-m-d H:i:s');
    		$t->update();
        
		
		return redirect('/admin/logo-edit/'.$id)->with('success','更新されました。');  
	}
	

	
}
