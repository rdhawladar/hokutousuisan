<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\User;
use App\KuniAudioFile; 
use DB; 

class YourCustomAudioController extends Controller
{        
    
    public function index()
    {	           
       $full_route = Route::getFacadeRoot()->current()->uri();
       $parse = explode('/' , $full_route);
       $audioID  = $parse[0];
       $serialNO = $parse[1];    
       $c = KuniAudioFile::where('rid','=',$audioID)->count();	
       if( $c > 0 ) 
       {
         $k = KuniAudioFile::where('rid','=',$audioID)->first();	
         return view("backend.user.promotion.promotion_audio")
               ->with('slno', $serialNO)
         		->with('aid', $audioID)
         		->with('k',$k);
       }
    	else
        {
           echo "HTTP Error 400 Bad request!";
       }    
    }     
    
    public function embed()
    {
        $full_route = Route::getFacadeRoot()->current()->uri();
        $parse = explode('/' , $full_route);
        $audioID  = $parse[0];
        $serialNO = $parse[2];  
        $k = KuniAudioFile::where('rid','=',$audioID)->first();
        return view("backend.user.promotion.iframe_audio")
        		->with('slno', $serialNO)
        		->with('aid', $audioID)
         		->with('k',$k);
    }
 
}
