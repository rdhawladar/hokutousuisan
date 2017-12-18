@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       catagory List
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
						<h3 class="box-title">Change Banner Image and  Title</h3>
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
	<!-- 				  <script>
					      location.href = "http://localhost/himitshu/admin/crazy-mindset-audio-edit/{{$topics->id }}";
					  </script> -->
					@endif
				
							
					<!-- form start -->
					<form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/catagory-edit') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
						    <input type="hidden" name="id" value="{{ $id }}" >
						    <input type="hidden" name="old_catagory_banner_url" value="{{ $topics->catagory_banner_url }}" >

                        
							 				                          
                            
							
							<div class="form-group">
							  <label for="exampleInputEmail1">Change Catagory Title</label>
							  <input type="text" class="form-control" name="catagory_title" id="catagory_title" value="{{ $topics->catagory_title }}" placeholder=" catagory Title">
							</div>     
 
							<div class="form-group">
							  <label for="exampleInputEmail1">Change Description</label>
							  <textarea class="form-control" id="description" name="catagory_description" value="{{ $topics->catagory_description }}" placeholder=" product Description">{{ $topics->catagory_description }}</textarea>
							  <script type="text/javascript" >	 
	                            CKEDITOR.replace( 'description' );
                              </script> 							  
							</div>   							                                                  
                            
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">Current Banner</label><br/>
							  <img   controls="true" style="width:20%%;max-width:600px;" src="{{ url('/ecm/catagory_img/'. $topics->catagory_banner_url) }}"  >
							</div> 
                            
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">New Banner Upload (Image dimension must be: )</label>
							  <input type="file" class="form-control" name="catagory_banner_url" id="catagory_banner_url"  >
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