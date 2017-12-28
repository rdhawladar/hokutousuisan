<?php

namespace App\Http\Controllers\Ecm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
//use Yajra\Datatables\Datatables;
use Datatables; 
use App\User;
use Anam\Phpcart\Cart; 
use App\Product; 
use DB;
use App\Menu; 
use App\Member; 
use App\Logo;
use App\Catagory;
use App\Otherpage;
use App\Footer;
use App\Pro_order;
use App\Order_list;
use App\Prefectures;
use App\Order_date_range;
use Session;
use Mail;



class ShopManagerController extends Controller
{



    public  function mycart()
	{
		$cart = new Cart();		
		$carts  = $cart->getItems();
		$item_count = count($carts);
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();
        $otherpage = Otherpage::orderBy('id','asc')->get();
        	//dd($this->cart_cal());
		return view('ecm.cart.index')
				->with('carts',$carts)
	            ->with('menu', $menu)
	            ->with('logo', $logo)
	            ->with('footer', $footer)
	            ->with('total', $test = $this->cart_cal())
	            ->with('catagory', $catagory)
	            ->with('otherpage', $otherpage)
	            ->with('item_count', $item_count)
	            ->with('product', $product);				
	}	
	
	public function update_cart(Request $r)
	{
		$id = trim($r->input("id"));
		$qty = trim($r->input("qty"));

	    if(!empty($id) && $qty>0){
			$cart = new Cart();
			$cart->update([
				'id'       => $id ,
				'quantity' => $qty
			]);
		return redirect('/my-cart')->with('success','更新されました。');
		} 	

		else return redirect('/my-cart')->with('fail','数量は”1”より大きくしてください。');
		
	}
	
	public function remove_cart($id)
	{
		$cart = new Cart();		
		$carts  = $cart->getItems();

	    if(!empty($id) ){
			$cart->remove($id);
		} 	
		return redirect('/my-cart')->with('success','Product ID: '.$id.' 商品が削除されました');
	}

	
	public function checkout($step, Request $r)
	{
		$session_id = Session::getId();
		$cart 		= new Cart();		
		$carts  	= $cart->getItems();
        $menu 		= Menu::orderBy('id','asc')->get();
        $logo 		= Logo::orderBy('id','asc')->get();
        $catagory 	= Catagory::orderBy('id','asc')->get();
        $product 	= Product::orderBy('id','asc')->get();
        $footer 	= Footer::orderBy('id','asc')->get();
        $otherpage 	= Otherpage::orderBy('id','asc')->get();
        $prefectures= Prefectures::orderBy('id','asc')->get();
        $order_date_range= Order_date_range::where('id', 1)->first();
        

		$total 			= $this->cart_cal();
        $municipality 	= trim($r->input("municipality")); 
        $payment_method = trim($r->input("payment_method")); 
        $delivery_cost 	= trim($r->input("delivery_cost"));
		$order_date = trim($r->input("order_date"));
		$order_time = trim($r->input("order_time"));        

        
        if ($step==1) 
        	{ 
        		if (!Auth::check()) 
        			$checkout = "checkout1"; 
        		else $checkout = "my-cart"; 
        	}

        else if ($step==2) 
        	{ 
        		if (!Auth::check()) 
        			$checkout = "checkout2"; 
        		else $checkout = "my-cart";
        	}

        else if ($step==3) 
        	{ 
        		$total = $this->cart_cal();

        		$session_check = Pro_order::where('session',Session::getId()) ->count();
        		if ($session_check>0) {
        			Pro_order::where('session',Session::getId()) -> delete();
        		}
        		if (!Auth::check() & !empty($municipality)) {
	        		$order_id = DB::table('pro_order')->MAX('order_id') +1; 
					$t = new Pro_order();
					$t->order_id      	= $order_id; 
					$t->session      	= Session::getId();
					$t->sname1      	= trim($r->input("sname1")); 
					$t->sname2      	= trim($r->input("sname2")); 
					$t->fname1      	= trim($r->input("fname1")); 
					$t->fname2      	= trim($r->input("fname2")); 
					$t->email			= trim($r->input("email")); 
					$t->zip_code1		= trim($r->input("zip_code1")); 
					$t->zip_code2		= trim($r->input("zip_code2")); 
					$t->prefecture		= trim($r->input("prefecture")); 
					$t->municipality	= trim($r->input("municipality")); 
					$t->address			= trim($r->input("address")); 
					$t->mobile			= trim($r->input("mobile")); 
					$t->price			= $total['tprice'];
					$t->quantity			= $total['tquantity'];
					$t->step			= $step;
					$t->created_at 		=  date('Y-m-d H:i:s');
					$t->updated_at 		=  date('Y-m-d H:i:s');
					$t->save();     
	        		$checkout = "checkout3"; 
        		}
        		else if (Auth::check() ){

        			$m = Member::where('id',Auth::user()->id) ->first();
        			$order_id = DB::table('pro_order')->MAX('order_id') +1; 

					$t = new Pro_order();

					$t->order_id      	= $order_id; 
					$t->member_id      	= Auth::user()->id; 
					$t->session      	= Session::getId();
					$t->sname1      	= $m['sname1'];
					$t->sname2      	= $m['sname2'];
					$t->fname1      	= $m['fname1'];
					$t->fname2      	= $m['fname2'];
					$t->email			= $m['email'];
					$t->zip_code1		= $m['zip_code1'];
					$t->zip_code2		= $m['zip_code2'];
					$t->prefecture		= $m['prefecture'];
					$t->municipality	= $m['municipality'];
					$t->address			= $m['address'];
					$t->mobile			= $m['mobile'];
					$t->price			= $total['tprice']; 
					$t->quantity			= $total['tquantity']; 
					$t->step			= $step;
					$t->created_at 		=  date('Y-m-d H:i:s');
					$t->updated_at 		=  date('Y-m-d H:i:s');
					$t->save();     
	        		$checkout = "checkout3"; 

        		}

        		else $checkout = "checkout1";

        	}

        else if ($step==4) 
	        {              	
				$t = Pro_order::where('session',Session::getId())->first();
    			$t->order_date  = 	trim($r->input("order_date")); 
    			$t->order_time 	=	trim($r->input("order_time")); 
    			$t->zip_code1 	=	trim($r->input("zip_code1")); 
    			$t->zip_code2 	=	trim($r->input("zip_code2")); 
    			$t->prefecture 	=	trim($r->input("prefecture")); 
    			$t->municipality=	trim($r->input("municipality")); 
    			$t->address 	=	trim($r->input("address")); 
    			$t->step 		= $step;
				$t->update(); 
				$checkout = "checkout4";
	        }

        else if ($step==5) 
	   
       {

	        	if(!empty($payment_method)){
		        	$payment_method = trim($r->input("payment_method")); 
					$total = $this->cart_cal();		        	
		        	
		        	if($payment_method == 2 || $payment_method == 3)
		        		$delivery_cost = 0;		

		        	else{
		        		if($total['tprice']<10000)
		        			 $delivery_cost = 324;
		        		else if($total['tprice']<30000)
		        			 $delivery_cost = 432;
		        		else if($total['tprice']<100000)
		        			 $delivery_cost = 642;
		        		else $delivery_cost = 0; 
		        	}	        	
		        	
		        	$t = Pro_order::where('session',Session::getId())->first();
		        

				    if($t['prefecture'] == 1)
				    	$shipping_cost = 1000;
				    else if($t['prefecture'] == 48 || $t['prefecture'] == 49)
				    	$shipping_cost = 2800;
				    else
				    	$shipping_cost = 1180;


	    			$t->payment_method  = $payment_method;
	    			$t->delivery_cost   = $delivery_cost;
	    			$t->shipping_cost   = $shipping_cost;
	    			$t->step			= $step;
					$t->update();


		        	$checkout = "checkout5";
		        }
		        else $checkout = "checkout4"; 
	        }

        else if ($step==6) 
        	{ 
							//$cart->clear();
        					//Session::destroy($sessionId);
        		$checkout = "checkout6"; 
        	}

        else $checkout = "index";
		$pro_order = Pro_order::orderBy('id','asc')->get();
        if(count($carts)>=1)
			return view('ecm.cart.'.$checkout)
					->with('carts',$carts)
		            ->with('menu', $menu)
		            ->with('logo', $logo)
		            ->with('footer', $footer)
		            ->with('total', $total)
		            ->with('catagory', $catagory)
		            ->with('otherpage', $otherpage)
		            ->with('prefectures', $prefectures)
		            ->with('delivery_cost', $delivery_cost)
		            ->with('pro_order', $pro_order)
		            ->with('product', $product)
		            ->with('prefectures', $prefectures)
		            ->with('order_date_range', $order_date_range)
		            ->with('session', $session_id);
		else return redirect('/my-cart')->with('fail','チェックアウトする商品を選択してください。');
	}


	public function address_change(){
		redirect ('');
	}



	public function addToCart($id, $cat_id)
	 {
	  $product  = Product::find($id); 
	  //$url = \Request::getRequestUri();
	  //dd($url);

	  if(!empty($product)) {
	   $cart =  new Cart();
	   $cart->add([
	    'id'       => $id,
	    'name'     => $product->product_title ,
	    'quantity' => 1,
	    'price'    => $product->price
	   ]);
	  }

	  if($cat_id != 'x')
	  	return redirect('/catagory/'.$cat_id)->with('success', '商品がカートに追加されました。');
	  else 
	  	return redirect('/pro-details/'.$id)->with('success', 'チェックアウトする商品を選択してください。');
	 }


	public function user_order_entry()
	{


//$payment_method == 3
		// $payment_method = trim($r->input("payment_method"));
		// $delivery_cost = trim($r->input("delivery_cost"));
		// $shipping_cost = trim($r->input("shipping_cost"));
		$cart 	= new Cart();		
		$carts  = $cart->getItems();
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();
        $otherpage = Otherpage::orderBy('id','asc')->get();

/*		$validator = \Validator::make($r->all(),[	
			'name' => 'required' ,		
			'email' => 'required|email',
			'address' => 'required',
			'mobile' => 'required|numeric'
		]);

		
		if ($validator->fails()) {
            return redirect('/checkout/5')
                        ->withErrors($validator)
                        ->withInput();
        } */
		
		$pro_order = Pro_order::where('session',Session::getId())->first();
		$order_id = $pro_order['order_id'];
		$user_mail = $pro_order['email'];
		foreach($carts as $row) {
		 	foreach($product as $pro)
      			if($pro->id == $row->id) {

					$t = new order_list();
					$t->order_id    = $order_id; 
					$t->product_id	= $row->id; 

					$sum_price = $row->price * $row->quantity;

					$t->price	= $sum_price;
					$t->quantity	= $row->quantity; 
					$t->created_at =  date('Y-m-d H:i:s');
					$t->updated_at =  date('Y-m-d H:i:s');
					$t->save();
      			}
      		}




				$id = $t->id;
				$sender = 'support@hokutousuisan.com';

				$pro_order->step  = '6'; 
				$pro_order->update(); 



				$this->user_mail_product_confirmation($order_id, $user_mail,$sender, $pro_order['shipping_cost'],  $pro_order['delivery_cost']);
				$this->support_mail_product_confirmation($order_id, $sender, $sender ,  $pro_order['shipping_cost'],  $pro_order['delivery_cost']);		
				

				if($id){
					$cart->clear();
					Session::regenerate();
					//destroy(Session::getId());
				}

				return view('ecm.cart.checkout7')
				->with('carts',$carts)
	            ->with('menu', $menu)
	            ->with('logo', $logo)
	            ->with('footer', $footer)
	            ->with('total', $test = $this->cart_cal())
	            ->with('catagory', $catagory)
	            ->with('order_id', $order_id)
	            ->with('otherpage', $otherpage)
	            ->with('product', $product);
	}
	
	public function order_list($id)
    {	
        return view('ecm_admin.pro_order.order_list')->with('id', $id);
    }

/*    public function getMaster()
	{
	    return view('datatables.eloquent.master');
	}*/

	public function getMasterData($id)
	{
	    $orders = Pro_order::select('pro_order.prefecture', 'pro_order.order_id', 'prefectures.id', 'pro_order.email', 'pro_order.mobile', 'pro_order.address', 'prefectures.name', 'pro_order.municipality', 'pro_order.status', 'pro_order.zip_code2', 'pro_order.zip_code1', 'pro_order.sname1', 'pro_order.sname2', 'pro_order.payment_method' , 'pro_order.order_time', 'pro_order.order_date', 'pro_order.created_at', 'pro_order.price', 'pro_order.quantity')
	    			->where('status',$id)
	    			->leftjoin('prefectures', 'pro_order.prefecture', '=' , 'prefectures.id')
	    			->orderBy('order_id', 'desc');


	    return Datatables::of($orders)
	        ->addColumn('details_url', function($orders) {
	            return url('admin/details-data/'.$orders->order_id);
	        })

			->editColumn('sname1', function ($result) {
				return "$result->sname1 $result->sname2";
				})	
			->editColumn('address', function ($result) {
				return "$result->zip_code1 $result->zip_code2, $result->name, $result->municipality,  $result->address";
				})	

			->editColumn('payment_method', function ($result) {
				$payment_method = $result->payment_method;
				if($payment_method == 1)
					$method = "代引き";
				else if($payment_method == 2)
					$method = "銀行振込";
				else if($payment_method == 3)
					$method = "カード";
				else $method = "not specified"; 

				return "<span style= 'color: orange;'; > $method </span>";
				})	

			->editColumn('action', function ($result) {
				if ($result->status == 0) 
				  return "<a class='btn btn-xs btn-success' href='". url('/admin/order-deliver-all/'. $result->order_id .'') ."'>配信</a>&nbsp;".
				   			    "<a class='btn btn-xs btn-danger' href='". url('/admin/order-delete-all/'. $result->order_id .'') ."'>削除</a>";
				else 
					return "<button class='btn btn-xs btn-success' disabled > 配信 </button>";
				})	
	        ->make(true);
	}

	public function getDetailsData($id)
	{
       $posts = Order_list::select(['pro_order.id as order_detail_id', 'order_list.id', 'pro_order.order_id',  'pro_order.sname1', 'pro_order.mobile', 'pro_order.email', 'pro_order.address',  'pro_order.prefecture' ,'prefectures.name as prefecture_name' ,'pro_order.municipality' , 'pro_order.zip_code1' , 'pro_order.zip_code2' ,  'pro_order.order_date',  'pro_order.order_time',  'pro_order.created_at','order_list.quantity','order_list.status', 'order_list.price', 'pro_order.payment_method', 'product.product_title' ])
		->leftjoin('pro_order', 'order_list.order_id', '=', 'pro_order.order_id')
		->leftjoin('product', 'order_list.product_id', '=' , 'product.id')
		->leftjoin('prefectures', 'pro_order.prefecture', '=' , 'prefectures.id')
					->orderBy('order_list.id','created_at')
					->where('order_list.order_id','=', $id)
					->where('pro_order.step','>=', '6')
					->get();

	    return Datatables::of($posts)
			->editColumn('action', function ($result) {
				if ($result->status == 0) 
				  return "<a class='btn btn-xs btn-success' href='". url('/admin/order-deliver/'. $result->id .'') ."'>配信</a>&nbsp;".
				   			    "<a class='btn btn-xs btn-danger' href='". url('/admin/order-delete/'. $result->id .'') ."'>削除</a>";
				else 
					return "<button class='btn btn-xs btn-success' disabled > 配信 </button>";
				})	
	    ->make(true);
	}

	public function order_list_data_table($id)
	{	
       $orders = Order_list::select(['pro_order.id as order_detail_id', 'order_list.id', 'pro_order.order_id',  'pro_order.sname1', 'pro_order.mobile', 'pro_order.email', 'pro_order.address',  'pro_order.prefecture' ,'prefectures.name as prefecture_name','prefectures.id as preid' ,'pro_order.municipality' , 'pro_order.zip_code1' , 'pro_order.zip_code2' ,  'pro_order.order_date',  'pro_order.order_time',  'pro_order.created_at','order_list.quantity','order_list.status', 'order_list.price', 'pro_order.payment_method', 'product.product_title' ])
		->leftjoin('pro_order', 'order_list.order_id', '=', 'pro_order.order_id')
		->leftjoin('product', 'order_list.product_id', '=' , 'product.id')
		->leftjoin('prefectures', 'pro_order.prefecture', '=' , 'prefectures.id')
					->orderBy('order_list.id','created_at')
					->where('order_list.status','=',$id)
					->where('pro_order.step','>=', '6')
					->where('pro_order.prefecture', '=', 'preid')
					->first();
			//		dd($orders);

		//dd($orders);
		$order_list = Order_list::orderBy('id','created_at')->get();

		return Datatables::of($orders)
        ->addColumn('details_url', function($result) {
            return url('admin/order_list_data_table/' . $result->id);

        })

			->editColumn('order_id', function ($result) {

				return "$result->order_id";
				})	

			->editColumn('address', function ($result) {

				return "$result->zip_code1 $result->zip_code2 , $result->preid, $result->municipality, $result->address";
				})	
			->editColumn('payment_method', function ($result) {
				$payment_method = $result->payment_method;
				if($payment_method == 1)
					$method = "代引き";
				else if($payment_method == 2)
					$method = "銀行振込";
				else if($payment_method == 3)
					$method = "カード";
				else $method = "not specified"; 

				return "<span style= 'color: orange;'; > $method </span>";
				})	

			->editColumn('action', function ($result) {
				if ($result->status == 0) 
				  return "<a class='btn btn-xs btn-success' href='". url('/admin/order-deliver/'. $result->id .'') ."'>配信</a>&nbsp;".
				   			    "<a class='btn btn-xs btn-danger' href='". url('/admin/order-delete/'. $result->id .'') ."'>削除</a>";
				else 
					return "<button class='btn btn-xs btn-success' disabled > 配信 </button>";
				})	

			->make(true);
	}


	public function order_delete_all($id)
	{
	    $c = Order_list::where('order_id', $id);
	    $c->delete();

	    $c = Pro_order::where('order_id', $id);
	    $c->delete();


	    return redirect('/admin/order-list/0')->with('success',' 商品がリジェクトされました');
	}


	public function order_delete($id)
	{
	    $c = Order_list::where('id', $id);
	    $c->delete();
	    return redirect('/admin/order-list/0')->with('success','ID-'.$id.' 商品がリジェクトされました');
	}


	public function order_delivered_all($id)
	{

    		$t = Order_list::where('order_id', $id)->update(['status' => '1', 'updated_at' => date('Y-m-d H:i:s')]);

    		$p = Pro_order::where('order_id', $id)->first();
    		$p->status = 1;   	
    		$p->updated_at =  date('Y-m-d H:i:s');
    		$p->update();        

		return redirect('/admin/order-list/0')->with('success','ID-'.$id.' 配信されました');
	}

	public function order_delivered($id)
	{

    		$t = Order_list::where('id', $id)->first();
    		$t->status = 1;   	
    		$t->updated_at =  date('Y-m-d H:i:s');
    		$t->update();       

    		$order_id = $t['order_id']; 
    		$count_number = Order_list::where('order_id', $order_id)->where('status', 0)->count();
    		if($count_number == 0){
    			$p = pro_order::where('order_id', $order_id)->first();
	    		$p->status = 1;   	
	    		$p->updated_at =  date('Y-m-d H:i:s');
	    		$p->update();  
    		}
    		

		return redirect('/admin/order-list/0')->with('success','ID-'.$id.' 配信されました');
	}

    public function cart_cal(){
        $cart = new Cart();     
        $carts  = $cart->getItems();
        $tprice = 0;
        $tquantity = 0;
        foreach ($carts as $key => $value) {
            $tprice += ($value->price*$value->quantity);
            $tquantity += $value->quantity;
        }
        return $arrayName = array('tprice' => $tprice, 'tquantity' => $tquantity);
    } 

    // -------------------------------PAYMENT GATEWAY CONTROL ----------------------------//

	 public function payment_index()
	 {
	  	return view('ecm.payment.index');
	 }  
	 
	 public function payment_process_card(Request $r)
	{

		$cart = new Cart();		
		$carts  = $cart->getItems();
		$item_count = count($carts);
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();
        $otherpage = Otherpage::orderBy('id','asc')->get();

		$order_id = trim($r->input('order_id'));
		$orders = Order_list::where('id', $order_id)->get();
		$pro_order = Pro_order::where('order_id', $order_id) ->first();

		  $access_token = 'sq0atp-1Xwkv1Jbhl7WlA86iUk1eA';//'REPLACE_ME';
		  $nonce     = trim($r->input('nonce'));
		  
		  if(is_null($nonce)) 
		  {
		    echo "Invalid card data";
		    http_response_code(422);
		    return;
		  }
		  


  # This file simply serves the link that merchants click to authorize your application.
  # When authorization completes, a notification is sent to your redirect URL, which should
  # be handled in callback.php.

		  //api configuration
		  \SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
		  $locations_api = new \SquareConnect\Api\LocationsApi();
		  $customer_api = new \SquareConnect\Api\CustomersApi();
		  $transaction_api = new \SquareConnect\Api\TransactionsApi();

		  try 
		  {
		   $locations = $locations_api->listLocations();
		   $location  = current(array_filter($locations->getLocations() , function($location) 
		   {
		    $capabilities = $location->getCapabilities();
		    return is_array($capabilities) && in_array('CREDIT_CARD_PROCESSING', $capabilities);
		   }));
		  } 
		  catch (\SquareConnect\ApiException $e) 
		  {

		  	return redirect('/order-entry');

			//return redirect('/my-cart')->with('fail','エラー発生しました。  <br> 取引手続きは処理できません。 ご利用のカードを確認してください。');

		   echo "Caught exception!<br/>";
		   print_r("<strong>Response body:</strong><br/>");
		   echo "<pre>"; 
		   var_dump($e->getResponseBody()); 
		   echo "</pre>";
		   echo "<br/><strong>Response headers:</strong><br/>";
		   echo "<pre>"; 
		   var_dump($e->getResponseHeaders()); 
		   echo "</pre>";
		   exit(1);
		  }
		  
		    
		  $transactions_api = new \SquareConnect\Api\TransactionsApi();
		   $request_body = array(
		       "card_nonce"  => $nonce,
		       "amount_money"  => array(
		       "amount"  => $pro_order['price'],
		       "currency"  => "JPY"
		       ) ,
		       "idempotency_key" => uniqid()
		      );
		      
		  try 
		  {


		$customer_api->createCustomer(array(
		  'given_name' => $pro_order['sname1'],
		  'family_name' => $pro_order['fname1'],
		  'email_address' => $pro_order['email'],
		  'address' => array(
		    'address_line_1' => $pro_order['address'],
		    'address_line_2' => '',
		    'locality' => 'Japan',
		    'administrative_district_level_1' => 'JP',
		    'postal_code' => $pro_order['zip_code1'],
		    'country' => 'Japan'
		  ),
		  'phone_number' => $pro_order['mobile'],
		  'reference_id' => $pro_order['order_id'],
		  'note' => 'Thanks for your purchasing.'
		));






		   $result = $transactions_api->charge( $location->getId() ,  $request_body );
		   
		  } 
		  catch (\SquareConnect\ApiException $e) 
		  {
		  	
		  	return redirect('/order-entry');
		  	//return redirect('/my-cart')->with('fail','エラー発生しました。  <br> 取引手続きは処理できません。 ご利用のカードを確認してください。 ');
		   echo "Caught exception!<br/>";
		   print_r("<strong>Response body:</strong><br/>");
		   echo "<pre>"; 
		   var_dump($e->getResponseBody()); 
		   echo "</pre>";
		   echo "<br/><strong>Response headers:</strong><br/>";
		   echo "<pre>"; 
		   var_dump($e->getResponseHeaders()); 
		   echo "</pre>";
		  }


		  return redirect('/order-entry');

		//return redirect('/catagory/0')->with('success','注文を受け取りました。 ありがとうございました。'); 
	 } 	

	 public function gateway_auth(){
 		# Your application's ID and secret, available from your application dashboard
		$applicationId = 'sq0idp-aljTXhaEV2HhsfxU-sTdYA';
		$applicationSecret = 'sq0csp-nxhpT3Y_FykYFAkMSLY9ryq-i6IhlmAOGOaLiC6eoPU';
		$connectHost = 'https://connect.squareup.com';
		# Headers to provide to OAuth API endpoints
		$oauthRequestHeaders = array (
		  'Authorization' => 'Client ' . $applicationSecret,
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json'
		);
		# Serves requests from Square to your application's redirect URL
		# Note that you need to set your application's Redirect URL to
		# http://localhost:8000/callback.php from your application dashboard
		function callback() {
		  global $connectHost, $oauthRequestHeaders, $applicationId, $applicationSecret;
		  # Extract the returned authorization code from the URL
		  $authorizationCode = trim($_GET['code']);
		  if ($authorizationCode) {
		    # Provide the code in a request to the Obtain Token endpoint
		    $oauthRequestBody = array(
		      'client_id' => $applicationId,
		      'client_secret' => $applicationSecret,
		      'code' => $authorizationCode
		    );
		    $response = \Unirest\Request::post($connectHost . '/oauth2/token', $oauthRequestHeaders, json_encode($oauthRequestBody));
		    # Extract the returned access token from the response body
		    if (property_exists($response->body, 'access_token')) {
		      # Here, instead of printing the access token, your application server should store it securely
		      # and use it in subsequent requests to the Connect API on behalf of the merchant.
		      error_log('Access token: ' . $response->body->access_token);
		      error_log('Authorization succeeded!');
		      # The response from the Obtain Token endpoint did not include an access token. Something went wrong.
		    } else {
		      error_log('Code exchange failed!');
		    }
		    # The request to the Redirect URL did not include an authorization code. Something went wrong.
		  } else {
		    error_log('Authorization failed!');
		  }
		}
		# Execute the callback
		callback();

	 }


public function user_mail_product_confirmation($order_id, $receiver, $sender, $shipping_cost, $delivery_cost)
		{
			//Product buy confirmation mail (member er kase jabe)

			$pro_order = Pro_order::where('order_id',$order_id)->first();
			$order_list = Order_list::where('order_id',$order_id)->get();

			$subject = 'ご注文完了のお知らせ';
			$headers = "From: Hoktosuisan <" . $sender . ">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			
			
			$message ="<html>
			  <meta charset='UTF-8'>
			<head>
			<style>
			html, body {width: 100%; }
			table { margin: 0 auto;}
			.lrtb {
				border-left:1px solid #000;
				border-right:1px solid #000;				
				border-top:1px solid #000;
				border-bottom:1px solid #000;
				width: 20%;
			} 
			
			.rtb {
				border-right:1px solid #000;				
				border-top:1px solid #000;
				border-bottom:1px solid #000;
			} 
			.lrt {
				border-left:1px solid #000;
				border-right:1px solid #000;
				border-top:1px solid #000;				
			} 
			.lr {
				border-left:1px solid #000;
			} 
			.l {
				border-left:1px solid #000;
			} 
			
			.r {
				border-right:1px solid #000;				
			} 
			.b {
				border-bottom:1px solid #000;
			} 
			.t {
				border-top:1px solid #000;
			} 
			.lb {
				border-left:1px solid #000;
				border-bottom:1px solid #000;
				width: 20%;
			} 
			.lrb {
				border-left:1px solid #000;
				border-right:1px solid #000;
				border-bottom:1px solid #000;
				width: 10%;
			} 
			.price-table{width:33%; }
			@media screen and (max-width: 768px){
				.price-table{width:100%; }
			}
			
			</style>
			</head>
			<body>
			<img src='https://hokutousuisan.com/ecm/slider_img/logo.png' style='height: 78px; '>
			<table border='0' align='center' width='100%'>	
			
				<tr><td>----------------   ご注文完了のお知らせ   ----------------</td></tr>
				<tr><td>-------------------------------------------------------------------</td></tr>
				<tr><td>&nbsp;</td></tr>

				<tr><td><p>この度はホクトウ水産オンラインショップのご利用いただきありがとうございます。<br/>
				ホクトウ水産カスタマーサポートからの自動お知らせでございます。</p></td></tr>
				<tr><td>&nbsp;</td></tr>

				<tr><td>＊ ご注文内容：</td></tr>
				<tr><td>-------------------------------------------------------------------------</td></tr>
				
				
				<tr><td><p>ご注文番号 ：  HS000000".$pro_order['order_id']."<br/>
				ご注文アイテム ： ".$pro_order['quantity']."<br/>
				-----------------------<br/></p>
				</td></tr>
				</table>";

				
			$message .=	"<table align='left' cellpadding='0' cellspacing='0' border='0' class = 'price-table' >

								<tr>
									<td align='center' class='lrtb' style='background:#efefef;font-weight:bold;'>商品名</td>
									<td align='center' class='rtb' style='background:#efefef;font-weight:bold;'>単価</td>
									<td align='center' class='rtb' style='background:#efefef;font-weight:bold;'>数量</td>
									<td align='center' class='rtb' style='background:#efefef;font-weight:bold;'>小計</td>
								</tr>	";


							$sum = 0; 				
			foreach ($order_list as $value) {
				$product = Product::where('id', $value->product_id)->first();
				$subtotal = ($product['price'] * $value->quantity) ;
					
					$message .=			"<tr>
									<td align='center' class='lb'>".$product['product_title']."</td>
									<td align='center' class='lb'>&yen;".$product['price']."</td>
									<td align='center' class='lb'>".$value->quantity."</td>
									<td align='center' class='lrb'>&yen; ".  $subtotal ."</td>
								</tr>";
								$sum += $subtotal;

						}

					$message .=		"	<tr>
									<td colspan='4' >&nbsp;</td>
								</tr>
								<tr>
									<th colspan='3' align='right'>&nbsp; 小計	</th>
									<th  align='center'> &yen;".$sum."</th>
								</tr>
								<tr>
									<th colspan='3' align='right'>&nbsp;代金引換手数料	</th>
									<th  align='center'> &yen;".$delivery_cost."</th>
								</tr>
								<tr>
									<th colspan='3' align='right'>&nbsp;配送料 (佐川急便)</th>
									<th  align='center'> &yen;".$shipping_cost."</th>
								</tr>
								<tr>
									<th colspan='3' align='right'>&nbsp; 合計</th>
									<th  align='center'> &yen;".($sum +$shipping_cost+ $delivery_cost)."</th>
								</tr>			
								</table>";

									$method = $pro_order['payment_method'];
									if($method == 2){


						$message .= "
							<table align='left' cellpadding='0' cellspacing='0' border='0' style='margin-top: 30px; width:72%; margin-bottom:32px; text-align:left'  >
								<tr>
									<th colspan='3' align='left'><br>  ------------------------------------</th>
								</tr>	
								<tr>
									<th style='width: 26%;'>銀行名 	</th>
									<th> :</th>
									<th> 三井住友銀行 </th>
									<th colspan='3'></th>
								</tr>
								<tr>
									<th >支店名 </th>
									<th>:</th>
									<th  >下高井戸支店</th>
									<th colspan='3'></th>
								</tr>
								<tr>
									<th>口座種別</th>
									<th>:</th>
									<th  > 普通口座</th>
									<th colspan='3'></th>
								</tr>	
								<tr>
									<th>口座番号</th>
									<th>:</th>
									<th  > 4001469</th>
									<th colspan='3'></th>
								</tr>	
								<tr>
									<th>口座名義</th>
									<th>:</th>
									<th  > サワグチ　ダイスケ</th>
									<th colspan='3'></th>
								</tr>		
								<tr> 
									<th colspan = '3'>
										<p>※振込み手続き出来た後以下のメールアドレスに連絡お願いします、 support@hokutousuisan.com<br/></p>
									</th>
								</tr>
								<tr> 
									<td>
										---------------------------------<br><br>
									</td>
								</tr>																
							</table>";
						}

						$message .= "<table  border='0' width='100%' align='center'>	
							
							<tr> 
								<td>
									<p>ご注文履歴はマイページから確認いただけます。<br/></p>
								</td>
							</tr>
								
							<tr>
								<td>&nbsp;
								</td>
							</tr>
							<tr>
								<td>
									<a href='https://hokutousuisan.com/user/panel'>https://hokutousuisan.com/user/panel </a>
										&nbsp;
								</td>
							</tr>
							</table>
				
				</body>
				</html>";
				
			@mail($receiver ,  $subject , $message  ,$headers);
		}	 

public function support_mail_product_confirmation($order_id, $receiver, $sender, $shipping_cost, $delivery_cost)
		{
			//Product buy confirmation mail (member er kase jabe)

			$pro_order = Pro_order::where('order_id',$order_id)->first();
			$order_list = Order_list::where('order_id',$order_id)->get();
			$prefecture = Prefectures::where('id',$pro_order['prefecture'])->first();
			$payment_method = $pro_order['payment_method'];

			$subject = 'ご注文完了のお知らせ';
			$headers = "From: Hoktosuisan <" . $sender . ">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";


			if($payment_method == 1)
				$method = "代引き";
			else if($payment_method == 2)
				$method = "銀行振込";
			else if($payment_method == 3)
				$method = "カード";
			else $method = "not specified"; 			
			
			
			$message ="<html>
			  <meta charset='UTF-8'>
			<head>
			<style>
			html, body {width: 100%; }
			table { margin: 0 auto;}
			.lrtb {
				border-left:1px solid #000;
				border-right:1px solid #000;				
				border-top:1px solid #000;
				border-bottom:1px solid #000;
				width: 20%;
			} 
			
			.rtb {
				border-right:1px solid #000;				
				border-top:1px solid #000;
				border-bottom:1px solid #000;
			} 
			.lrt {
				border-left:1px solid #000;
				border-right:1px solid #000;
				border-top:1px solid #000;				
			} 
			.lr {
				border-left:1px solid #000;
			} 
			.l {
				border-left:1px solid #000;
			} 
			
			.r {
				border-right:1px solid #000;				
			} 
			.b {
				border-bottom:1px solid #000;
			} 
			.t {
				border-top:1px solid #000;
			} 
			.lb {
				border-left:1px solid #000;
				border-bottom:1px solid #000;
				width: 10%;
			} 
			.lrb {
				border-left:1px solid #000;
				border-right:1px solid #000;
				border-bottom:1px solid #000;
				width: 10%;
			} 
			.price-table{width:33%; }
			@media screen and (max-width: 768px){
				.price-table{width:100%; }
			}			
			
			</style>
			</head>
			<body>
			<img src='https://hokutousuisan.com/ecm/slider_img/logo.png' style='height: 78px; '>
			<table border='0' align='center' width='100%'>	
			
				<tr><td>----------------    新規ご注文完了のお知らせ   ----------------</td></tr>
				<tr><td>-------------------------------------------------------------------</td></tr>
				<tr><td>&nbsp;</td></tr>

				<tr><td><p>ホクトウ水産オンラインショップからご利用のお客様より新注文を入ってきました。<br/>
				以下の内容をご確認ください。</p></td></tr>
				<tr><td>&nbsp;</td></tr>

				<tr><td>＊	ご注文内容：</td></tr>
				<tr><td>-------------------------------------------------------------------------</td></tr>
				
				
				<tr><td><p>ご注文番号 ：  HS000000".$pro_order['order_id']."<br/>
				<tr><td><p>お客さん名 ：  ".$pro_order['sname1']." ".$pro_order['sname2']."<br/>
				電話 ： ".$pro_order['mobile']."<br/>
				メール ： ".$pro_order['email']."<br/>
				住所 ： ".$pro_order['zip_code1']." ".$pro_order['zip_code2'].",".$prefecture['name'].",".$pro_order['municipality'].",".$pro_order['address']."<br/>
				到着希望日 ： ".$pro_order['order_date']."<br/>
				到着希望時間  ： ".$pro_order['order_time']."<br/>
				注文日 ： ".$pro_order['created_at']."<br/>
				支払方法 ： ".$method."<br/>
				ご注文アイテム ： ".$pro_order['quantity']."<br/>
				-----------------------<br/></p>
				</td></tr>
				</table>";

				
			$message .=	"<table align='left' cellpadding='0' cellspacing='0' border='0' class='price-table'>

								<tr>
									<td align='center' class='lrtb' style='background:#efefef;font-weight:bold;'>商品名</td>
									<td align='center' class='rtb' style='background:#efefef;font-weight:bold;'>単価</td>
									<td align='center' class='rtb' style='background:#efefef;font-weight:bold;'>数量</td>
									<td align='center' class='rtb' style='background:#efefef;font-weight:bold;'>小計</td>
								</tr>	";


							$sum = 0; 				
			foreach ($order_list as $value) {
				$product = Product::where('id', $value->product_id)->first();
				$subtotal = ($product['price'] * $value->quantity) ;
					
					$message .=			"<tr>
									<td align='center' class='lb'>".$product['product_title']."</td>
									<td align='center' class='lb'>&yen;".$product['price']."</td>
									<td align='center' class='lb'>".$value->quantity."</td>
									<td align='center' class='lrb'>&yen; ".  $subtotal ."</td>
								</tr>";
								$sum += $subtotal;

						}

					$message .=		"	<tr>
									<td colspan='4' >&nbsp;</td>
								</tr>
								<tr>
									<th colspan='3' align='right'>&nbsp; 小計 </th>
									<th  align='center'> &yen;".$sum."</th>
								</tr>
								<tr>
									<th colspan='3' align='right'>&nbsp;代金引換手数料	</th>
									<th  align='center'> &yen;".$delivery_cost."</th>
								</tr>
								<tr>
									<th colspan='3' align='right'>&nbsp;配送料 (佐川急便)</th>
									<th  align='center'> &yen;".$shipping_cost."</th>
								</tr>
								<tr>
									<th colspan='3' align='right'>&nbsp; 合計</th>
									<th  align='center'> &yen;".($sum +$shipping_cost+ $delivery_cost)."</th>
								</tr>				
								</table>";
				
				
				
				
		                	$message .="<table  border='0' width='100%' align='center'>		
								<tr><td><p>----------------------<br/>
								----------------------<br/>
								新規注文一覧は管理画面からご確認ください。<br/>
								</p></td></tr>
								
								<tr><td>&nbsp;</td></tr>
				
							<tr><td>
							<a href='https://hokutousuisan.com/admin/order-list/0'>https://hokutousuisan.com/admin/order-list/0</a>
							&nbsp;</td></tr>
							</table>
				
				</body>
				</html>";

			@mail($receiver ,  $subject , $message  ,$headers);
		}	 



		public function test()
		{

$order_id = 22;
			$pro_order = Pro_order::where('order_id',$order_id)->first();
			$order_list = Order_list::where('order_id',$order_id)->get();dd($order_list);
echo "<table>";
			foreach ($order_list as $value) {echo $value->id;
				$product = Product::where('id', $value->product_id)->first();

					
					
					echo $message =			
								"<tr>
									<td align='center' class='lb'>".$product['product_title']."</td>
									<td align='center' class='lb'>&yen;".$value->price."</td>
									<td align='center' class='lb'>".$value->quantity."</td>
									<td align='center' class='lrb'>&yen; ".  ($value->price* $value->quantity)  ."</td>
								</tr>";

						}echo "</table>";

		}

}
















//https://github.com/anam-hossain/phpcart
		/*		
		$cart->add([ 'id'       => 1001,'name'     => 'Skinny Jeans','quantity' => 1,'price'    => 90]);		
		$cart->add(['id'       => 1002,	'name'     => 'Skinny Jeans2','quantity' => 1,'price'    => 95	]);
				
		foreach($cart->getItems() as  $c) 
		{
			echo $c->id ." ".$c->name . "  ".$c->quantity . " ".$c->price ."<br/>";	
		}
		*/
		
?>