@extends('layouts.app') 
@section('content')
<style type="text/css">
input::-webkit-input-placeholder {
  color: #636363;
}
 
    #loginpage{
        background:url('http://sbkmart.com/v2/assets/dist/bg/waku1.png'); background-size:cover;background-repeat:no-repeat;width:100%;height:450px;
        position: relative;
        /*
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
     
     

#child {
  position: absolute;
  top: 0px;
  bottom: 0;
  left:0;
  right:0;
  margin: auto;
  width:80%;
  height: 0;
 }
     
     
</style>
<div  class="login-box" style="height:500px;border:1px solid #ff0000;">
    
	<div  class="login-logo" >
	    <img  src="{{ URL::asset('/assets/dist/bg/Logo-Final.png') }}"/>
	    <!--<span style="margin-left:-20px;margin-top:50px; vertical-align:middle;"></span>-->
		<!--style="-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';filter: alpha(opacity=50);-moz-opacity: 0.5;-khtml-opacity: 0.5;opacity: 0.5;"-->
	</div>
     
 	<div class="login-box-body" id="loginpage" >
	    
	    <div id="child" >
	    <!-- <p style="color:#F051DB;margin-left:-195px;font-size:44px;text-align:center;"><img  src="{{ URL::asset('/assets/dist/bg/Logo-Final.png') }}"/></p>  -->
		
		<form style="margin-top:-39px;" method="post" action="{{ url('/user/login') }}">
			{{ csrf_field() }}
			<div class="form-group has-feedback">
				<input type="email"  class="form-control" placeholder="Email" name="email" style="font-size:16px;" value="{{ old('email') }}">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
			</div>
			
			<div class="form-group has-feedback">
				<input type="password" class="form-control" id="password"  name="password" style="font-size:16px;" placeholder="Password" >
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>
			
			<div class="row">
				<div class="col-xs-12">
				    
				    
				     <table style="margin-top:-9px;" align="center">
				         <tr>
				         <td>
				            <input type="submit" value=""  style="border-left:0px solid #fff;border-right:0px solid #fff;border-top:0px solid #fff;border-bottom:0px solid #fff;width:100%;height:50px;background:url('http://sbkmart.com/v2/assets/dist/bg/fgserrsr2.png') no-repeat;background-size:contain;background-position:45% 45%;" />
				         </td>
				         </tr>
				         <tr>
				             <td align="center"><a href="javascript:void(0);"   style="color:#F051DB;">Forgot Password</a></td>
				         </tr>
				     </table>
				</div>			 
			</div>
		</form>
		</div>
		
		
	</div>

</div>
@endsection
