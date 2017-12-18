@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            @if($id == 0)
              新しい注文詳細
            @else 
              納品一覧
            @endif        
          
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
              <h3 class="box-title"> 注文内容 </h3>
            </div>    

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

      
      <table id="order_list_datatable" class="table table-bordered table-striped display nowrap " cellspacing="0" width="100%">
      <thead>
        <tr>
            <th>注文ID</th>
            <!-- <th>日付</th> -->
            <th>顧客の名前 </th> 
            <th>電話   </th> 
            <th>メール </th> 
            <th>住所</th>
            <th>数量</th>
            <th>合計</th>
            @if($id == 0)
            <th></th>
            @else 
            <th>ステータス</th>
            @endif
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
  var dataTable = $('#order_list_datatable').DataTable({
    processing: true,
    serverSide: true,
    scrollX : true ,
    bSort: false,
    ajax: "{{ url('/admin/order-list-data-table/'.$id) }}",
    columns: [
            { data: 'order_id', name: 'id' }, 
            { data: 'name', name: 'name' }, 
            { data: 'mobile', name: 'mobile' }, 
            { data: 'email', name: 'email' }, 
            { data: 'address', name: 'address' }, 
            { data: 'quantity', name: 'quantity' }, 
            { data: 'price', name: 'price' }, 
            { data: 'action', name: 'action' }
    ]
  });
});
</script>
  
  
  
@endsection 