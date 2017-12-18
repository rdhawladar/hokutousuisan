<?php
namespace App\Http\Controllers\Ecm;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SliderImage;
use App\Product;
use App\Catagory;
use Datatables; 
 
 
class ProductController extends Controller
{     
 
	
    public function index()
    {	
        $catagory = Catagory::orderBy('id','asc')->get();
		return view('ecm_admin.product.product_entry')
				->with('catagory',$catagory);
    }     	 
	
	public function product_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[	
			'catagory_id' => 'required' ,		
			'product_title' => 'required' ,		
			'price' => 'required|numeric' ,		
			'quantity' => 'required|numeric' ,		
			'product_description' => 'required',
			'product_thumbnail_url' => 'required|file'
		]);
		
		if ($validator->fails()) {
            return redirect()->action('Ecm\ProductController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
    
   
        $product_thumbnail_file = date('YmdHis')."_".$_FILES["product_thumbnail_url"]["name"];


	        if(move_uploaded_file($_FILES["product_thumbnail_url"]["tmp_name"] , "ecm/product_img/". $product_thumbnail_file ))
	        {
	        	//echo $product_file."<br>".$product_thumbnail_file;
	    		$t = new product();
	    		$t->catagory_id	= trim($r->input("catagory_id")); 
	    		$t->product_title      	= trim($r->input("product_title")); 
	    		$t->price      	= trim($r->input("price")); 
	    		$t->quantity      	= trim($r->input("quantity")); 
	    		$t->product_description	= trim($r->input("product_description")); 
	        	$t->product_thumbnail_url  = $product_thumbnail_file;  
	    		$t->created_at =  date('Y-m-d H:i:s');
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->save();
	        }
		
		return redirect()->action('Ecm\ProductController@index')->with('success','追加されました');  		 	
	}
	
	
	public function product_list()
    {	
        return view('ecm_admin.product.product_list');  
    }
	
	public function product_list_data_table()
	{	
		$topics = Product::orderBy('catagory_id','asc')
					->whereNotIn('parent_type', ['cat'])
					->WhereNotIn('parent_type', ['main'])
					-> get();
		//dd($topics);
		return Datatables::of($topics)
	  //       ->editColumn('product_title', function ($result) {
			//    return  $result->product_title;
			// })		

			->editColumn('product_banner_url', function ($result) {
			   return  "<img style='width:100%;max-width:600px;' src='".  url("/ecm/product_img/". $result->product_banner_url ) . "' />";
			})	

			->editColumn('product_thumbnail_url', function ($result) {
			   return  "<img style='width:100%;max-width:600px;' src='".  url("/ecm/product_img/". $result->product_thumbnail_url ) . "' />";
			})	

			->editColumn('action', function ($result) {
			  return "<a class='btn btn-xs btn-success' href='". url('/admin/product-edit/'. $result->id .'') ."'>変更</a>&nbsp;".
			   			    "<a class='btn btn-xs btn-danger' href='". url('/admin/product-delete/'. $result->id .'') ."'>削除</a>";
			})	
			->make(true);
	}
	
	
	
	public function product_delete($id)
	{
	    $c = Product::find($id);
	    $c->delete();
	    return redirect('/admin/product-list');
	}
	

	public function product_edit($id)
	{
	    
		$product = Product::find($id);
		$catagory = Catagory::orderBy('id','asc')->get();
		return view('ecm_admin.product.product_edit')
				->with('id',$id) 
				->with('product',$product)
				->with('catagory',$catagory);
	}
	
	public function product_edit_action(Request $r)
	{
		$id = trim($r->input("id"));
		
		$validator = \Validator::make($r->all(),[	
			'price' => 'required|numeric' ,		
			'quantity' => 'required|numeric' ,		
			'product_description' => 'required',
			'product_title' => 'required' 
		]);
		
		if ($validator->fails()) {
            return redirect('/admin/product-edit/'. $id ) 
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $g = $_FILES["product_thumbnail_url"]["name"];
        
        $old_product_thumbnail_file = trim($r->input("old_product_thumbnail_url"));
 

        if( $g == "") {
            $product_thumbnail_file = $old_product_thumbnail_file ;
        }else{
            $product_thumbnail_file = date('YmdHis')."_".$g;
        }
        
	        if(move_uploaded_file($_FILES["product_thumbnail_url"]["tmp_name"] , "ecm/product_img/". $product_thumbnail_file )){}
	    		$t = Product::find($id);
	    		$t->catagory_id      = trim($r->input("catagory_id"));
	    		$t->product_title      = trim($r->input("product_title"));
	    		$t->price      = trim($r->input("price"));
	    		$t->quantity      = trim($r->input("quantity"));
	    		$t->product_description      = trim($r->input("product_description"));
	    		$t->product_thumbnail_url  = $product_thumbnail_file;
	    		$t->updated_at =  date('Y-m-d H:i:s');
	    		$t->update();
	    	
        
		
		return redirect('/admin/product-edit/'.$id)->with('success','Product ID:'.$id.' 更新されました。');  
	}
	

	
}
