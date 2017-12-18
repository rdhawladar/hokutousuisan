@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       subcatagory List
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
					<form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/subcatagory-edit') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
						    <input type="hidden" name="id" value="{{ $id }}" >
						    <input type="hidden" name="old_subcatagory_thumbnail_url" value="{{ $topics->subcatagory_thumbnail_url }}" >

							<div class="form-group">
							  <label for="exampleInputEmail1">Select Subcatagory </label>
							  <select type="text" class="form-control" name="catagory_id" id="catagory_id"  >
								@foreach($sub as $s)
									@if($s->parent_type != "main" &&  $s->parent_type != "cat")
									<option value="{{ old('catagory_id') }}">{{ $s->catagory_title }}</option>
									@endif
						  	    @endforeach
								</select>
							</div>               
                            
							
							<div class="form-group">
							  <label for="exampleInputEmail1">Change subcatagory Title</label>
							  <input type="text" class="form-control" name="subcatagory_title" id="subcatagory_title" value="{{ $topics->subcatagory_title }}" placeholder=" subcatagory Title">
							</div>     


							<div class="form-group">
							  <label for="exampleInputEmail1">Change Description</label>
							  <input type="text" class="form-control" name="subcatagory_description" id="subcatagory_description" value="{{ $topics->subcatagory_description }}" placeholder=" subcatagory Description">
							</div>                                                    
                
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">Current Thumbnail</label><br/>
							  <img   controls="true" style="width:20%;max-width:600px;" src="{{ url('/ecm/subcatagory_img/'. $topics->subcatagory_thumbnail_url) }}"  >
							</div> 
                            
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">New Thumbnail Upload (Image dimension must be: )</label>
							  <input type="file" class="form-control" name="subcatagory_thumbnail_url" id="subcatagory_thumbnail_url"  >
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