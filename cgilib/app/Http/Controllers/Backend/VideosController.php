<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ExplanationType; 
use App\VideoSetting;
use DB; 
use Datatables;

class VideosController extends Controller
{     
    
    
    public function index()
    {	
        $types = ExplanationType::where('video','=','yes')->where('ordering','!=',0)->orderBy('ordering','asc')->get();
        $users = User::all();
        return view('backend.admin.videos.video_entry')
                ->with('types',$types)
                ->with('users',$users);    
    }    

    
    public function video_entry(Request $r)
    {	
        //dd($r->all());
        $content_page  = trim($r->input("content_page"));
        $reference_id  = trim($r->input("reference"));
        $vdo_owner     = trim($r->input("vdo_owner"));
        $title         = trim($r->input("title"));
        $video_id      = trim($r->input("video_id"));
        
        $validator = \Validator::make($r->all(), [
            'content_page' => 'required',
            'reference'    => 'required',  
            'vdo_owner'    => 'required',  
            'title'        => 'required',  
            'video_id'     => 'required'               
        ]);

        if ($validator->fails()) {             
            return redirect()
                    ->action('Backend\VideosController@index')
                    ->withErrors($validator)
                    ->withInput();
        }
        
        
        $vc = VideoSetting::where('vdo_id' , '=' , $video_id)
                ->where('reference','=',$reference_id)
                ->where('owner','=',$vdo_owner)
                ->count();
        
        if($vc > 0 ) {
            return redirect()->action('Backend\VideosController@index')
				->with('success','Data Already Exist');
        }
        
            $v = new VideoSetting();
            $v->content_page = $content_page;
            $v->reference    = $reference_id;
            $v->owner        = $vdo_owner;
            $v->title        = $title;
            $v->vdo_id       = $video_id;
            $v->created_at   = date('Y-m-d H:i:s');
            $v->updated_at   = date('Y-m-d H:i:s');
            $v->save();   

        return redirect()->action('Backend\VideosController@index')
				->with('success','Data saved successfuly');
    }
    
    
    public function videos_owners_list(Request $r)
    {
        $reference_id  = trim($r->input("reference"));
        $users = User::where('id','!=',$reference_id)->select(['id','first_name','last_name'])->get();
         
        $html = '';
        foreach($users as $u) {
            $html .= '<option value="'. $u->id .'">'. $u->first_name.' '.$u->last_name .'</option>';
        }
        echo $html;
    }
    
    public function videos_list()
    {
        return view("backend.admin.videos.videos_list");
    }
    
    public function videos_list_data_table()
    {
        $videos = VideoSetting::leftJoin('users','users.id','=','videos_info.reference')  
                ->leftJoin('types_of_explanation','types_of_explanation.sname','=','videos_info.content_page')
                ->select(['videos_info.id','videos_info.title','videos_info.content_page','videos_info.reference','videos_info.owner','videos_info.vdo_id','types_of_explanation.name'])
                ->where('videos_info.id','!=',88)
        ->where('videos_info.id','!=',89)
                ->orderBy('videos_info.id','desc')
                ->get();
    
    
       // dd($videos);
        
        return Datatables::of($videos)
            ->editColumn('reference', function($result){
                $uuu = User::where('id' , '=' , $result->reference )->first();
			   return  $uuu['first_name'] .' '. $uuu['last_name'];
			})
            ->editColumn('owner', function($result) {
               $uu = User::where('id' , '=' , $result->owner )->first();
			   return  $uu['first_name'] .' '. $uu['last_name'];
			})
            ->editColumn('vdo_id', function($result){
                //if($result->content_page == 'mobile_application')
                  //  return  '<a target="_blank" href="'. url('/assets/dist/mobile_app_vdo/'. $result->vdo_id ) .'">' .  url('/assets/dist/mobile_app_vdo/'. $result->vdo_id ) . '</a>';
                //else
			        return '<a target="_blank" href="https://vimeo.com/'.  $result->vdo_id  .'">https://vimeo.com/' .$result->vdo_id  .'</a>';
			})
			->addColumn('action' , function($result){
			    return '<a href="'. url('/admin/video-edit/'. $result->id )  .'" class="btn btn-xs btn-info">編集</a>&nbsp;' .
			           '<a href="'. url('/admin/video-delete/'. $result->id )  .'" class="btn btn-xs btn-danger">削除する</a>';   

			})
			->make(true);
    }
    
    
    
    public function video_edit($id)
    {
        $v = VideoSetting::find($id);
        $types = ExplanationType::where('video','=','yes')->get();
        $users = User::all();
        return view('backend.admin.videos.video_edit')
                ->with('id',$id)
                ->with('v',$v)
                ->with('types',$types)
                ->with('users',$users);
    }
    
    
    public function video_edit_action(Request $r)
    {
        $id = trim($r->input("id"));
        $content_page = trim($r->input("content_page"));
        $reference = trim($r->input("reference"));
        $vdo_owner = trim($r->input("vdo_owner"));
        $title = trim($r->input("title"));
        $video_id = trim($r->input("video_id"));
        
        $validator = \Validator::make($r->all(), [
            'content_page' => 'required',
            'reference'    => 'required',  
            'vdo_owner'    => 'required',  
            'title'        => 'required',  
            'video_id'     => 'required'               
        ]);

        if ($validator->fails()) {             
            return redirect('/admin/video-edit/'. $id  )->withErrors($validator)->withInput();
        }
        
        $v =  VideoSetting::find($id);
        $v->content_page = $content_page;
        $v->title        = $title;
        $v->vdo_id       = $video_id;
        $v->updated_at   = date('Y-m-d H:i:s');
        $v->update();   
        
        return redirect('/admin/video-edit/'. $id  )->with('success','Data updated successfully');
    }    
    
    
    
    
    public function videos_delete_action($id)
    {
        $v = VideoSetting::find($id);
        $v->delete();
        return redirect('/admin/video-list'); 
    }
    
    public function mobile_app_videos_entry()
    {
        $types = ExplanationType::where('video','=','yes')->where('sname','=','mobile_application')->get();
        $users = User::all();
        return view('backend.admin.videos.mobile_app_video_entry')
                ->with('types',$types)
                ->with('users',$users); 
    }
    
    public function mobile_app_videos_entry_action(Request $r)
    {
        $content_page = trim($r->input("content_page"));
        $reference    =  trim($r->input("reference"));
        $owner        =  trim($r->input("vdo_owner"));
        $title        =  trim($r->input("title"));
        $file_name = $_FILES['vdo_file']['name'];
        $vdoFile = date('YmdHis').'_'.$file_name;
        
        
        if(move_uploaded_file($_FILES["vdo_file"]["tmp_name"], "assets/dist/mobile_app_vdo/". $vdoFile)) {
            //dd($r->all());            
            //echo $content_page."   ".$title."    ".$reference."   ".$owner."    ".$vdoFile;
            
            $vv = new VideoSetting;
            $vv->content_page = $content_page;
            $vv->reference    = $reference;
            $vv->owner        = $owner;
            $vv->title        = $title;
            $vv->vdo_id       = $vdoFile;
            $vv->created_at   = date('Y-m-d H:i:s');
            $vv->updated_at   = date('Y-m-d H:i:s');
            $vv->save();  
            
            
            
           //DB::insert();
            
            
            
        }
        //=====  v2/assets/dist/mobile_app_vdo/  ====
        return redirect()->action('Backend\VideosController@mobile_app_videos_entry')
				->with('success','Data saved successfuly');
    }
    
	
}
