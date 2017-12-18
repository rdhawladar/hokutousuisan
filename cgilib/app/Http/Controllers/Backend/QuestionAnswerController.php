<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ExplanationType; 
use App\VideoSetting;
use App\AudioSetting;
use App\QuestionAnswerRequest;
use DB; 
use Datatables;


class QuestionAnswerController extends Controller
{     
    
    public function index()
    {	
         
        return view('backend.admin.question_answer.qa_request_list');    
    } 
    
    //business_members_audition
    public function question_answer_request_list_data_table()
    {
        $audios = QuestionAnswerRequest::orderBy('id','desc')->get();
        
        //dd($audios);
       
        return Datatables::of($audios)  
			->make(true);
    }

    
    
}
