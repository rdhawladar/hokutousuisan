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

      
      <table id="users-table" class="table table-bordered table-striped display nowrap " cellspacing="0" width="100%">
        <thead>
          <tr>
              <th style="max-width: 30px;">注文ID</th>
              <th>商品詳細</th>
              <th>顧客の名前 </th> 
              <th style="min-width: 100px; text-align: center;">電話   </th> 
              <th style="min-width: 170px; text-align: center;">メール </th> 
              <th>住所</th>
              <th>数量</th>
              <th>合計</th>
              <th>注文日</th>              
              <th>配送日</th>
              <th>出荷時</th>            
              <th>支払方法</th>
              @if($id == 0)
              <th></th>
              @else 
              <th>ステータス</th>
              @endif
          </tr>
          <tbody>
            
          </tbody>
      </thead>
      </table>
      
<!--       <table id="order_list_datatable" class="table table-bordered table-striped">
      <thead>
        <tr>
            <th style="max-width: 30px;">注文ID</th>
            <th>商品名 </th> 
            <th>顧客の名前 </th> 
            <th style="min-width: 50px; text-align: center;">電話   </th> 
            <th style="min-width: 170px; text-align: center;">メール </th> 
            <th>住所</th>
            <th>数量</th>
            <th>合計</th>
            <th>注文日</th>              
            <th>配送日</th>
            <th>出荷時</th>            
            <th>支払方法</th>
            @if($id == 0)
            <th></th>
            @else 
            <th>ステータス</th>
            @endif
        </tr>
      </thead>
      </table> -->
      
      
      
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
    scrollX: true,
    //scrollX : true ,
    bSort: false,
    ajax: "{{ url('/admin/order-list-data-table/'.$id) }}",
    columns: [
            { data: 'order_id', name: 'id' }, 
            { data: 'product_title', name: 'product_title' }, 
            { data: 'sname1', name: 'sname1' }, 
            { data: 'mobile', name: 'mobile' }, 
            { data: 'email', name: 'email' }, 
            { data: 'address', name: 'address' }, 
            { data: 'quantity', name: 'quantity' }, 
            { data: 'price', name: 'price' }, 
            { data: 'created_at', name: 'created_at' }, 
            { data: 'order_date', name: 'order_date' }, 
            { data: 'order_time', name: 'order_time' }, 
            { data: 'payment_method', name: 'payment_method' }, 
            { data: 'action', name: 'action' }
    ]
  });
});
</script>
<!-- row grouping js data  -->  
<script type="text/javascript">
$(function(){
 var template = Handlebars.compile($("#details-template").html());
    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        bSort: false,
        ajax: "{{ url('/admin/master-data/'.$id) }}",
        columns: [

            {data: 'order_id', name: 'order_id'},
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable":      false,
                "data":           null,
                "scrollX": true,
                "defaultContent": "<button style='color:green;'>見る</button>"
            },            
            {data: 'sname1', name: 'sname1'},
            {data: 'mobile', name: 'mobile'},
            {data: 'email', name: 'email'},
            {data: 'address', name: 'address'},
            {data: 'quantity', name: 'email'},
            {data: 'price', name: 'price'},
            {data: 'created_at', name: 'created_at'},
            {data: 'order_date', name: 'order_date'},
            {data: 'order_time', name: 'order_date'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'action', name: 'action'}
        ],
        order: [[1, 'asc']]
    });

    // Add event listener for opening and closing details
    $('#users-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'posts-' + row.data().order_id;
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(template(row.data())).show();
            initTable(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }
    });

    function initTable(tableId, data) {
        $('#' + tableId).DataTable({
            searching: false,
            processing: true,
            serverSide: true,
            lengthChange: false,
            scrollX: true,
            ajax: data.details_url,
            columns: [
                { data: 'product_title', name: 'product_title' },
                { data: 'quantity', name: 'quantity' },
                { data: 'price', name: 'price' },
                { data: 'action', name: 'action' }

            ]
        })
    }
    });

</script>
   <script id="details-template" type="text/x-handlebars-template">
        <table class="table details-table" id="posts-@{{order_id}}">
            <thead>
            <tr>
                <th>商品名</th>
                <th>数量</th>
                <th>合計</th>
                <th></th>
            </tr>
            </thead>
        </table>
    </script>
  
<!-- end row grouping jQuery -->
<script src="{{ URL::asset('/ecm/dt/handlebars.js') }}" ></script>
  
@endsection 