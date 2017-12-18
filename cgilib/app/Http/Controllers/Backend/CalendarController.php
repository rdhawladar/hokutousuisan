<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\User;
use App\CalendarEvents;
use App\NewsPoll;
 
use Datatables; 
 

class CalendarController extends Controller
{     
    
    /*public function __construct()
    {
        $this->middleware('auth');
    }      
	*/
	public function index()
    {	
		$month   = date ("m");
		$year    = date("Y");
		$day     = date("d");
		$endDate = date("t" , mktime(0,0,0,$month,$day,$year) );
		$today   = date("F, d Y " , mktime(0,0,0,$month,$day,$year) );
    
    	$todayJP   = date("Y") ."年" . date("m") ."月". date("d") . "日";    
		$s = date ("w", mktime (0,0,0,$month,1,$year) );
		
        return view('backend.admin.calendar.calendar_page')
			->with('month',$month)
			->with('year',$year)
			->with('day',$day)
			->with('endDate',$endDate)
			->with('today',$today)
            ->with('todayJP',$todayJP)
			->with('s',$s);  
    }
    
    
    public function set_shcedule( $date )
    {
        $current_date = $date ;		
		return view('backend.admin.calendar.calendar_event_add')                 
                ->with('event_date' , $current_date );
    }
    
    
    public function set_shcedule_action(Request $r)
    {
        $validator = \Validator::make($r->all(),[			
			'event_date' => 'required' ,
			'event_title' => 'required' ,
			'description' => 'required' 
		]);
		
	    $date = trim($r->input("event_date"));  
		
		if ($validator->fails()) {
            return redirect('/admin/calendar-set-event/'.$date)
                        ->withErrors($validator)
                        ->withInput();
        } 
		
		$edate = date("Y-m-d",strtotime($date))." ".date('H:i:s');
		    			
		$pure_date = date("Y-m-d",strtotime($date));
	 			
			$c = new CalendarEvents();   		    
			$c->event_title = trim($r->input("event_title"));
			$c->description = trim($r->input("description"));
			$c->event_date = date("Y-m-d",strtotime($date));
			$c->created_at = $edate;
			$c->updated_at = $edate;
			$c->save(); 		 
		
		return redirect('/admin/calendar-set-event/'.$date)
				->with('success','Data saved successfuly'); 
    }
    
    public function events_list()
	{
		return view("backend.admin.calendar.events_list");		
	}
	
	public function events_list_data_table()
	{	
		$events = CalendarEvents::orderBy('id','desc')->get();
		return Datatables::of($events)
			->editColumn('created_at', function($result){
			   return  date('Y-m-d',strtotime($result->created_at));
			})	
			->editColumn('voting', function($result){
			     $yes = NewsPoll::where('vote_for','=','yes')->where('news_id','=', $result->id )->count();
 			     $no =  NewsPoll::where('vote_for','=','no')->where('news_id','=', $result->id )->count();

			   return   "<span class='label label-primary'>agree: ".$yes."</span><br/><span class='label label-warning'>disagree: ".$no."</span>";
			})
			->editColumn('id', function($result){
			   return  '<a class="btn btn-xs btn-success" href="' . url('/admin/calendar-event-edit/'.  date("Y-m-d",strtotime($result->created_at)) .'/'. $result->id ) .'">編集</a>&nbsp;'.
			             '<a class="btn btn-xs btn-danger" href="' . url('/admin/calendar-event-delete/'. $result->id ) .'">削除する</a>';			   
			})
			->make(true);
	}
   
    
	public function calendar_event_edit($date,$id)
	{
	    $c = CalendarEvents::where('id','=',$id)->first();
	    return view("backend.admin.calendar.calendar_event_edit")->with('edate',$date)->with('id',$id)->with('c',$c);
	}
	 

    public function calendar_event_edit_action( Request $r )
    {
        $id = trim($r->input("id"));
        $event_date  = trim($r->input("event_date"));
        $event_title = trim($r->input("event_title"));
        $description = trim($r->input("description"));
        
        $c = CalendarEvents::where('id','=',$id)->first();
        $c->event_title = $event_title;
        $c->description = $description;
        $c->created_at = $event_date ." ".date('H:i:s');
        $c->update();
        
        return redirect('/admin/calendar-event-edit/'. $event_date . '/'. $id )
				->with('success','Data saved successfuly'); 
    
    }
    
    
    public function calendar_event_feedback_list()
    {
         return view("backend.admin.calendar.event_feedback_list");
    }
    
    
    public function calendar_event_feedback_list_data_table()
    {
        
        $events = NewsPoll::leftJoin('event_table','event_table.id','=','news_poll.news_id')
                    //->leftJoin('users','users.id','=','news_poll.user_id')
                    ->leftJoin('calendar_poll_request_form',function($j){
                        $j->on('news_poll.news_id','=','calendar_poll_request_form.news_id');
                    })
                    ->select(['news_poll.id', 'event_table.event_title','calendar_poll_request_form.name','calendar_poll_request_form.email',
                              'calendar_poll_request_form.message','news_poll.vote_for','news_poll.created_at'])
                    ->orderBy('news_poll.id','desc')
                    ->get();
                //dd($events);
                
        
        	    //orderBy('id','desc')->get();
		return Datatables::of($events)
		 
			->make(true); 
    }
    

    public function calendar_event_delete($id)
    {
        $c = CalendarEvents::find($id);   
        $c->delete();
        return redirect('/admin/calendar-event-list' );
    }
}
