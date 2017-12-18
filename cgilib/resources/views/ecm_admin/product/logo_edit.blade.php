@extends('layouts.backend')
 

@section('content')

 @if ($id == 4 || $id == 2 || $id == 3)  @php  $image = "Footer image";  @endphp @endif 
 @if ($id == 1 )  @php  $image = "logo";  @endphp @endif 
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{$image}} editing
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
						<h3 class="box-title">Change {{$image}} </h3>
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
					<form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/logo-edit-action') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
						    <input type="hidden" name="id" value="{{ $id }}" >
						    <input type="hidden" name="old_logo_url" value="{{ $topics->logo_url }}" >
 


 

							<div class="form-group">
							  <label for="exampleInputEmail1">Change {{$image}} Title</label>
							  <input type="text" class="form-control" name="logo_title" id="logo_title" value="{{ $topics->logo_title }}" placeholder="Logo Title">
							</div>                                                    
                            
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">Current {{$image}}</label><br/>
							  <img   controls="true" style="width:20%;max-width:20px;" src="{{ url('/ecm/slider_img/'. $topics->logo_url) }}"  >
							</div> 
                            
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">
							  		Upload New {{ $image }} ( {{ $image }} dimension must be optimized.)	

							  </label>
							  <input type="file" class="form-control" name="logo_url" id="logo_url"  >
							          
							 
						</div>
						
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