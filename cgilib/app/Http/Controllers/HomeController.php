i<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
 

 

class HomeController extends Controller
{     
  /*  public function __construct()
    {
        $this->middleware('auth');
    }
    */
    public function index()
    {	
		/*if(\Auth::user()->id == 1)
		return redirect()->action('Backend\DashboardController@index');  
		else*/
        return redirect()->action('User\ProfileController@index');  
        //echo "controller";
    } 


    public function agreement()
    {
       return view('ecm.agreement');
    }    
	
	
}
