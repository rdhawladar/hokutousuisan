@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Product Details
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
						<h3 class="box-title">Change Product  details to update </h3>
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
					      location.href = "http://localhost/himitshu/admin/crazy-mindset-audio-edit/{{$product->id }}";
					  </script> -->
					@endif
				
							
					<!-- form start -->
					<form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/product-edit') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
						    <input type="hidden" name="id" value="{{ $id }}" >
						    <input type="hidden" name="old_product_thumbnail_url" value="{{ $product->product_thumbnail_url }}" >

							<div class="form-group">
							  <label for="exampleInputEmail1">Select product Catagory </label>
							  <select type="text" class="form-control" name="catagory_id" id="catagory_id"  >
							  	@foreach( $catagory as $cat)
									@if($cat->id != 0)
										@if($cat->id == $product->catagory_id)
											<option value="{{ $cat-> id }}" selected > {{ $cat->catagory_title }} </option>
										@else
											<option value="{{ $cat-> id }}" > {{ $cat->catagory_title }} </option>
										@endif
									@endif
						  	    @endforeach
								</select>
							</div>               
                            
							
							<div class="form-group">
							  <label for="exampleInputEmail1">Change product Title</label>
							  <input type="text" class="form-control" name="product_title" id="product_title" value="{{ $product->product_title }}" placeholder=" product Title">
							</div>     
                            
							
							<div class="form-group">
							  <label for="exampleInputEmail1">Change product price</label>
							  <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}" placeholder=" product price">
							</div>     
                            
							
							<div class="form-group">
							  <label for="exampleInputEmail1">Change product quantity</label>
							  <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $product->quantity }}" placeholder=" product quantity">
							</div>     


							<div class="form-group">
							  <label for="exampleInputEmail1">Change product Description</label>
							  <textarea class="form-control" id="description" name="product_description" value="{{ $product->product_description }}" placeholder=" product Description">{{ $product->product_description }}</textarea>
							  <script type="text/javascript" >	 
	                            CKEDITOR.replace( 'description' );
                              </script> 							  
							</div>   							                                                 
                
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">Current Thumbnail</label><br/>
							  <img   controls="true" style="width:20%;max-width:600px;" src="{{ url('/ecm/product_img/'. $product->product_thumbnail_url) }}"  >
							</div> 
                            
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">New Thumbnail Upload</label>
							  <input type="file" class="form-control" name="product_thumbnail_url" id="product_thumbnail_url"  >
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