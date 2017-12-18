<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ExplanationType; 
use App\VideoSetting;
use App\AudioSetting;
use App\MajimeTerroristRequest;
use DB; 
use Datatables;


class MajimeTerroristController extends Controller
{     
    
    public function index()
    {	
         
        return view('backend.admin.majime_terrorist.majime_terrorist_request_list');    
    } 
    
    //business_members_audition
    public function majime_terrorist_request_list_data_table()
    {
        $audios = MajimeTerroristRequest::orderBy('id','desc')->get();
        
        //dd($audios);
       
        return Datatables::of($audios)  
			->make(true);
    }

    
    
}
