@extends('layouts.backend')
 

@section('content')

 @if ($id == 4 || $id == 2 || $id == 3 )  @php  $image = "Footer image";  @endphp @endif 
 @if ($id == 1 )  @php  $image = "ロゴ";  @endphp @endif 
 @if ($id == 5 )  @php  $image = "top thumbnail";  @endphp @endif 
 @if ($id == 6 )  @php  $image = "住所";  @endphp @endif 
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{$image}}設定
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
						<h3 class="box-title">{{$image}}変更 </h3>
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
						    
							@if($id==6)
							<div class="form-group">
							  <label for="description">住所を入力:</label>

							  <textarea class="form-control" id="description" placeholder="Enter  Address" name="logo_title" value="{{ $topics->logo_title }}" >{{ $topics->logo_title }}   </textarea>
							  <script type="text/javascript" >	 
	                            CKEDITOR.replace( 'description' );
                              </script>                   
							</div>  
                 		    <div class=" hidden form-group">
							  <label for="exampleInputEmail1">
							  		Upload New {{ $image }} ( {{ $image }} dimension must be optimized.)	

							  </label>
							  <input type="file" class="form-control" name="logo_url" id="logo_url"  >
							          
							 
							</div> 							
						    
						    @else
							<div class="form-group hidden">
							  <label for="exampleInputEmail1">{{$image}}タイトル変更</label>
							  <input type="text" class="form-control" name="logo_title" id="logo_title" value="{{ $topics->logo_title }}" placeholder="タイトル変更">
							</div>  
							
                            <div class="form-group">
							  <label for="exampleInputEmail1">現在の {{$image}}</label><br/>
							  <img   controls="true" style="width:10%;max-width:600px;" src="{{ url('/ecm/slider_img/'. $topics->logo_url) }}"  >
							</div> 
                            
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">
							  		しい{{ $image }} アップロード（ {{ $image }} の寸法を最適化する必要があります）

							  </label>
							  <input type="file" class="form-control" name="logo_url" id="logo_url"  >
							          
							 
							</div>
							@endif  
						
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