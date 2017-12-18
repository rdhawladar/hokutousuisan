<?php
namespace App\Http\Controllers\Ecm;

 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Menu; 
use App\SliderImage;
use App\Logo;
use App\Catagory;
use App\Product;
use App\Otherpage;
use App\Footer;
use App\Newsfeed;
use App\Message;
use Anam\Phpcart\Cart; 

class HomeController extends Controller
{
    
    public function index()
    {	

        $menu = Menu::orderBy('id','asc')->get();
        $slider  = SliderImage::orderBy('id','asc')-> get();
        $logo  = Logo::orderBy('id','asc')-> get();
        $footer = Footer::orderBy('id','asc')->get();
        $newsfeed = Newsfeed::orderBy('created_at','asc')->get();
        return view('ecm.home')
            ->with('menu', $menu)
            ->with('slider',$slider)
            ->with('footer',$footer)
            ->with('newsfeed',$newsfeed)
            ->with('total', $test = $this->cart_cal())
            ->with('logo', $logo);
    }    

     public function downloadFax()
     {

        $file_name = "ecm/slider_img/logo.png";
        $file_path = public_path($file_name);
        return response()->download('ecm/file/FAX注文書.pdf');
     }      



    public function catagory($id)
    {   
        
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

        return view('ecm.catagory')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('total', $test = $this->cart_cal())
            ->with('id', $id);
    } 

    public function catagory_mid()
    {	
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();
        return view('ecm.catagory_mid')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('total', $test = $this->cart_cal())
            ->with('catagory', $catagory);
    }    

    public function concept()
    {	
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();
        return view('ecm.concept')
            ->with('menu', $menu)
            ->with('footer', $footer)
            ->with('logo', $logo)
            ->with('total', $test = $this->cart_cal())
            ->with('catagory', $catagory);
    } 

    public function agreement()
    {	
        return view('ecm.agreement');  
    }  

    public function catagory_test()
    {	
        return view('ecm.catagory');  
    }    

    
    public function demo()
    {   
        return view('ecm.demo');  
    }
    

    //Footer bottom pages and news feed
    public function site_policy()
    {    
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.bottom_pages.site_policy')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page)
            ->with('total', $test = $this->cart_cal());        
    }
    
    public function site_map()
    {   
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.bottom_pages.site_policy')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page)
            ->with('total', $test = $this->cart_cal()); 
    }
    
    public function privacy_protection()
    {   
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.bottom_pages.privacy_protection')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page)
            ->with('total', $test = $this->cart_cal());  
    }
    
    public function com_transaction()
    {   
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.bottom_pages.com_transaction')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page)
            ->with('total', $test = $this->cart_cal());  
    }
    
    public function about_delivery_fee()
    {   
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.bottom_pages.about_delivery_fee')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page)
            ->with('total', $test = $this->cart_cal());  
    }
    
    public function news($id)
    {	
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();
        $newsfeed = Newsfeed::find($id);      

       // dd($page);

        return view('ecm.bottom_pages.news')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page)
            ->with('newsfeed', $newsfeed)
            ->with('total', $test = $this->cart_cal());  
    }


    //bottom pages end with news

    
    public function header()
    {	
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        return view('ecm.header')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('total', $test = $this->cart_cal())
            ->with('catagory', $catagory);
    }

    
    public function footer()
    {	
        $menu = Menu::orderBy('id','asc')->get();
        $slider  = SliderImage::orderBy('id','asc')-> get();
        $logo  = Logo::orderBy('id','asc')-> get();
        $footer  = Footer::orderBy('id','asc')-> get();
        return view('ecm.footer')
            ->with('footer', $footer) 
            ->with('logo', $logo);  
    }

    public function otherpage($id){
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.otherpage')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page)
            ->with('total', $test = $this->cart_cal())
            ->with('id',$id);
    } 

    public function about_us(){
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.about_us')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('total', $test = $this->cart_cal());
    } 




    public function contact(){
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.contact')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('total', $test = $this->cart_cal())
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page);
    } 

    public function pro_details($id){
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.pro_details')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('total', $test = $this->cart_cal())
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page)
            ->with('id', $id);
    } 
    
    public function product_description($id){
        $menu = Menu::orderBy('id','asc')->get();
        $logo = Logo::orderBy('id','asc')->get();
        $catagory = Catagory::orderBy('id','asc')->get();
        $product = Product::orderBy('id','asc')->get();
        $page = Otherpage::orderBy('id','asc')->get();
        $footer = Footer::orderBy('id','asc')->get();

       // dd($page);

        return view('ecm.product_description')
            ->with('menu', $menu)
            ->with('logo', $logo)
            ->with('footer', $footer)
            ->with('total', $test = $this->cart_cal())
            ->with('catagory', $catagory)
            ->with('product', $product)
            ->with('page', $page)
            ->with('id', $id);
    } 

    public function contact_submit(Request $r){

            $name    = trim($r->input("name")); 
            $fname   = trim($r->input("fname")); 
            $email   = trim($r->input("email")); 
            $mobile  = trim($r->input("mobile")); 
            $message = trim($r->input("message")); 
            $created_at = date('Y-m-d H:i:s');

            $t = new Message();
            $t->name        = $name   ;
            $t->fname       = $fname  ;
            $t->email       = $email  ;
            $t->mobile      = $mobile ;
            $t->message     = $message;
            $t->created_at  = $created_at;
            $t->updated_at  =  date('Y-m-d H:i:s');
            $t->save();
            

            $sender = 'support@hokutousuisan.com';
            //$sender = 'riad.excel@gmail.com';
            $this->support_mail_contact_form($sender, $name, $fname, $email, $mobile, $message, $created_at);

            return redirect('/catagory/0')->with('success','メッセージを受け取りました、お問い合わせありがとうございます。');
    } 

    //cart calculation
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



public function support_mail_contact_form($sender, $name, $fname, $email, $mobile, $message_data, $created_at)
        {
            //Product buy confirmation mail (member er kase jabe)
       
            $subject = 'お問い合わせメッセージ！';
            $headers = "From: Hoktosuisan <" . $sender . ">\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
            $message ="
            <!DOCTYPE html>
            <meta charset='UTF-8'>
            <head>
                <style>
                    table {
                        border-collapse: collapse;
                        border-spacing: 0;
                        width: 60%;
                    }

                    th, td {
                        text-align: left;
                        padding: 8px;
                    }

                    .first-td{text-align:left; width:20%}
                    .colon{width:2px;}   
                    .message-td{vertical-align: top;}        
                </style>
            </head>
            <body>";
                
            $message .="
                <div style='overflow-x:auto;'>
                  <img src='https://hokutousuisan.com/ecm/slider_img/logo.png' style='height: 78px;'>
                  <table>
                    <tr>
                      <td class='first-td'>お名前</td>
                      <td class='colon'>:</td>
                      <td>".$name."</td>
                    </tr>
                    <tr>
                      <td class='first-td'>ふりがな</td>
                      <td class='colon'>:</td>
                      <td>".$fname."</td>
                    </tr>
                    <tr>
                      <td class='first-td'>メールアドレス</td>
                      <td class='colon'>:</td>
                      <td>".$email."</td>
                    </tr>
                    <tr>
                      <td class='first-td'>電話番号</td>
                      <td class='colon'>:</td>
                      <td>".$mobile."</td>
                    </tr>
                    <tr>
                      <td class='first-td'>お問い合わせした日時</td>
                      <td class='colon'>:</td>
                      <td>".$created_at."</td>
                    </tr>
                    <tr>
                      <td class='first-td message-td'>お問い合わせ内容</td>
                      <td class='colon message-td' >:</td>
                      <td>".$message_data."</td>
                    </tr>
                  </table>
                </div>  
            </body>
            </html>";

            @mail($sender ,  $subject , $message  ,$headers);

            //echo $message;
            //exit();
        }    


}	