<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ExplanationType; 
use App\VideoSetting;
use App\AudioSetting;
use App\BusinessMemberAuditionUserRequest;
use DB; 
use Datatables;


class BusinessMemberAuditionController extends Controller
{     
    
    public function index()
    {	
        $types = BusinessMemberAuditionUserRequest::orderBy('id','desc')->get();
        return view('backend.admin.business_members_audition.members_request_list')
                ->with('bas',$types);    
    } 
    
    //business_members_audition
    public function member_request_list_data_table()
    {
        $audios = BusinessMemberAuditionUserRequest::orderBy('id','desc')->get();
        
        //dd($audios);
       
        return Datatables::of($audios)                   
			->make(true);
    }

    
    
}
