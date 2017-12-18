<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\UserPointDistribution; 
use App\ContentDetail;
use App\User; 
use Datatables; 
 

class UserPointDistributionController extends Controller
{     
 
 	public function index()
    {	
        $contents = ContentDetail::all();
        return view('backend.admin.user_point.user_point_entry')->with('contents' , $contents );  
    }
	
	
	public function point_entry(Request $r)
	{
	    
	    $content_page = trim($r->input("content_page"));
	    $point = trim($r->input("point"));
	    
	    $validator = \Validator::make($r->all(),[			
			'content_page' => 'required' ,
			'point' => 'required' 
		]);
	    
	    
	    if ($validator->fails()) {
            return redirect()->action('Backend\UserPointDistributionController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
	    
	    
	    $c = UserPointDistribution::where('content_page','=',$content_page)->count();
	    
	    if( $c == 0 ){
    	    $ud = new  UserPointDistribution();
    	    $ud->content_page = $content_page;
    	    $ud->gpoint = $point;
    	    $ud->created_at = date('Y-m-d H:i:s');
    	    $ud->updated_at = date('Y-m-d H:i:s');
    	    $ud->save();
	    } else {
	        $ud = UserPointDistribution::where('content_page','=',$content_page)->first();
    	    $ud->gpoint = $point;
    	    $ud->updated_at = date('Y-m-d H:i:s');
    	    $ud->update();
	    }
	    
        return redirect()->action('Backend\UserPointDistributionController@index')
				->with('success', 'Explation saved successfuly'); 
	}
	
	public function point_list()
	{
	    return view("backend.admin.user_point.point_list");
	}
	
	
	public function point_list_data_table()
	{
	    $exps = UserPointDistribution::leftJoin('content_detail','content_detail.content_page','=','user_point_distribution.content_page')
	            ->select(['user_point_distribution.id','user_point_distribution.content_page','user_point_distribution.gpoint','content_detail.title'])
	                ->orderBy('id','desc')->get();
		return Datatables::of($exps)	
			/*->editColumn('id', function($result){			   return "<a class='btn btn-success' href='". url('/admin/explanation-edit/'.$result->id .'') ."'>Edit</a>";
			})*/
			->make(true);
	}
	 

}
