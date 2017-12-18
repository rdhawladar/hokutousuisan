
<?php 

 
	class SendMail
	{	
	
		private $message ;
		private $sender;
		private $receiver;
		private $headers;
		private $subject;
		
		public function send_mail_member_registration_confirmation()
		{							
			//Registration confirmation mail for member
						
			$this->sender = 'samerseu@gmail.com';
			$this->subject = 'Website Change Request';
			$this->receiver = 'khokon_85seu@hotmail';

			$this->headers = "From: " . $this->receiver . "\r\n";
			$this->headers .= "MIME-Version: 1.0\r\n";
			$this->headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			$this->message = "<html>
			  <meta charset='UTF-8'>
			<head>
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
				『ホクトウ水産ID』：   343<br/>
				『メールアドレス』 ：  test<br/>
				『パスワード』  ： 2434w54 <br/>
				</p></td></tr>
				
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				
				<tr><td>ログインリンク：　https://hokutousuisan.com/login</td></tr>

				
				<tr><td>&nbsp;</td></tr>
				
				<tr><td><p>＊ 会員登録情報は、ホクトウ水産利用する上で非常に大切な情報です。<br/>
				大切に管理していただきますようお願いします。</p></td></tr>
				</table>
				</body></html>";
							
			    @mail($this->sender ,  $this->subject , $this->message  ,$this->headers);
				
				
			return $this->message;
		}
		
		
		public function send_mail_amdin_registration_confirmation()
		{
			//Registration confirmation mail for admin mail (support@hokutousuisan)

			$this->sender = 'samerseu@gmail.com';
			$this->subject = 'Website Change Request';
			$this->receiver = 'khokon_85seu@hotmail';

			$this->headers = "From: " . $this->receiver . "\r\n";
			$this->headers .= "MIME-Version: 1.0\r\n";
			$this->headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			
			$this->message = "<html>
			  <meta charset='UTF-8'>
			<head>
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
				<tr><td><p>ホクトウ水産ID： <br/>
						名前：  <br/>
						住所： <br/>
						電話番号： <br/>
						メールアドレス： <br/>
					</p>
				</td></tr>			
				<tr><td>&nbsp;</td></tr>

				<tr><td><p>＊ 会員登録情報は、管理画面にも情報追加されてます。 <br/>
					大切に管理していただきますようお願いします。</p></td></tr>
				</table>
				</body>
				</html>";
				
				@mail($this->sender ,  $this->subject , $this->message  ,$this->headers);
					
					
			return $this->message;		
		}
		
		
		public function send_mail_product_by_confirmation()
		{
			//Product buy confirmation mail (member er kase jabe)

			
			$this->sender = 'samerseu@gmail.com';
			$this->subject = 'Website Change Request';
			$this->receiver = 'khokon_85seu@hotmail.com';
			$this->headers = "From: Hoktosuisan <" . $this->receiver . ">\r\n";
			$this->headers .= "MIME-Version: 1.0\r\n";
			$this->headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			
			$this->message ="<html>
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
			} 
			.lrb {
				border-left:1px solid #000;
				border-right:1px solid #000;
				border-bottom:1px solid #000;
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
				
				
				<tr><td><p>ご注文番号 ： <br/>
				ご注文アイテム ：<br/>
				-----------------------<br/></p>
				</td></tr>
				</table>";

				
			$this->message .=	"<table align='left' cellpadding='0' cellspacing='0' border='0' width='70%'>
								<tr>
									<td align='center' class='lrtb' style='background:#efefef;font-weight:bold;'>Product</td>
									<td align='center' class='rtb' style='background:#efefef;font-weight:bold;'>Unit Price</td>
									<td align='center' class='rtb' style='background:#efefef;font-weight:bold;'>Quantity</td>
									<td align='center' class='rtb' style='background:#efefef;font-weight:bold;'>Sub Total</td>
								</tr>					
								<tr>
									<td align='center' class='lb'>Product 1</td>
									<td align='center' class='lb'>&yen;25</td>
									<td align='center' class='lb'>2</td>
									<td align='center' class='lrb'>&yen;50</td>
								</tr>
								<tr>
									<td align='center' class='lb'>Product 2</td>
									<td align='center' class='lb'>&yen;30</td>
									<td align='center' class='lb'>2</td>
									<td align='center' class='lrb'>&yen;60</td>
								</tr>
								<tr>
									<td colspan='4' >&nbsp;</td>
								</tr>
								<tr>
									<th colspan='3' align='right'>&nbsp;</th>
									<th  align='center'>Total: &yen;110</th>
								</tr>				
								</table>";
				
				
				
				
		                	$this->message .="<table  border='0' width='100%' align='center'>		
								<tr><td><p>----------------------<br/>
								----------------------<br/>
								ご注文履歴はマイページから確認いただけます。<br/>
								</p></td></tr>
								
								<tr><td>&nbsp;</td></tr>
				
							<tr><td>
							<a href='https://hokutousuisan.com/order-page-link'>https://hokutousuisan.com/order-page-link</a>
							&nbsp;</td></tr>
							</table>
				
				</body>
				</html>";
				
				
			@mail($this->sender ,  $this->subject , $this->message  ,$this->headers);
			return $this->message;	
		}
	}


	
	$m = new SendMail();
//  echo $m->send_mail_member_registration_confirmation();	
//	echo $m->send_mail_amdin_registration_confirmation();
	echo $m->send_mail_product_by_confirmation();
	
?>
