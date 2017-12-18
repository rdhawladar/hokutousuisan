<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\NewsFeed; 
use App\NewsPoll;
 
use DB; 
use Datatables;

class NewsController extends Controller
{     
    
    
    public function index()
    {	
        return view('backend.admin.news.news_entry');
    }    

	public function news_entry(Request $r)
	{		
	    $validator = \Validator::make($r->all(),[			
			'title' => 'required' ,
			'detail' => 'required' 
		]);
		
	    $title = trim($r->input("title"));  
	    $description = trim($r->input("detail"));
		
		if ($validator->fails()) {
            return redirect('/admin/news-entry/')
                        ->withErrors($validator)
                        ->withInput();
        } 
	    
	    
	    $c = NewsFeed::where('title','=',$title)->count();
	    if($c == 0) {
	        $n = new NewsFeed();
	        $n->title = $title;
	        $n->description = $description;
	        
	        $n->yes_vote = 0;
	        $n->no_vote = 0;
	        $n->created_at = date('Y-m-d H:i:s');
	        $n->updated_at = date('Y-m-d H:i:s');
	        $n->save();
	        $msg = 'News saved';
	    }else{
	        $msg = 'News Already Exist!';
	    }
	    
	    return redirect('/admin/news-entry/')->with('success',$msg);
	     
	}	
	 
	
	public function news_list()
    {	
        return view('backend.admin.news.news_list');
    }  
 
	public function news_list_data_table()
    {	
        $events = NewsFeed::orderBy('id','desc')->get();
        
        //dd($events);
        return Datatables::of($events)
		    ->editColumn('id', function($result){
			   return  '<a class="btn btn-xs btn-success" href="' .    url('/admin/news-edit/'.  $result->id )    .'">編集</a>&nbsp;'.
			            '<a class="btn btn-xs btn-danger" href="' .    url('/admin/news-delete/'.  $result->id )    .'">削除する</a>';;
			})
			->make(true);
    } 
    
    
    
    public function news_edit($id)
    {	
        $news = NewsFeed::find($id);
        return view('backend.admin.news.news_edit')
                ->with('news',$news)
                ->with('id',$id);
    }    

	public function news_edit_action(Request $r)
	{
	    $validator = \Validator::make($r->all(),[			
			'title' => 'required' ,
			'detail' => 'required' 
		]);
		
	    $id = trim($r->input("news_id")); 
	    $title = trim($r->input("title"));  
	    $description = trim($r->input("detail"));
		
		if ($validator->fails()) {
            return redirect('/admin/news-edit/'.$id )
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $nf = NewsFeed::where('id','=',$id)->first();
        $nf->title = $title;
        $nf->description = $description;
        $nf->updated_at = date('Y-m-d H:i:s');
        $nf->update();
        
        return redirect('/admin/news-edit/'.$id )
                ->with('success','News Updated!');
	}
	
	
    public function news_delete($id)
    {
        $n = NewsFeed::find($id);
        $n->delete();
        return redirect('/admin/news-list');
    }
	
	
}
