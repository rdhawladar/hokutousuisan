<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ExplanationType; 
use App\VideoSetting;
use App\AudioSetting;
use DB; 
use Datatables;


class AudiosController extends Controller
{     
    
    public function index()
    {	
        $types = ExplanationType::where('audio','=','yes')->get();
        $users = User::all();
        return view('backend.admin.audios.audio_entry')
                ->with('types',$types)
                ->with('users',$users);    
    }    

    
    public function audios_entry(Request $r)
    {	
        //dd($r->all());
        $content_page  = trim($r->input("content_page"));
        $audio_owner  = trim($r->input("audio_owner"));
        $audio_title     = trim($r->input("audio_title"));
        $audio_url     = $_FILES["audio_url"]["name"];
        
        
        //trim($r->input("audio_url"));
       
        
        $validator = \Validator::make($r->all(), [
            'content_page' => 'required',
            'audio_owner'    => 'required',  
            'audio_title'    => 'required',  
            'audio_url'    => 'required',                
        ]);

        if ($validator->fails()) {             
            return redirect()
                    ->action('Backend\AudiosController@index')
                    ->withErrors($validator)
                    ->withInput();
        }
        
        
        $vc = AudioSetting::where('audio_url' , '=' , $audio_url)->where('content_page' , '=' , $content_page)                 
                ->count();
        
        if($vc > 0 ) {
            return redirect()->action('Backend\AudiosController@index')
				->with('success','Data Already Exist');
        }
        
        $audio_file =  date('YmdHis') ."_". $audio_url;
        if(move_uploaded_file($_FILES["audio_url"]["tmp_name"] , "assets/dist/audio_files/".$audio_file  )) {
            $v = new AudioSetting();            
            $v->content_page        = $content_page;
            $v->user_id        = $audio_owner;
            $v->title        = $audio_title;
            $v->audio_url       = url('/assets/dist/audio_files/')."/".$audio_file;
            $v->created_at   = date('Y-m-d H:i:s');
            $v->updated_at   = date('Y-m-d H:i:s');
            $v->save();   
        }    

        return redirect()->action('Backend\AudiosController@index')
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
	
    
    public function audios_list()
    {
        return view("backend.admin.audios.audio_list");
    }
    
    public function audios_list_data_table()
    {
        $audios = AudioSetting::leftJoin('users','users.id','=','audios_info.user_id')  
                ->leftJoin('types_of_explanation','types_of_explanation.sname','=','audios_info.content_page')
                ->select(['audios_info.id','audios_info.title','audios_info.audio_url','users.first_name','users.last_name','types_of_explanation.name'])
                ->orderBy('audios_info.id','desc')
                ->get();
      
        return Datatables::of($audios)
            ->editColumn('id', function($result){
			   return  $result->first_name.' '.$result->last_name;
			})
            ->editColumn('audio_url', function($result){
			   return '<audio controls="true"><source src="'. $result->audio_url .'"></audio>';
			})
			->addColumn('action', function($result){
			    //return '<a class="btn btn-xs btn-primary" href="'. url('/admin/audio-edit/'. $result->id ) . "'>Edit</a>";
			   // return   '<a class="btn btn-xs btn-info" href="'. url('/admin/audio-edit/'. $result->id ) .'">編集</a>&nbsp;'.
			     return        '<a class="btn btn-xs btn-danger" href="'. url('/admin/audio-delete/'. $result->id ) .'">削除する</a>';
			})    
			->make(true);
    }
    
    
    public function audio_edit($id)
    {
        $types = ExplanationType::where('sname','!=','crazy_mindset')->where('audio','=','yes')->get();
        $users = User::all();
        $a = AudioSetting::find($id);
        
        return view('backend.admin.audios.audio_edit')
                ->with('id',$id)
                ->with('a',$a)
                ->with('types',$types)
                ->with('users',$users);   
    }
    
    public function audio_edit_action(Request $r)
    {
        
        $id = trim($r->input("id"));
        $content_page  = trim($r->input("content_page"));
        $audio_owner  = trim($r->input("audio_owner"));
        $audio_title     = trim($r->input("audio_title"));
        $audio_url     = $_FILES["audio_url"]["name"];
       
        $validator = \Validator::make($r->all(), [
            'content_page' => 'required',
            'audio_owner'    => 'required',  
            'audio_title'    => 'required',  
            'audio_url'    => 'required',                
        ]);

        if ($validator->fails()) {             
            return redirect('/admin/audio-edit/'.  $id )
                    ->withErrors($validator)
                    ->withInput();
        }
        
        $audio_file =  date('YmdHis') ."_". $audio_url;
        if(move_uploaded_file($_FILES["audio_url"]["tmp_name"] , "assets/dist/audio_files/".$audio_file  )) {
            $v = AudioSetting::find($id);            
            $v->content_page        = $content_page;
            $v->title        = $audio_title;
            $v->audio_url       = url('/assets/dist/audio_files/')."/".$audio_file;
            $v->updated_at   = date('Y-m-d H:i:s');
            $v->save();   
        }   
        
        return redirect('/admin/audio-edit/'.  $id )->with('success','Data updated successfully');
    }
    
    
    public function delete_audio($id)
    {
        $a = AudioSetting::find($id);
        $a->delete();
        return redirect('/admin/audios-list');
    }
    
	
}
