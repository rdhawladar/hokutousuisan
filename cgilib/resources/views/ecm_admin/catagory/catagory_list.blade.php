@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          カテゴリー編集
          <!-- <small>Preview</small> -->
        </h1>
    </section>	
	
    <section class="content">

          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
    		      
                    <div class="box-header with-border">
                      <h3 class="box-title">カテゴリ一覧（変更するには”変更”をクリックしてください）</h3>
                    </div>	      	

              			<table id="catagory_list_datatable" class="table table-bordered table-striped display nowrap" cellspacing="0" width="100%">
                  			<thead>
                  				<tr>
                  				    <th>順番</th>
                              <th>タイプ </th> 
                              <th>タイトル </th> 
                              <th>詳細</th> 
                              <th>バナー</th>
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
  </div>
<!-- /.content -->
  



<!-- Modal for delete confirmation -->
  <!-- set up the modal to start hidden and fade in and out -->
<div id="myModals" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        Hello world!
      </div>
      <!-- dialog buttons -->
      <form>
        {{ csrf_field() }}
          <div class="modal-footer">
            <input type="text"   value="" id="modal-data" name="modal-data">
            <button type="button" id = "ok-button" class="btn btn-primary" >OK</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          </div>
      </form>

    </div>
  </div>
</div>

<!-- sometime later, probably inside your on load event callback -->
<script>

    
</script>
<!-- END Modal for delete confirmation -->
  
<!-- DataTables -->
<script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function(){
	var dataTable = $('#catagory_list_datatable').DataTable({
        language: {
      search: '検索:' 
      },
		processing: true,
		serverSide: true,
		scrollX : true ,
		bSort: false,
		ajax: "{{ url('/admin/catagory-list-data-table') }}",
		columns: [
            { data: 'id', name: 'id' }, 
            { data: 'type', name: 'type' }, 
            { data: 'catagory_title', name: 'catagory_title' }, 
            { data: 'catagory_description', name: 'catagory_description' }, 
            { data: 'catagory_banner_url', name: 'catagory_banner_url' },
      			{ data: 'action', name: 'action' }
		]
	});

   $(document).on('click','#myModal',function(){
       var id = $(this).attr('name');
       $("#modal-data").val(id);
     
        $("#myModals").modal({                    // wire up the actual modal functionality and show the dialog
          "backdrop"  : "static",
          "keyboard"  : true,
          "show"      : true                     // ensure the modal is shown immediately
        });
   });

 $(document).on('click','#ok-button',function(){
  //#modal-data
     var id = $("#modal-data").val();
       var req_url = "{{ url('/admin/catagory-delete/') }}" ;
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        })
  
        var formData = {
         id : id
        }
        $.ajax({
                  type: 'post',
                  url: req_url,
                  data:'id='+id,

                  success: function (data) {
              alert(data);
         }
        });
     //  alert(req_url);

 });



} );

</script>
  
  
  
@endsection	