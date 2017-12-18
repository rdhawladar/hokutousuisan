@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Menu Name
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
              <h3 class="box-title">Click edit to change menu</h3>
            </div>		
			
			<table id="menu_list_datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
				    <th>Serial</th>
				    <!-- <th>日付</th> -->
                    <th>Menu Name</th> 
					<th>Action</th>
					
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
	var dataTable = $('#menu_list_datatable').DataTable({
		processing: true,
		serverSide: true,
		//scrollX : true ,
		bSort: false,
		ajax: "{{ url('/admin/menu-data-table') }}",
		columns: [
		    { data: 'id', name: 'id' }, 	
		    { data: 'menu_title', name: 'menu_title' },		           
			{ data: 'action', name: 'action' }
		]
	});
});
</script>
  
  
  
@endsection	