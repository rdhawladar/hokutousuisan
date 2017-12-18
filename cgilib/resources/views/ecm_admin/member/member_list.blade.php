@extends('layouts.backend')
 

@section('content')

<style type="text/css">div.dataTables_wrapper {
        100%
        margin: 0 auto;
    }</style>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        メンバー編集
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
              <h3 class="box-title">メンバー一覧（変更するには”変更”をクリックしてください）</h3>
            </div>  


              
      
      <table id="member_list_datatable" class="table table-bordered table-striped display nowrap " cellspacing="0" width="100%">
      <thead>
        <tr>
            <th style="max-width: 50px;">メンバーID </th>
            <!-- <th>日付</th> -->
            <th>名前 </th> 
            <th>メール </th> 
            <th>住所</th> 
            <th>電話番号 </th>
            <th>状態</th>
            <th>登録日時</th>
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
  var dataTable = $('#member_list_datatable').DataTable({
        language: {
      search: '検索:' 
      },
    processing: true,
    serverSide: true,
    scrollX : true ,
    bSort: false,
    ajax: "{{ url('/admin/member-list-data-table') }}",
    columns: [
            { data: 'member_id', name: 'member_id' }, 
            { data: 'sname1', name: 'sname1' }, 
            { data: 'email', name: 'email' }, 
            { data: 'address', name: 'address' }, 
            { data: 'mobile', name: 'mobile' }, 
            { data: 'status', name: 'status' }, 
            { data: 'created_at', name: 'created_at' }, 
            { data: 'action', name: 'action' }
    ]
  });
});
</script>
  
  
  
@endsection 