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
<!-- ADD MODAL SECTION -->
                            <div id="addAluno" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Adicionar aluno</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form role="form">
                                     <div class="form-group">
                                        <label>ID do Cartão</label>
                                          <input type="text" class="form-control" id="id_cartao" placeholder="ID do Cartão"/>
                                      </div>
                                      <div class="form-group">
                                        <label>Nome do Aluno</label>
                                          <input type="text" class="form-control"
                                              id="nome_aluno" placeholder="Nome do Aluno"/>
                                      </div>
                                      <div class="form-group">
                                        <label>Email</label>
                                          <input type="email" class="form-control" id="email" placeholder="E-mail"/>
                                      </div>
                                      <div>
                                        <label>Triénio</label>
                                          <input type="text" class="form-control" id="trienio" placeholder="Triénio"/>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Adicionar aluno</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END OF THE ADD MODAL SECTION -->

                            <!-- EDIT MODAL SECTION -->
                            <div id="editAluno" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Editar aluno</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form role="form">
                                     <div class="form-group">
                                        <label>ID do Cartão</label>
                                          <input type="text" class="form-control" id="id_cartao" placeholder="ID do Cartão" value=>
                                      </div>
                                      <div class="form-group">
                                        <label>Nome do aluno</label>
                                          <input type="text" class="form-control"
                                              id="nome_aluno" placeholder="Nome do Aluno"/>
                                      </div>
                                      <div class="form-group">
                                        <label>Email</label>
                                          <input type="email" class="form-control" id="email" placeholder="E-mail"/>
                                      </div>
                                      <div>
                                        <label>Triénio</label>
                                          <input type="text" class="form-control" id="trienio" placeholder="Triénio"/>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Editar aluno</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END OF THE EDIT MODAL SECTION -->
      
      <table id="order_list_datatable" class="table table-bordered table-striped">
      <thead>
        <tr>
            <th style="max-width: 30px;">注文ID</th>
            <!-- <th>日付</th> -->
            <th>商品名 </th> 
            <th>顧客の名前 </th> 
            <th style="min-width: 50px; text-align: center;">電話   </th> 
            <th style="min-width: 170px; text-align: center;">メール </th> 
            <th>住所 @{{product_title}}</th>
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
      </table>
      
      
      
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        
      </div>  


    </section>
    <!-- /.content -->
   
  
<!-- DataTables -->

<script>
$(function(){
  var colors = ['#E8EAF6','#7986CB','#2196F3','#E3F2FD','#00BCD4','#009688','#80CBC4','#E8F5E9','#FF5722','#fff'];

  var dataTable = $('#order_list_datatable').DataTable({
    processing: true,
    serverSide: true,
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
    ],
initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        if(column[0][0] == 5){
                            // intentionally empty, we want to exclude column 5 from searching
                        } else {
                            var input = document.createElement("input");
                            $(input).appendTo($(column.footer()).empty())
                            .on('keypress', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                        }
                    });
                }
            });
        });
</script>
</script>
  
  

<script type="text/javascript">
  $(document).ready(function(){
      //var template = Handlebars.compile($("#details-template").html());

    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/admin/master-data') }}",
        columns: [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable":     false,
                "data":           null,
                "defaultContent": ''
            },
            {data: 'id', name: 'id'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ],
        order: [[1, 'asc']]
    });
  });

    // Add event listener for opening and closing details
    $('#users-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( template(row.data()) ).show();
            tr.addClass('shown');
        }
    });

</script>
  <script id="details-template" type="text/x-handlebars-template">
    <table class="table">
        <tr>
            <td>Full name:</td>
            <td>@{{id}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>@{{_order_id}}</td>
        </tr>
        <tr>
            <td>Extra info:</td>
            <td>And any further details here (images etc)...</td>
        </tr>
    </table>
</script>
<script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/datatables/handlebars.js') }}"></script>
@endsection 