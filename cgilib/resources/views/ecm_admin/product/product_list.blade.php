@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        商品一覧
        <!-- <small>Preview</small> -->
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol> -->
    </section>	
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
	
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
		  
            <div class="box-header with-border">
              <h3 class="box-title">商品詳細一覧（変更するには”変更”をクリックしてください）</h3>
            </div>		
			
			<table id="product_list_datatable" class="table table-bordered table-striped  display nowrap" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th>順番</th>
				    <!-- <th>日付</th> -->
            <th>カテゴリID id  </th> 
            <th>タイプ</th> 
            <th>商品タイトル </th> 
            <th>価格 </th> 
            <th>数量 </th> 
            <th>詳細 </th> 
  					<th>画像</th>
  					<th></th>
				</tr>
			</thead>
			</table>
			
			
			
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        
      </div>	   
       
     

	  
	  
    </section>
    <!-- /.content -->
  
  
<!-- DataTables -->
<script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function(){
	var dataTable = $('#product_list_datatable').DataTable({
    language: {
      search: '検索:' 
      },
		processing: true,
		serverSide: true,
		scrollX : true ,
		bSort: false,
		ajax: "{{ url('/admin/product-list-data-table') }}",
		columns: [
            { data: 'id', name: 'id' }, 
            { data: 'catagory_id', name: 'catagory_id' }, 
            { data: 'type', name: 'type' }, 
            { data: 'product_title', name: 'product_title' }, 
            { data: 'price', name: 'price' }, 
            { data: 'quantity', name: 'quantity' }, 
            { data: 'product_description', name: 'product_description' }, 
      			{ data: 'product_thumbnail_url', name: 'product_thumbnail_url' },
      			{ data: 'action', name: 'action' }
		]
	});
});
</script>
  
  
  
@endsection	