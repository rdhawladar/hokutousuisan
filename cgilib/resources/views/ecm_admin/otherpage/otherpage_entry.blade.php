@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     
    <section class="content-header">
    <h1>
        Page Entry
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
						<h3 class="box-title">Enter Page Details</h3>
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
					<form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/otherpage-entry') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
  							<div class="form-group">
							  <label for="otherpage_type">otherpage Type </label>
							  <input type="text" class="form-control" name="otherpage_type" id="otherpage_type" value="{{ old('otherpage_type') }}" 
                                     placeholder="Enter otherpage Type">
							</div>                       

							
							<div class="form-group">
							  <label for="exampleInputEmail1">otherpage Title </label>
							  <input type="text" class="form-control" name="otherpage_title" id="otherpage_title" value="{{ old('otherpage_title') }}" 
                                     placeholder="Enter otherpage Title">
							</div>                         

							
							<div class="form-group">
							  <label for="description">otherpage Description </label>

							  <textarea class="form-control" id="description" placeholder="Enter Page Detail" name="otherpage_description" value="{{ old('otherpage_description') }}" >{{ old('otherpage_description') }} </textarea>
							  <script type="text/javascript" >	 
	                            CKEDITOR.replace( 'description' );
                              </script>                   
							</div>                                                    
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">Upload otherpage Banner Image (Image dimension must be: ) </label>
							  <input type="file" class="form-control" name="otherpage_banner_url" id="otherpage_banner_url"  >
							</div>     
						</div>
						
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
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