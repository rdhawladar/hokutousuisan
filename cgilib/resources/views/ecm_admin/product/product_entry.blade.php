@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     
    <section class="content-header">
    <h1>
        商品追加
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
						<h3 class="box-title">商品詳細を入力</h3>
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
					<form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/product-entry') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
                        	


							
							<div class="form-group">
								  <label for="catagory_id">カテゴリー選択 </label>
								  <select type="text" class="form-control" name="catagory_id" id="catagory_id" >
												<option value=""> -- 選択してください -- </option>
										@foreach($catagory as $cat)
											@if($cat->id != 0)
												<option value="{{ $cat->id }}">{{ $cat->catagory_title }}</option>
											@endif
								  	    @endforeach
								  </select>
							</div>     							

							<div class="form-group">
							  <label for="exampleInputEmail1">商品タイトル </label>
							  <input type="text" class="form-control" name="product_title" id="product_title" value="{{ old('product_title') }}" 
                                     placeholder="タイトル入力してください">
							</div>                         

							<div class="form-group">
							  <label for="exampleInputEmail1">価格 </label>
							  <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" 
                                     placeholder="価格入力してください">
							</div>                         

							<div class="form-group">
							  <label for="exampleInputEmail1">数量 </label>
							  <input type="text" class="form-control" name="quantity" id="quantity" value="{{ old('quantity') }}" 
                                     placeholder="数量入力してください">
							</div>                         

							
							<div class="form-group">
							  <label for="exampleInputEmail1">詳細 </label>
							  <textarea class="form-control" id="description" name="product_description" value="{{ old('product_description') }}" placeholder="詳細"></textarea>
							  <script type="text/javascript" >	 
	                            CKEDITOR.replace( 'description' );
                              </script>                                         
							</div>            
							                    
                            <div class="form-group">
							  <label for="exampleInputEmail1">画像アップロード: </label>
							  <input type="file" class="form-control" name="product_thumbnail_url" id="product_thumbnail_url"  >
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