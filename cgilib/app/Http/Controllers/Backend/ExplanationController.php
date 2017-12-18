<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\ExplanationType;

use DB;
use Datatables;
  

class ExplanationController extends Controller
{     
    
    public function index()
    {			
	   $types = ExplanationType::all();	
       return view('backend.admin.explanation.explanation_entry')->with('types',$types );
    }     
	 
	public function explanation_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[			
			'type' => 'required' ,
			'title' => 'required' ,
			'description' => 'required' 			 
		]);
		
	    $type = trim($r->input("type"));
		$title = trim($r->input("title"));  
		$description = trim($r->input("description"));  
		
		if ($validator->fails()) {
            return redirect()->action('Backend\ExplanationController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 

		$c = Explanation::where('type','=',$type)->count();
		if($c==0){	
			$m = new Explanation();
			$m->type = $type;
			$m->title = $title;
			$m->explanation_detail = $description;
			$m->created_at = date('Y-m-d H:i:s');
			$m->updated_at = date('Y-m-d H:i:s');
			$m->save();
			$msg = 'Explation saved successfuly';
		}else{			
			$msg = 'Explation already exist';
		}
		return redirect()->action('Backend\ExplanationController@index')
				->with('success',$msg); 
	}
	
	
	public function explanation_edit($id)
    {			
		$exp = Explanation::find($id);
		$types = ExplanationType::all();
       return view('backend.admin.explanation.explanation_edit')
				->with('exp' , $exp)
				->with('types',$types );
    } 
	
	
	public function explanation_edit_action(Request $r)
    {
        $id = trim($r->input("exp_id"));
		if($id != "" ) 
		{
			$e = Explanation::find($id);
			//dd($e);
			$e->type = trim($r->input("type"));
			$e->title = trim($r->input("title"));
			$e->explanation_detail = trim($r->input("description"));
			$e->updated_at = date('Y-m-d H:i:s');
			$e->update();
		}
		
		
		return redirect('/admin/explanation-edit/'.$id )
				->with('success','Explation updated successfuly'); 
		//		echo $r->input("exp_id");
	}	
	
	
	public function explanations_list()
    {
		return view('backend.admin.explanation.explation_list');
	}	
	
	public function explanations_data_table()
    {		
		$exps = Explanation::leftJoin('types_of_explanation','types_of_explanation.sname','=','explanation_info.type')
		    ->select(['explanation_info.id','types_of_explanation.sname','explanation_info.explanation_detail','explanation_info.title','types_of_explanation.name','explanation_info.ordering'])
		    ->where('explanation_info.type','!=','business_member_audition')
		    ->orderBy('explanation_info.ordering','asc')->get();
		
	//	dd($exps);
	
		return Datatables::of($exps)
			->editColumn('id', function($result){
			   return "<a class='btn btn-xs btn-success' href='". url('/admin/explanation-edit/'.$result->id .'') ."'>編集</a>";
			})
			->make(true);
    }     
	 
    
	
	

	
	
}
