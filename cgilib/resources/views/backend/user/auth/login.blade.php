@extends('layouts.app') 
@section('content')
<style type="text/css">
input::-webkit-input-placeholder {
  color: #636363;
}
 
    #loginpage{
        /*
        
        background:url('http://sbkmart.com/v2/assets/dist/bg/waku1.png'); background-size:99% 125%;background-repeat:no-repeat;width:55%;height:77%; margin: 0 auto;
        position: relative;
        padding:20px;
        height:200px;
        margin-top:200px;*/
        /*background: #bcce3e;*/
        /*-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';
        filter: alpha(opacity=50);
        -moz-opacity: 0.5;
        -khtml-opacity: 0.5;
        opacity: 0.5;
        border-radius: 7px 7px 7px 7px;*/
        
     }   
     
       /*  @media (max-width:991px){  #loginpage{ width:85%;height:77%;} }
         @media (max-width:676px){  #loginpage{ width:100%;height:77%;} }
 */   
     
</style>


<style type="text/css">
	.rd-login-body{text-align: width:100%; height: 100%; display: flex; align-items: center; justify-content: center; }
	.rd-login-box{ width: 62%; height: 62%; }
	.rd-login-logo{ width: 90%; height: 35%; margin: 0 auto; margin-top: 2%; display: flex;}
	.rd-login-form{width: 100%; height: 100%;}
	.rd-login-after-logo{width: 100%; margin: auto; height: 62%; padding: 5% 5% 0 5%;}
	.rd-login-submit{border-left:0px solid #fff;border-right:0px solid #fff;border-top:0px solid #fff;border-bottom:0px solid #fff;width:100%;height:50px;background-position:45% 45%;*/}
	.rd-login-submit-forgot{height: 52%;}
	.rd-form-group{width: 100%; height: 20%; margin-bottom: 2%;}
	.rd-form-control{width: 100%; height: 100%;}
	.rd-input{margin-top: 25px; border-left:0px solid #fff;border-right:0px solid #fff;border-top:0px solid #fff;border-bottom:0px solid #fff;width:100%;height:50px;background-position:45% 45%; background: #666;}
	.rd-help{line-height: 15px;}
	.rd-font{ color: #ff0000; font-size: 14px; }
	/*@media (max-width:1366px){.rd-login-margin{margin-top: -4%;}}*/
	 @media (max-height: 670px){.rd-login-after-logo{height: 62%; padding: 0% 10% 0% 10%;}
                .rd-login-logo{width:67%;height: 25%; margin-bottom: 5%;}
                .rd-font{ color: #ff0000; font-size: 12px; }}
     @media (max-height: 490px){.rd-login-margin{margin-top: -6%} .rd-margin-bottom{margin-bottom: 2%;}} 
     @media (max-height: 430px) 
     {
     	/*.rd-input{margin-top: 25px; border-left:0px solid #fff;border-right:0px solid #fff;border-top:0px solid #fff;border-bottom:0px solid #fff;width:50%;height:26px;margin-left: 17%; background:url('http://俺達の秘密基地.com/assets/dist/bg/fgserrsr2.png') no-repeat;background-size:contain;background-position:45% 45%; }*/
 		.rd-login-after-logo{margin-top: -2%; }
 		.rd-margin-bottom{margin-bottom: 2%;}
 		.rd-login-margin{margin-top: -16%;}
 		.rd-login-logo{margin-bottom: 5%;}
 		.rd-input{ width: 54%; margin-left: 18%; }
 		.rd-font{ color: #ff0000; font-size: 10px; }
 	}

 	@media (max-height: 360px)
 	{
 		.rd-input-360{height: 30px;}
 		.rd-login-margin{margin-top: -25%;}
 		.rd-login-logo{ margin-top: 2%; height: 20%; margin-bottom: 10%;}
 		.rd-input{width: 80%; margin-left: 8%; background-position: 45% 100%; margin-top: -30%;}
 		.rd-forgot-pass{ font-size: 8px;  }
 		.rd-help{ line-height: 0px; }
 		.rd-margin-bottom{ margin-bottom: 5px; }
 	}

 	@media (max-height: 425px) and (max-width: 1000px)
     {/*.rd-input{margin-top: 25px; border-left:0px solid #fff;border-right:0px solid #fff;border-top:0px solid #fff;border-bottom:0px solid #fff;width:50%;height:26px;margin-left: 17%; background:url('http://俺達の秘密基地.com/assets/dist/bg/fgserrsr2.png') no-repeat;background-size:contain;background-position:45% 45%;  }*/
 		.rd-login-after-logo{margin-top: -2%; }
 		.rd-margin-bottom{margin-bottom: 9px;}
 		.rd-login-margin{margin-top: -3%;}}

 	@media (max-width: 460px) and (max-height: 500px)
 	{
 		.rd-help-2nd{margin-bottom: -28%;}
 	}
 	@media (min-width: 1000px){
 		.rd-login-after-logo{width: 60%;}
 	}





</style>
<div class="rd-login-body">
	<div class="rd-login-box">
		<!-- <img class ="rd-login-logo" src="{{ URL::asset('/assets/dist/bg/Logo23.png') }}"/> -->

		<div class="rd-login-after-logo">
			<form class = "form-cont" style="margin:auto; width: 100%" method="post" action="{{ url('/user/login') }}">
			{{ csrf_field() }}
			<div class="in-form">
							@if ($errors->has('email'))
				<span class="help-block rd-help rd-font">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
			<div class="form-group has-feedback rd-margin-bottom">
				<input type="email"  class="form-control rd-input-360" placeholder="Email" name="email" style="font-size:16px;" value="{{ old('email') }}">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>

			</div>
			
			<div class="form-group has-feedback rd-margin-bottom">
				<input type="password" class="form-control rd-input-360" id="password"  name="password" style="font-size:16px;" placeholder="Password" >
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<!-- 		@if ($errors->has('password'))
					<span class="help-block rd-help-2nd rd-font">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif -->
			</div>
			
			<div class="row rd-login-margin" style="">
				<div class="col-xs-12">
				    
				    
				     <table align="center">
				         <tr>
				         <td>
				            <input type="submit" class="rd-input"  value="submit" />
				         </td>
				         </tr>
				         <tr>
				             <td align="center"><a class ="rd-forgot-pass" href="{{  url('/user/forget-password') }}"   style="color:#F051DB;">Forgot Password</a></td>
				         </tr>
				     </table>
				</div>			 
			</div>
			</div>
		</form>
			
		</div>
	</div>
</div>	



</div>
@endsection
