@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        プレミアムログイン
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/user/home') }}"><i class="fa fa-dashboard"></i> ホーム</a></li>
        <!--  <li><a href="#">Forms</a></li> -->
        <li class="active">プレミアムログイン</li>
      </ol>
    </section>

	
	
	
    <!-- Main content -->
    <section class="content">

	
    

   

      	
    <!--  ======================== Request Form ===================================================== -->
	<div class="row">
        
        <!-- right column -->
        <div class="col-md-12">
         
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">プレミアム会員</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			    <br/>
			    
            
                @if (count($errors) > 0)
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Error!</h4>
					{{ $errors->first() }}
				</div>				
    			@endif
    			
    			@if (Session::get('success'))
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
					{{ Session::get('success') }}
				</div>					
    			@endif
              
                <form class="form-horizontal" method="post" action="{{ url('/user/premium/login') }}">
                  {{ csrf_field() }}    
                 
				  
				  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">メール</label>

                    <div class="col-sm-8">
                      <input type="email" name="email" class="form-control" readonly placeholder="Enter Email"  value="{{ \Auth::user()->email }}"/>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">パスワード</label>

                    <div class="col-sm-8">
                      <input type="password" name="password" class="form-control"  placeholder="パスワードを入力して下さい"   />
                    </div>
                  </div>
                
                 
				  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                  
                  
                  
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
 
	
	
		
		
		
 
    
              

 
	  
	  
	  
    </section>
    <!-- /.content -->
	
 	
@endsection	