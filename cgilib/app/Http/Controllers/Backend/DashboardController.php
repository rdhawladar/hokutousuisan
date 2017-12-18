<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use App\User;
use App\Packages;
use App\Vdo;
use App\PackageWiseVideoAssign;

use DB;
use Datatables; 
 

class DashboardController extends Controller
{     
       
	
	public function index()
    {			 	
        return view('backend.admin.home_page');  
    }

}


		/*
		$pack_assigns = PackageWiseVideoAssign::select(DB::raw('packages.*,COUNT(cat_wise_vdo_share.vdo_id) AS total_vdos'))
		                                        ->leftJoin('packages','packages.id','=','cat_wise_vdo_share.cat_id')
		                                        ->leftJoin('vdos','vdos.id','=','cat_wise_vdo_share.vdo_id')
		                                        ->groupBy('cat_wise_vdo_share.cat_id')
		                                        ->get();
	*/

