@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        otherpage List
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
              <h3 class="box-title">otherpage details list (Click EDIT to change )</h3>
            </div>		
			
			<table id="otherpage_list_datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
				    <th>Serial</th>
				    <!-- <th>日付</th> -->
            <th>type </th> 
            <th>Page type </th> 
            <th>Page Title </th> 
            <th>Page Description </th> 
            <th>Page Banner</th>
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
	var dataTable = $('#otherpage_list_datatable').DataTable({
		processing: true,
		serverSide: true,
		//scrollX : true ,
		bSort: false,
		ajax: "{{ url('/admin/otherpage-list-data-table') }}",
		columns: [
            { data: 'id', name: 'id' }, 
            { data: 'otherpage_type', name: 'otherpage_type' }, 
            { data: 'otherpage_title', name: 'otherpage_title' }, 
            { data: 'otherpage_description', name: 'otherpage_description' }, 
            { data: 'otherpage_banner_url', name: 'otherpage_banner_url' },
      			{ data: 'action', name: 'action' }
		]
	});
});
</script>
  
  
  
@endsection	