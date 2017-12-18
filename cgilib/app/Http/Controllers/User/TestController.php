<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserOnCircle;
use App\VideoSetting;
 

class TestController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    
    
    public function test()
    {
        return view('backend.user.user_on_circle');
    }    
    
    public function test_json()
    {
        $user_id = \Auth::user()->id;
        $mine  = \Auth::user()->first_name ; 
        
        $videos = VideoSetting::leftJoin('users','videos_info.owner','=','users.id')
                    ->where('videos_info.reference' , '=' , $user_id)
                    ->select(['videos_info.id' , 'videos_info.reference' , 'users.first_name' , 'users.last_name'])
                    ->get();
                    
        $nodes = "";            
        foreach( $videos as $v )
        {
            $nodes[] .= "".$v->first_name  ."";
            $nodes_line[] =  array($mine  ,  $v->first_name  , array("color" => "#EB6841" )) ;
                        
        }            
        $data = array("mine"=>$mine , "nodes" => $nodes ,    "nodes_line" =>$nodes_line);
        return response($data);            
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function index()
    {	
        $user_id = \Auth::user()->id;
        $user = \Auth::user()->first_name;
        $u = UserOnCircle::leftJoin('users','vdo_user_circle.vdo_user_id','=','users.id')->get();
        $pic = \Auth::user()->profile_picture;
        
        foreach($u as $v)
        {
            $users[] = $v->first_name."#".$v->profile_picture; 
        }
        
        //dd($users);
        
        $total_row = 4;
	    $total_col = 4;
	    $center = $total_row/2;




        $t = 0 ;
        $table = '<table align="center" width="60%">';
        for($i=0;$i<=$total_row;$i++)
        {
            $table .= '<tr>';
	       for($j=0;$j<=$total_col;$j++)
		   {
			if(($i==$center && $j==$center)  ) {
			    //				$table .= "<td>".$i.",".$j. $user." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| </td>";
				$table .= "<td style='color:#ff0000;text-align:center;'>". $user."<br/><img  style='border-radius:50%;' class='img-circle' src='/assets/dist/img/profile/".  $pic ."'/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>";
			}else{
				if($i%2==0 && $j%2==0){
				    if(empty($users[$t])){
				        //$table .= "<td>".  $i.",".$j ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| </td>";
				        $table .= "<td>".  $i.",".$j ." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| </td>";
                    }else{				    
				        //$table .= "<td>".  $i.",".$j .$users[$t]." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| </td>";
				        $p = explode("#",$users[$t]);
				        
				        $table .= "<td style='text-align:center;'>".  $p[0].
				        "<br/><img style='border-radius:50%;'  class='img-circle' src='/assets/dist/img/profile/". $p[1] ."'/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>";
				    }
				    $t++;
				}else{
				     if($i==$center && $j==($center-1)){
				        $table .= "<td >------</td>";
				     }else if($i==$center && $j==($center+1)){
				        $table .= "<td >------</td>";
				     }
				}
			}
			
	    	}	
		    $table .= "</tr><tr><td colspan='5'>&nbsp;</td></tr>";
        }
        $table .= '<table>';
        
        
       // echo $t;
        echo "<br/>";
        echo $table; 
         
        
        //dd($users);
		//return view('backend.user.user_on_circle');				
    }     
	
}
