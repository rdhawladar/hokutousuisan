<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
 
use DB; 
use Carbon\Carbon;
use App\CalendarEvents; 

class TestController extends Controller
{     
   
    public function index()
    {	
	   echo $date = '2017-07-13';
	   $time1 = Carbon::now('Asia/Dhaka');
   	   $time1 = Carbon::createFromFormat('Y-m-d',$date)->toDateTimeString();
   	   $time2 = Carbon::now('Asia/Dhaka');
	   $time2 = Carbon::createFromFormat('Y-m-d',$date)->toDateString();
	   
       //echo $time1."<br/>". $time2;
       
       //echo DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')='". $date ."'");
       
        $c = CalendarEvents::where(DB::raw("DATE_FORMAT('created_at','%Y-%m-%d')='". $date ."'"))->first();
        dd($c);
    }     
	
	
}
