<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logo;
use App\Order_date_range;

 
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

	public function order_date_range_edit()
	{
		$topics = Order_date_range::get()->where('id', 1)->first();
		return view('ecm_admin.pro_order.order_date_range_edit')
				->with('topics',$topics);
	}	

		
	public function order_date_range_edit_action(Request $r)
	{
		
		$validator = \Validator::make($r->all(),[				
			'min_delivery_date' => 'required',
			'max_delivery_date' => 'required'
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/order-date-range') 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
    		$t = Order_date_range::get()->where('id', 1)->first();
    		$t->min_delivery_date      = trim($r->input("min_delivery_date"));
    		$t->max_delivery_date      = trim($r->input("max_delivery_date"));
    		$t->update();
        
		
		return redirect('/admin/order-date-range')->with('success','更新されました。');  
	}

	
}
