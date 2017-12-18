@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        バナー画像編集 
        <!-- <small>Preview</small> -->
      </h1>
      <!--<ol class="breadcrumb">
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
              <h3 class="box-title">画像一覧（画像を変更するには”変更”をクリックしてください）</h3>
            </div>		
			
			<table id="slider_list_datatable" class="table table-bordered table-striped display nowrap " cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th>順番</th>
				    <!-- <th>日付</th> -->
                    <th>画像タイトル </th> 
					<th>画像表示</th>
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
	var dataTable = $('#slider_list_datatable').DataTable({
		processing: true,
		serverSide: true,
		scrollX : true ,
		bSort: false,
		ajax: "{{ url('/admin/slider-image-list-data-table') }}",
		columns: [
            { data: 'id', name: 'id' }, 
            { data: 'slider_title', name: 'slider_title' }, 
			{ data: 'slider_url', name: 'slider_url' },
			{ data: 'action', name: 'action' },
		]
	});
});
</script>
  
  
  
@endsection	