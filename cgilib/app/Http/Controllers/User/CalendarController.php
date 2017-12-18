<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\CalendarEvents; 
use App\NewsFeed;
use App\NewsPoll;
use App\CalendarPollRequestForm;
use App\CrazyMindsetAudio;
use App\ForMonth;
use DB; 

class CalendarController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {		
	 
		date_default_timezone_set("Asia/Tokyo");
	$current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
    
	  $calendar_events = CalendarEvents::orderBy('id','desc')->get();
		$news_feeds =  NewsFeed::orderBy('id','desc')->get();
	//	dd($months);
	 
        return view('backend.user.calendar.calendar_page2')
			->with('news_feeds',$news_feeds)
			->with('calendar_events',$calendar_events)
			 ->with('months' , $months);  
    }    

	public function event_details($date)
	{		
	    //  echo $date;
	    date_default_timezone_set("Asia/Tokyo");
    $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
    
    
	   $e = CalendarEvents::whereYear('created_at','=',date('Y',strtotime($date)))
	                    ->whereMonth('created_at','=',date('m',strtotime($date)))
	                    ->whereDay('created_at','=',date('d',strtotime($date)))
	                    ->first(); 
	                    
	 
	                   
		return view('backend.user.calendar.calendar_event_detail_page')	
		        ->with('event_date', $date)
		        ->with('e', $e)->with('months' , $months); 
	}	
	 
	public function calendar_event_details($id)
	{
    date_default_timezone_set("Asia/Tokyo");
	  $current_month = date('Y-m-01');
		$months = ForMonth::whereDate('for_month','<=' , $current_month)
			->orderBy('for_month','asc')->get();
		
	     $e = CalendarEvents::where('id','=',$id)->first();
	     return view('backend.user.calendar.calendar_event_detail_page')
	                ->with('e',$e)->with('months' , $months);
	}
	
	 public function calendar_events_json()
	{
		$month   = date ("m");
		$year    = date("Y");
		$day     = date("d");
		$endDate = date("t" , mktime(0,0,0,$month,$day,$year) );
		$today   = date("F, d Y " , mktime(0,0,0,$month,$day,$year) );		
		$s = date ("w", mktime (0,0,0,$month,1,$year) );	
		
		
		$c = date('Y-m-01');
		$lc = date('y').'-'.($month+3) . '-30';
		
		
		$events = CalendarEvents::whereBetween('event_date',[ $c ,$lc ])->orderBy('event_date','asc')
		                    ->get();
		                    
		
		//dd($events);
		
		$html = '<ul class="timeline">';
		
		foreach( $events as $e) {
		    $html .= '<li class="time-label"><span class="bg-red">'. date("M,Y", strtotime($e->event_date)) .'</span></li>';
			$html .= '<li>
			 <i class="fa  bg-blue">'. date("d", strtotime($e->event_date)) .'</i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> '. date("H:i", strtotime($e->created_at))  .'</span>
            <h3 class="timeline-header"><a href="http://sbkmart.com/v2/user/calendar-detail/'. $e->id .'">'. $e->event_title .'</a> ...</h3>
            
        </div>';
		}
		$html .= '</ul>';
		
		$data = array('data'=>$html);
		return response($data)
		->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Credentials", true)
        ->header("Access-Control-Allow-Methods", "PUT, POST, GET, OPTIONS, DELETE");


	}	
	 
 
    public function calendar_json()
	{
		$month   = date ("m");
		$year    = date("Y");
		$day     = date("d");
		$endDate = date("t" , mktime(0,0,0,$month,$day,$year) );
		$today   = date("F, d Y " , mktime(0,0,0,$month,$day,$year) );		
		$s = date ("w", mktime (0,0,0,$month,1,$year) );	
		
		$c = date('m');
		$lc = date('m')-3;
		
		$events = CalendarEvents::whereMonth('created_at','=>', $c )->whereMonth('created_at','<=',$lc)->get();	
		
				
		
		$html = '<table align="center" border="0" cellpadding="5" cellspacing="5" style="width:100%;">
        			<tr>
        				<td align="center">Today : '. $today .'</td>
        			</tr>
        		 </table>
        		 <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:100%;border:1px solid #CCCCCC">
        				<thead>
        					<tr bgcolor="#EFEFEF">
        						<td align="center">Mon</td>
        						<td align="center">Sun</td>
        						<td align="center">Tue</td>
        						<td align="center">Wed</td>
        						<td align="center">Thu</td>
        						<td align="center">Fri</td>
        						<td align="center">Sat</td>
        					</tr>
        				</thead>';
		
		for( $ds = 1 ; $ds <= $s ; $ds++ ) {
			$html .= '<td style="font-family:arial;color:#B3D9FF;height:200px;border:1px solid #ccc;" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;&nbsp;</td>';
		}
		
		
		for( $d = 1; $d <= $endDate ; $d++)
		{						
			if (date("w",mktime (0,0,0,$month,$d,$year)) == 0){ 
			 $html .= '<tr>';
			}					
			
			$fontColor="#000000";
			
			if ( date("D" , mktime (0,0,0,$month,$d,$year) ) == "Sun")
			{ 	 						 
					$fontColor="red";
			}
				    
			if($d == $day)
			{	
				//echo 23;
				$fe = CalendarEvents::whereDay('created_at','=', $d)->whereMonth('created_at','=', date('m'))->whereYear('created_at','=', date('Y'))->first();	
				$html .= '<td style="font-family:arial;font-size:13px;color:#333333;width:14%;height:200px;background-color:#eea236;border:1px solid #ccc;" align="center" valign="middle">
					<span style="color:'. $fontColor .';text-decoration:underline;">
						<a href="'. url('/v2/user/calendar-event-detail/'. $year.'-'.$month.'-'. $d   ) .'">
							'. $d .'
						</a>							
					</span>
					<table width="100%">
					<tr>
						<td align="center" style="background-color:#001f3f;color:#fff;border-radius:10px;">'. $fe['event_title'] .'</td>
					</tr>
					</table>
				</td>';
			
			}
			else
			{		
				//echo 24;
				$fe = CalendarEvents::whereDay('created_at','=', $d)->whereMonth('created_at','=', date('m'))->whereYear('created_at','=', date('Y'))->first();	
				
				$html .= '<td style="font-family:arial;font-size:13px;color:#333333;width:14%;height:200px;border:1px solid #ccc;" align="center" valign="middle">
					<span style="color:'. $fontColor  .';">
						<a href="'. url('/v2/user/calendar-event-detail/'. $year.'-'.$month.'-'. $d ) .'">
						'. $d .'
						</a>
					</span>
					<table width="100%">
					<tr>
						<td align="center" style="background-color:#001f3f;color:#fff;border-radius:10px;">'. $fe['event_title']  .'</td>
					</tr>
					</table>
				</td>';					
			}
			
			if ( date("w" , mktime (0,0,0,$month,$d,$year)) == 6 )
			{ 		 
				$html .= '</tr>'; 
			}					
		}
		$html .='		</table>'; 
		
		$table = array('data' => $html);
		
		return response($table)->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Credentials", true)
        ->header("Access-Control-Allow-Methods", "PUT, POST, GET, OPTIONS, DELETE");
	}	
	
	
    public function make_poll(Request $r)
	{
	    $news_id = trim($r->input("news_id"));
	    $vote_for = trim($r->input("vote_for"));
	    $user_id = \Auth::user()->id;
	    
	    $ncc = NewsPoll::where('news_id','=',$news_id)->where('user_id','=',$user_id)->count();
        if( $ncc == 0 ) {
    	    $n = new NewsPoll();
    	    $n->news_id = $news_id;
    	    $n->user_id = $user_id;
    	    $n->vote_for = $vote_for;
    	    $n->created_at = date('Y-m-d H:i:s');
    	    $n->updated_at = date('Y-m-d H:i:s');
    	    $n->save();
    	    echo 1;
        }else{
            echo 0;
        }
	    
	}
	
	public function poll_result($id)
	{
	    $yes_count = NewsPoll::where('news_id','=',$id)->where('vote_for','=','yes')->count();
	    $no_count = NewsPoll::where('news_id','=',$id)->where('vote_for','=','no')->count();	    
	    
	    $data= array("yes"=>$yes_count , "no"=>$no_count );
	    return response($data)
	    	->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Credentials", true)
        ->header("Access-Control-Allow-Methods", "PUT, POST, GET, OPTIONS, DELETE");

	}
	
	
	public function poll_request_form(Request $r)
	{
	    $cp = new CalendarPollRequestForm();
	    $cp->news_id = trim($r->input("news_id"));
	    $cp->name = trim($r->input("name"));
	    $cp->email = trim($r->input("email"));
	    $cp->message = trim($r->input("message"));
	    $cp->created_at = date('Y-m-d H:i:s');
	    $cp->updated_at = date('Y-m-d H:i:s');
	    $cp->save();
	    echo 1;
	}
	
}
