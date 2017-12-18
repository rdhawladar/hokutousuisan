<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\NewsFeed; 
use App\NewsPoll;
 
use DB; 

class NewsController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function news_event_json()
    {	
        $news = NewsFeed::orderBy('id','desc')->take(45)->get();
        
        $html = '<ul id="business_idea_list" class="todo-list ui-sortable">';
        foreach($news as $n)
        {
            $html .= '<li>
                    <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <span class="text">'.  $n->title  .'&nbsp;</span>
                </li>';
        }
        $html .= "</ul>";
        
        
        $data = array('data'=>$html);
        return response($data)
        	->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Credentials", true)
        ->header("Access-Control-Allow-Methods", "PUT, POST, GET, OPTIONS, DELETE");

    }    

 
	public function news_detail($id)
	{
	    $n = NewsFeed::where('id','=',$id)->first();   
	    return view("backend.user.news.news_detail")->with("n",$n);
	}
	 
 
   

	
	
}
