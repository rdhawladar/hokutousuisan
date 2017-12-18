@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       お問い合わせ一覧

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
              <h3 class="box-title">すべてのメッセージ</h3>
            </div>		
			
			<table id="message_list_datatable" class="table table-bordered table-striped display " cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th style="max-width: 5%;">順番</th>
            <th style="max-width: 10%;">名前 </th> 
            <th style="max-width: 10%;">ふりがな</th> 
            <th style="max-width: 15%;">メール</th> 
            <th style="max-width: 10%;">電話</th>
            <th style="max-width: 10%;">お問い合わせした日時</th>
            <th style="max-width: 20%;">メッセージ</th>
  					<th style="max-width: 5%;"></th>
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
	var dataTable = $('#message_list_datatable').DataTable({
     language: {
      search: '検索:' 
      },
		processing: true,
		serverSide: true,
		scrollX : true ,
		bSort: false,
		ajax: "{{ url('/admin/message-list-data-table') }}",
		columns: [
            { data: 'id', name: 'id' }, 
            { data: 'name', name: 'name' }, 
            { data: 'fname', name: 'fname' }, 
            { data: 'email', name: 'email' }, 
            { data: 'mobile', name: 'mobile' }, 
            { data: 'created_at', name: 'created_at' }, 
            { data: 'message', name: 'message' },
            { data: 'action', name: 'action' }
		]
	});
});
</script>
  
  
  
@endsection	