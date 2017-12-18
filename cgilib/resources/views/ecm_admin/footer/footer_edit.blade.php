@extends('layouts.backend')
 

@section('content')

       
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{$footer->footer_portion}} editing
      <!--  <small>Preview</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol> -->
    </section>	
	
	
    <!-- Main content -->
    <section class="content">
   
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
			  
					<div class="box-header with-border">
						<h3 class="box-title">Change {{$footer->footer_portion}} </h3>
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
					<form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/footer-edit-action') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
						    <input type="hidden" name="id" value="{{ $id }}" >
 



							@if($id==1)
							<div class="form-group">
							  <label for="description">Enter {{$footer->footer_portion }}:</label>

							  <textarea class="form-control" id="description" placeholder="Enter  Detail" name="footer_data" value="{{ $footer->footer_data }}" >{{ $footer->footer_data }}  </textarea>
							  <script type="text/javascript" >	 
	                            CKEDITOR.replace( 'description' );
                              </script>                   
							</div>  
 							
						    
						    @else
							<div class="form-group">
							  <label for="exampleInputEmail1">Enter {{$footer->footer_portion }}: </label>
							  <input type="text" class="form-control" name="footer_data" id="footer_data" value="{{ $footer->footer_data }}" placeholder="Enter Data">
							</div>
							@endif    
                                             
                            
                            

						
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Change</button>
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