@extends('layouts.app_admin') 
@section('content')


<style>
    #loginpage{
        background: #bcce3e;
        -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';
        filter: alpha(opacity=50);
        -moz-opacity: 0.5;
        -khtml-opacity: 0.5;
        opacity: 0.5;
        border-radius: 7px 7px 7px 7px;
     }        
</style>
<div class="login-box" >
	<div class="login-logo">
		<a href="#" style="color:#111;"><b>ホクトウ水産</b></a>
	</div>
  
  
  
  
  
  
	<div id="loginbox" class="login-box-body" >
		<p class="login-box-msg">&nbsp;</p> 

		<form  method="post" action="{{ url('/admin/authenticate') }}">
			{{ csrf_field() }}
			@if ($errors->has('wrong_auth'))
			<span class="help-block" style="color: #a97373; width: 200px; background: #green;">
				<strong>{{ $errors->first('wrong_auth') }}</strong>
			</span>
		    @endif		
                    @if (Session::get('wrong_auth'))
                    <div class="order-alert success">
                        <h4><i class="icon fa fa-check"></i>  {{ Session::get('wrong_auth') }}</h4>                      
                      </div>    
                    @endif    		    


			<div class="form-group has-feedback">
				<input style="background: #595959; color: #fff" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				@if ($errors->has('email'))
				<span class="help-block" style="color: #9a0b0b;">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			    @endif
			     
			 
			     
			</div>
			
			<div class="form-group has-feedback">
				<input style="background: #595959;color: #fff;" type="password" class="form-control" id="password"  name="password" placeholder="Password" >
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				@if ($errors->has('password'))
					<span class="help-block" style="color: #9a0b0b; font-weight: normal;">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>
			
			<div class="row">
				<div class="col-xs-12">
				  <div class="checkbox icheck">
					<label>
					  <!-- <input type="checkbox"> Remember Me -->
					</label>
				  </div>
				</div>		 
				<div class="col-xs-12">
				  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>			 
			</div>
			
		</form>

		<!-- <a href="#">I forgot my password</a>--><br> 
		<!-- <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>	 -->
	</div>

</div>
@endsection
