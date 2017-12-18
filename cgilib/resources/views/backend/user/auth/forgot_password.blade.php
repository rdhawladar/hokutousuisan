@extends('layouts.app') 
@section('content')
<style type="text/css">
input::-webkit-input-placeholder {  color: #636363;  }    

/* @media (max-width:991px){  #loginpage{ width:85%;height:77%;} }     @media (max-width:676px){  #loginpage{ width:100%;height:77%;} } */
   
#child {  position: absolute; top: 0px; bottom: 0; left:0;  right:0;  margin: auto;  width:80%; height: 0; }   
</style>	

<style type="text/css">
	.rd-login-body{text-align: width:100%; height: 100%; display: flex; align-items: center; justify-content: center; }
	.rd-login-box{ width: 62%; height: 62%; }
	.rd-login-logo{ width: 90%; height: 35%; margin: 0 auto; margin-top: 2%; display: flex;}
	.rd-login-form{width: 100%; height: 100%;}
	.rd-login-after-logo{width: 100%; height: 62%; padding: 5% 5% 0 5%; }
	.rd-login-submit{border-left:0px solid #fff;border-right:0px solid #fff;border-top:0px solid #fff;border-bottom:0px solid #fff;width:100%;height:50px;background:url('http://俺達の秘密基地.com/assets/dist/bg/fgserrsr2.png') no-repeat;background-size:contain;/*background-position:45% 45%;*/}
	.rd-login-submit-forgot{height: 52%;}
	.rd-form-group{width: 100%; height: 20%; margin-bottom: 2%;}
	.rd-form-control{width: 100%; height: 100%;}
	.rd-submit{margin-top: 25px; border-left:0px solid #fff;border-right:0px solid #fff;border-top:0px solid #fff;border-bottom:0px solid #fff;width:50%;height:50%; padding: 6%; border-radius: 12px; margin-left: 25%;}
	.rd-help{line-height: 15px;}
	.rd-font{ color: #ff0000; font-size: 14px; }
	/*@media (max-width:1366px){.rd-login-margin{margin-top: -4%;}}*/
	 @media (max-height: 670px){.rd-login-after-logo{height: 62%; padding: 0% 10% 0% 10%;}
                .rd-login-logo{width:67%;height: 25%; }
                .rd-login-after-logo{margin-top: 10%; }
            	.rd-font{ color: #ff0000; font-size: 12px; }}
     @media (max-height: 490px){.rd-login-margin{margin-top: -6%}}
     @media (max-height: 420px) 
     {
     	.rd-input{margin-top: 25px; border-left:0px solid #fff;border-right:0px solid #fff;border-top:0px solid #fff;border-bottom:0px solid #fff;width:50%;height:26px;margin-left: 17%; }
 		.rd-login-after-logo{margin-top: -2%; }
 		.rd-margin-bottom{margin-bottom: 9px;}
 		.rd-login-margin{margin-top: -3%;}}
 		/*body{background-size: 100% 122%;}*/
 		.rd-login-logo{margin-bottom: 5%;}
 	}

 	@media (max-height: 425px) and (max-width: 1000px)
     {.rd-input{margin-top: 25px; border-left:0px solid #fff;border-right:0px solid #fff;border-top:0px solid #fff;border-bottom:0px solid #fff;width:50%;height:26px;margin-left: 17%; }
 		.rd-login-after-logo{margin-top: -2%; }
 		.rd-margin-bottom{margin-bottom: 9px;}
 		.rd-login-margin{margin-top: -3%;}
 	.rd-font{ color: #ff0000; font-size: 10px; }}
 	@media (max-height: 360px)
 	{
 		/*.rd-input-360{height: 30px;}*/
 		.rd-login-margin{margin-top: -8%;}
 	}
 	@media (max-width: 460px) and (max-height: 500px)
 	{
 		.rd-help-2nd{margin-bottom: -28%;}
 	}
 		@media (min-width: 1000px){
 		.rd-login-after-logo{width: 60%; margin: auto;}
 		.rd-submit{width: 25%; padding: 3%; margin-left: 37%;}

 	}

 	@media (max-height: 360px){
 		.rd-margin-bottom{margin-bottom: 5%;}
 		.rd-login-logo{height: 20%;}
 		.rd-login-body{height: 75%;}
 	}





</style>
<div class="rd-login-body">
	<div class="rd-login-box">
		<img class ="rd-login-logo" src="{{ URL::asset('/assets/dist/bg/Logo23.png') }}"/>

		<div class="rd-login-after-logo">
			<strong>Please enter your email address to recover your account: </strong>
			<form class = "form-cont" style="margin:auto; width: 100%" method="post" action="{{ url('/user/forgot-password') }}">
			{{ csrf_field() }}
			<div class="in-form">
			<div class="form-group has-feedback rd-margin-bottom">
				
				<input type="email"  class="form-control rd-input-360" placeholder="Email" name="email" style="font-size:16px;" value="{{ old('email') }}">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					@if ($errors->has('email'))
					<span class="help-block ">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif            
	                @if (Session::get('error'))
	            	<span class="help-block rd-font">
						<strong>{{ Session::get('error') }}</strong>
					</span>
	            	@endif
	              	@if (Session::get('success'))
	            	<span class="help-block">
						<strong>{{ Session::get('success') }}</strong>
					</span>
	            	@endif
			</div>
						
			<div class="row rd-login-margin" style="">
				<div class="col-xs-12">
				    <input type="submit"  class="rd-submit"  value="SUBMIT" />
				</div>			 
			</div>
			</div>
		</form>
			
		</div>
	</div>
</div>	
<!-- <div  class="login-box">
    <div class="login-box-body" id="loginpage" >
	    	
	    <div id="child" >
	     <div  class="login-logo" >
    	    <img  class="log-img" src="{{ URL::asset('/assets/dist/bg/Logo23.png') }}"/>
     	</div>
		
		<form class = "form-cont" style="margin:auto; width: 38%" method="post" action="{{ url('/user/forgot-password') }}">
			{{ csrf_field() }}
        
			<div class="form-group has-feedback rd-forgot-text-email">
				<input type="email"  class="form-control" placeholder="Email" name="email" style="font-size:16px;" value="{{ old('email') }}">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
				@endif            
                @if (Session::get('error'))
            	<span class="help-block">
					<strong>{{ Session::get('error') }}</strong>
				</span>
            	@endif
              	@if (Session::get('success'))
            	<span class="help-block">
					<strong>{{ Session::get('success') }}</strong>
				</span>
            	@endif
			</div>		
			
			<div class="row">
				<div class="col-xs-12">		    				    
				     <table align="center" class="rd-forgot-table">
				         <tr>
				         <td class="rd-forgot-table-td">
				            <input class="rd-forgot-table-td-input" type="submit" value=""  style="" />
				         </td>
				         </tr>				        
				     </table>
				</div>			 
			</div>
		</form>
		</div>	
		
	</div>

</div> -->
@endsection
