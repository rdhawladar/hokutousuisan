@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        subcatagory List
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
              <h3 class="box-title">subcatagory details list (Click EDIT to change )</h3>
            </div>		
			
			<table id="subcatagory_list_datatable" class="table table-bordered table-striped display nowrap " cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th>Serial</th>
				    <!-- <th>日付</th> -->
            <th>catagory id  </th> 
            <th>type</th> 
            <th>subcatagory Title </th> 
            <th>subcatagory Description </th> 
  					<th>subcatagory Thumbnail</th>
  					<th>Action</th>
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
	var dataTable = $('#subcatagory_list_datatable').DataTable({
		processing: true,
		serverSide: true,
		scrollX : true ,
		bSort: false,
		ajax: "{{ url('/admin/subcatagory-list-data-table') }}",
		columns: [
            { data: 'id', name: 'id' }, 
            { data: 'catagory_id', name: 'catagory_id' }, 
            { data: 'type', name: 'type' }, 
            { data: 'subcatagory_title', name: 'subcatagory_title' }, 
            { data: 'subcatagory_description', name: 'subcatagory_description' }, 
      			{ data: 'subcatagory_thumbnail_url', name: 'subcatagory_thumbnail_url' },
      			{ data: 'action', name: 'action' }
		]
	});
});
</script>
  
  
  
@endsection	