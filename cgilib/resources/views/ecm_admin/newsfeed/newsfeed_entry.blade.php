@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     
    <section class="content-header">
    <h1>
        新着情報入力
      <!--  <small>Preview</small>  -->
      </h1>  
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>-->
    </section>	
	 
	
    <!-- Main content -->
    <section class="content">
   
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
			  
					<div class="box-header with-border">
						<h3 class="box-title">新着情報作成 </h3>
					</div>
					<!-- /.box-header -->				
					
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
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						{{ Session::get('success') }}
					  </div>	
					@endif
				
							
					<!-- form start -->
					<form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/newsfeed-entry') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
                        

							
							<div class="form-group">
							  <label for="exampleInputEmail1">タイトル </label>
							  <input type="text" class="form-control" name="newsfeed_title" id="newsfeed_title" value="{{ old('newsfeed_title') }}" 
                                     placeholder="Enter newsfeed Title">
							</div>                         



							<div class="form-group">
							  <label for="description">ニュース詳細を入力：</label>

							  <textarea class="form-control" id="description" placeholder="Enter News" name="newsfeed_description" value="{{ old('newsfeed_description') }}" >  </textarea>
							  <script type="text/javascript" >	 
	                            CKEDITOR.replace( 'description' );
                              </script>                   
							</div> 							                                                
                            
						</div>
						
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">完了</button>
						</div>
					</form>
					
				</div>
				<!-- /.box -->             
	 

			</div>
			<!--/.col (left) -->
			
		</div>	
	  
	  
    </section>
    <!-- /.content -->
     
      
  
@endsection	