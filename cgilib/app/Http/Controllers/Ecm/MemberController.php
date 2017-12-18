<?php

namespace App\Http\Controllers\Ecm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
//use Yajra\Datatables\Datatables;
use Datatables; 
use App\User;
use Auth;
use Anam\Phpcart\Cart; 
use App\Product; 
use DB;
use App\Menu; 
use App\Logo;
use App\Catagory;
use App\Otherpage;
use App\Footer;
use App\Pro_order;
use App\Order_list;
use App\Member;
use App\Prefectures;
use Session;
use SendMail;


class MemberController extends Controller
{


    public function login()
    {	
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

        return view('ecm.login')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('total', $test = $this->cart_cal());  
    }   

    public function registration()
    {   
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

        return view('ecm.registration')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('total', $test = $this->cart_cal());        
    }

    public function panel()
    {   
    	
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();
        $prefecture_user = Prefectures::where('id', Auth::user()->prefecture)->first();
        $prefecture = Prefectures::orderBy('id', 'asc')->get();
        
        $order_info = Pro_order::select('product.id as pro_proid', 'product.product_title as pro_protitle', 'pro_order.order_id as pooid', 'pro_order.member_id as pomid', 'order_list.product_id as olpid', 'order_list.order_id as oloid', 'order_list.quantity as olquantity', 'order_list.price as olprice', 'order_list.created_at as olca')
        				->leftJoin('order_list', 'pro_order.order_id', '=' , 'order_list.order_id')
        				->leftjoin('product', 'order_list.product_id', '=' , 'product.id')
        				->where('pro_order.member_id',Auth::user()->id)
        				->orderBy('order_list.created_at', 'desc')
        				->paginate(10);

        				//dd($order_info);
        $order_list = Order_list::orderBy('created_at','desc')->get();//paginate(2);        

        return view('ecm.user.panel')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('order_list', $order_list)
            ->with('order_info', $order_info)
            ->with('prefecture', $prefecture)
            ->with('prefecture_user', $prefecture_user['name'])
            ->with('total', $test = $this->cart_cal());        
    }
	
	public function Member_entry(Request $r)
	{
				$email = trim($r->input("email")); 
				$email_check = Member::where('email',$email)->count();
				if($email_check>0)
					return redirect('/registration')->with('fail','メールアドレスは既に存在しています。');
				else{
					$sname1 = trim($r->input("sname1"));
					$sname2 = trim($r->input("sname2"));
					$mobile = trim($r->input("mobile"));
					$address = trim($r->input("address"));
					$password = trim($r->input("password"));

					$t = new Member();
					$t->sname1      	= $sname1; 
					$t->sname2      	= $sname2; 
					$t->fname1      	= trim($r->input("fname1")); 
					$t->fname2      	= trim($r->input("fname2")); 
					$t->email			= $email;
					$t->zip_code1		= trim($r->input("zip_code1")); 
					$t->zip_code2		= trim($r->input("zip_code2")); 
					$t->prefecture		= trim($r->input("prefecture")); 
					$t->municipality	= trim($r->input("municipality")); 
					$t->address			= $address; 
					//dd($r->input("password"));
					$t->password			= bcrypt($password); 
					$t->redable_pass			= $r->input("password"); 
					$t->mobile			= $mobile; 
					$t->status			= "ACTIVE";
					$t->created_at 		=  date('Y-m-d H:i:s');
					$t->updated_at 		=  date('Y-m-d H:i:s');
					$t->save();     
					
					$member = Member::where('email',$email)->first();
					$user_id = $member['id'];
					$user_name = $sname1.' '.$sname2;
					$this->send_mail_member_registration_confirmation($user_id, $email,  $password);
					$this->send_mail_amdin_registration_confirmation($user_id, $user_name, $address, $mobile, $email);

					return redirect('/login')->with('reg_success','ご登録ありがとうございます。 <br> 先ほど登録完了メールを送りました。 <br> ご確認ください');
				}
	}


	public function profile_update(Request $r){
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();
        $order_list = Order_list::orderBy('id','asc')->get();
        $order_info = Pro_order::where('member_id',Auth::user()->id)->get();        

        $id = trim($r->input('user_id'));
        $sname1 = trim($r->input('sname1'));
        $sname2 = trim($r->input('sname2'));
        $fname1 = trim($r->input('fname1'));
        $fname2 = trim($r->input('fname2'));
        $zip_code1 = trim($r->input('zip_code1'));
        $zip_code2 = trim($r->input('zip_code2'));
        $prefecture = trim($r->input('prefecture'));
        $municipality = trim($r->input('municipality'));
        $address = trim($r->input('address'));
        $email = trim($r->input('newemail'));
        $mobile = trim($r->input('mobile'));

    	$t = Member::where('id', $id)->first();
    	$t->sname1      = $sname1;
    	$t->sname2      = $sname2;
    	$t->fname1      = $fname1;
    	$t->fname2      = $fname2;
    	$t->zip_code1      = $zip_code1;
    	$t->zip_code2      = $zip_code2;
    	$t->prefecture      = $prefecture;
    	$t->municipality      = $municipality;
    	$t->address     = $address;
    	$t->mobile     = $mobile;
    	$t->email      = $email;
    	$t->update();         

		return redirect('/user/panel')->with('success','情報を更新されました！');	; 		

	}

	public function forget_pass(){
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();
        $order_list = Order_list::orderBy('id','asc')->get();

		return view('ecm.forget_pass')
			->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('order_list', $order_list)
            ->with('total', $test = $this->cart_cal());  
	}

	public function pass_resend(Request $r){
		$email = trim($r->input("email")); 
		$email_check = Member::where('email',$email)->count();
		
		if($email_check == 0)
			return redirect('/forget-pass')->with('fail','このメールアドレスは存在しません、入力したメールアドレスをも一度確認ください。');	

		if($email_check == 1){

			$user = User::where('email',$email)->first();

			$name = 'Hokutousuisan';
			$mailsubject = 'password Recovery';
		    $message  = '現在のパスワード : '.$user['redable_pass'].'<br> リンクをクリックしてログインしてください。 <a href="https://hokutousuisan.com/login">https://hokutousuisan.com/login</a>';   
		    
		    $mailfrom = 'support@hokutousuisan.com';
		    
		    $headers  = "MIME-Version: 1.0\n";
		    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		    $headers .= 'From: '.$name.' <'.$mailfrom.'>' . "\r\n";
		    $mail=mail($email,$mailsubject,$message,$headers);
			return redirect('/login')->with('success','パスワードを再発行すしメールで送りしました。 <br> 受信トレイと迷惑メールフォルダを確認してください。');

		}
		else return redirect('/forget-pass')->with('fail','まだお困りであれば。 support@hokutousuisan.com までご連絡ください。');


	}
	
	public function user_order_entry(Request $r)
	{

		$cart 	= new Cart();		
		$carts  = $cart->getItems();

		$validator = \Validator::make($r->all(),[	
			'name' => 'required' ,		
			'email' => 'required|email',
			'address' => 'required',
			'mobile' => 'required|numeric'
		]);

		
		if ($validator->fails()) {
            return redirect()->action('Ecm\ShopManagerController@checkout')
                        ->withErrors($validator)
                        ->withInput();
        } 

        $order_id 	= DB::table('pro_order')->MAX('order_id') +1; 

        $quantity 	= $r->input('quantity');
        $price 		= $r->input('price');
        $product_id = $r->input('product_id');

    	foreach ($product_id as $key => $value) {
			$t = new Pro_order();
			$t->order_id      	= $order_id; 
			$t->name      	= trim($r->input("name")); 
			$t->email	= trim($r->input("email")); 
			$t->address	= trim($r->input("address")); 
			$t->mobile	= trim($r->input("mobile")); 
			$t->product_id	= trim($product_id[$key]); 
			$sum_price = trim($price[$key]) * $quantity[$key];
			$t->price	= $sum_price;
			$t->quantity	= $quantity[$key]; 
			$t->created_at =  date('Y-m-d H:i:s');
			$t->updated_at =  date('Y-m-d H:i:s');
			$t->save();
		}

		$id = $t->id;
		if($id)
			$cart->clear();
		return redirect('/catagory/0')->with('success','注文を受け取りました。 ありがとうございました。'); 
	}
	
	public function member_list()
    {	
        return view('ecm_admin.member.member_list');
    }

	public function member_list_data_table()
	{	
		$topics = Member::select(['users.id as member_id', 'sname1', 'sname2', 'zip_code2', 'zip_code1', 'prefectures.id as preid', 'prefectures.name as name', 'municipality', 'address', 'mobile', 'status', 'created_at', 'email'])
					->orderBy('created_at', 'desc')
					->leftjoin('prefectures', 'prefectures.id', '=', 'users.prefecture')
					-> get();
		//dd($topics);
		return Datatables::of($topics)

		
			->editColumn('address', function ($result) {
				return "$result->zip_code1 $result->zip_code2, $result->name, $result->municipality, $result->address";
			})	
			->editColumn('action', function ($result) {
			if($result->status == 'ACTIVE')
			  return "<a class='btn btn-xs btn-success' href='". url('/admin/member-deactive/'. $result->id .'') ."'>  状態変更</a>";
			else 
			  return "<a class='btn btn-xs btn-danger' href='". url('/admin/member-deactive/'. $result->id .'') ."'> 状態変更</a>";
			})	
			->make(true);
	}


	public function member_deactive($id)
	{

			
    		$t = Member::where('id', $id)->first();
    		$status = $t['status'];

    		if($status == 'ACTIVE')
    			$t->status      = 'DEACTIVE';
    		if($status == 'DEACTIVE')
    			$t->status      = 'ACTIVE';
    		$t->update(); 
    		return redirect('/admin/member-list')->with('success','ID-'.$id.'状態が正常に変更されます。');
	}


	public function member_delivered($id)
	{

    		$t = Member::find($id);
    		$t->status      = 1;
    		$t->updated_at =  date('Y-m-d H:i:s');
    		$t->update();        
        
		
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


public function send_mail_member_registration_confirmation($user_id, $email,  $password )
		{		

		
			//Registration confirmation mail for member
						
			$sender = 'support@hokutousuisan.com';
			$subject = '新規会員登録完了のお知らせ';

			$headers = "From:  ホクトウ水産 <". $sender. ">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			
			$message = "<html>
			  <meta charset='UTF-8'>
			<head>
			<meta http-equiv='Content-Type'  content='text/html charset=UTF-8' />
			<style>
			html, body {width: 100%; }
			table { margin: 0 auto;}
			</style>
			</head>
			<body>
				<img src='https://hokutousuisan.com/ecm/slider_img/logo.png' style='height: 78px; '>
	
			<table border='0' align='center' width='100%'>
				<tr><td>----------------   新規会員登録完了のお知らせ   ----------------</td></tr>
				<tr><td>--------------------------------------------------------------------</td></tr>
				<tr><td>&nbsp;</td></tr>

				<tr><td><p>この度はホクトウ水産オンラインショップのご登録ありがとうございました。<br/>
				ホクトウ水産カスタマーサポートでございます。</p></td></tr>
				
				<tr><td>&nbsp;</td></tr>
				
				
				<tr><td><p>会員登録が完了いたしましたのでお知らせいたします。<br/>
				ログインにはご登録メールアドレスと以下のパソワードが必要になります。	</p></td></tr>
			
				<tr><td>&nbsp;</td></tr>
				
				<tr><td>＊ ご登録メールアドレス情報</td></tr>
				<tr><td>-------------------------------------------------------------------------</td></tr>
				
				<tr><td>&nbsp;</td></tr>
				
				<tr><td><p>
				『ホクトウ水産ID』：   ".$user_id."<br/>
				『メールアドレス』 ：  ".$email."<br/>
				『パスワード』  ： ".$password." <br/>
				</p></td></tr>
				
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				
				<tr><td>ログインリンク：　https://hokutousuisan.com/login</td></tr>

				
				<tr><td>&nbsp;</td></tr>
				
				<tr><td><p>＊ 会員登録情報は、ホクトウ水産利用する上で非常に大切な情報です。<br/>
				大切に管理していただきますようお願いします。</p></td></tr>
				</table>
				</body></html>";

			    @mail($email ,  $subject , $message  ,$headers);

		}    
public function send_mail_amdin_registration_confirmation($user_id, $user_name, $address, $mobile, $email)
		{
			//Registration confirmation mail for admin mail (support@hokutousuisan)

			$sender = 'support@hokutousuisan.com';
			$subject = '新規会員登録完了のお知らせ ';
		

			$headers = "From:  ホクトウ水産 <". $sender. ">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			
			
			$message = "<html>
			  <meta charset='UTF-8'>
			<head>
			<meta http-equiv='Content-Type'  content='text/html charset=UTF-8' />			
			<style>
			html, body {width: 100%; }
			table { margin: 0 auto;}
			</style>
			</head>
			<body>
				<img src='https://hokutousuisan.com/ecm/slider_img/logo.png' style='height: 78px; '>
	
			<table border='0' align='center' width='100%'>
				<tr><td>----------------   新規会員登録完了のお知らせ   ----------------</td></tr>
				<tr><td>--------------------------------------------------------------------</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>新規会員登録が完了いたしましたのでお知らせいたします。</td></tr>
				<tr><td>&nbsp;</td></tr>

				<tr><td>＊ 新規お客さんご登録情報
				<tr><td>-------------------------------------------------------------------------
				<tr><td><p>ホクトウ水産ID： ".$user_id."<br/>
						名前： ".$user_name." <br/>
						住所： ".$address."<br/>
						電話番号： ".$mobile."<br/>
						メールアドレス： ".$email."<br/>
					</p>
				</td></tr>			
				<tr><td>&nbsp;</td></tr>

				<tr><td><p>＊ 会員登録情報は、管理画面にも情報追加されてます。 <br/>
					大切に管理していただきますようお願いします。</p></td></tr>
				</table>
				</body>
				</html>";
				
				@mail($sender ,  $subject , $message  ,$headers); 
	
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
		
