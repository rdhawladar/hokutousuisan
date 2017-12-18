<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Footer;

 
class FooterController extends Controller
{     
	public function footer_edit($id)
	{
		$footer = Footer::find($id);

		return view('ecm_admin.footer.footer_edit')
				->with('id',$id) 
				->with('footer',$footer);
	}
	
	public function footer_edit_action(Request $r)
	{
	 	$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[			
			'footer_data' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/footer-edit/'.$id) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        

    		$t = Footer::find($id);
    		$t->footer_data      = urldecode($r->input("footer_data"));
    		$t->updated_at =  date('Y-m-d H:i:s');
    		$t->update();
        
		
		return redirect('/admin/footer-edit/'.$id)->with('success','更新されました。');  
	}
	

	
}
