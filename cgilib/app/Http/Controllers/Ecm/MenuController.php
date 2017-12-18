<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Menu; 

use Datatables; 
 
 
class MenuController extends Controller
{     
 
	
    public function index()
    {	
        $month_dates = array();
        $month_names = [ "January" , "February" , "March" , "April" , "May" , "June" , "July" , "August" , "September" , "October" , "November" , "December" ];
        
        for($j = date('Y') ; $j <= 2019 ; $j++ ) 
        {
            for($i = 0 ; $i < count($month_names) ; $i++) 
            {
                $month_digit = date('m' , strtotime($month_names[$i]));
                $date = $j."-".$month_digit."-01";
                $month_dates[] = $date;
                //echo $date.'<br/>';
            }
        }
	    return view('backend.admin.crazy_mindset.crazy_audio_entry')
	                ->with('month_dates' , $month_dates);
    }     	 
	
	public function menu_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[	
			'audio_title' => 'required' ,		
			'audio_url' => 'required|file' ,
        	'publish_year' => 'required' ,	
		    'publish_month' => 'required' ,
		    'publish_date' => 'required'  ,
            'publish_hour' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Backend\CrazyMindsetController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
    
    	$publish_date =  trim($r->input("publish_year"))."-".trim($r->input("publish_month"))."-".trim($r->input("publish_date"))." ".trim($r->input("publish_hour"));
        
        $parse = explode("-" , $publish_date);         
        
        $audio_file = date('YmdHis')."_".$_FILES["audio_url"]["name"];
        if(move_uploaded_file($_FILES["audio_url"]["tmp_name"] , "assets/dist/crazy_audio/". $audio_file )){
    		$t = new CrazyMindsetAudio();
    		$t->for_month  = $parse[0].'-'.$parse[1].'-01';
    		$t->title      = trim($r->input("audio_title"));    
            $t->rid   = mt_rand(111111111,999999999); 
        	$t->audio_url  = $audio_file;     
        	$t->publish_date =  $publish_date.":00:00";
    		$t->status     = "ACTIVE";
    		$t->created_at =  date('Y-m-d H:i:s');
    		$t->updated_at =  date('Y-m-d H:i:s');
    		$t->save();
        }
		
		return redirect()->action('Backend\CrazyMindsetController@index')->with('success','追加されました');  		 	
	}
	
	
	public function menu_list()
    {	
        return view('ecm_admin.menu.menu_list');  
    }
	
	public function menu_data_table()
	{	
		$menu = Menu::orderBy('id','asc')->get();
		//dd($topics);
		return Datatables::of($menu)
	        ->editColumn('menu_title', function ($result) {
			   return  $result->menu_title;
			})		

			->editColumn('action', function ($result) {
			  return "<a class='btn btn-xs btn-success' href='". url('/admin/menu-edit/'. $result->id .'') ."'>変更 Menu</a>&nbsp;"
			   			    /*."<a class='btn btn-xs btn-danger' href='". url('/admin/crazy-mindset-audio-delete/'. $result->id .'') ."'>削除</a>"*/;
			})	
			->make(true);
	}
	
	
	
	public function menu_delete($id)
	{
	    $c = Menu::find($id);
	    $c->delete();
	    return redirect('/admin/crazy-mindset-audio-list');
	}
	
	public function menu_edit($id)
	{    
		$menu = Menu::find($id);
		return view('ecm_admin.menu.menu_edit')
				->with('menu', $menu)
				->with('id', $id);
	}
	
	public function menu_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[			
			'menu_title' => 'required'
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/menu-edit/'. $id) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
    		$t = Menu::find($id);
    		$t->menu_title      = trim($r->input("menu_title"));
    		$t->update();
		return redirect('/admin/menu-edit/'. $id)->with('success','更新されました。');  
	}
	

	
}
