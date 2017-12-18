@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     
    <section class="content-header">
    <h1>
        クレイジーマインドセット音声アップロード
      <!--  <small>Preview</small>  -->
      </h1>  
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>-->
    </section>	
	 
	
    <!-- Main content -->
    <section class="content">
   
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
			  
					<div class="box-header with-border">
						<h3 class="box-title">クレイジーマインドセット音声アップロード</h3>
					</div>
					<!-- /.box-header -->				
					
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
				
							
					<!-- form start -->
					<form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/crazy-mindset-audio-entry') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
                        
                        	<!--
							<div class="form-group">
								<label for="exampleInputEmail1">日付</label>
								<select class="form-control" name="for_month" >
									<option value="">-- Select Month --</option>
									@foreach($month_dates as $k=>$v)
									<option value="{{ $v }}">{{ date('F,Y', strtotime($v)) }}</option>
									@endforeach									 
								</select>
							</div>		
                            -->
							
							<div class="form-group">
							  <label for="exampleInputEmail1">音声タイトル</label>
							  <input type="text" class="form-control" name="audio_title" id="audio_title" value="{{ old('audio_title') }}" 
                                     placeholder="タイトルを入力してください">
							</div>                                                    
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">ファイルアップロード</label>
							  <input type="file" class="form-control" name="audio_url" id="audio_url"  >
							</div>		
													
                        
                            <div class="form-group">
							  <label for="exampleInputEmail1">公開する日付(yyyy-mm-dd hh)</label>
                            
                             <table width="100%" border="0">
                             <tr>
                             	<td>
                                	<select name="publish_year" class="form-control">
                                        @for( $i = 2017 ; $i <= 2020 ; $i++)
                                    	<option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                	</select>
                                </td>
                            	<td>年&nbsp;</td>
                             	<td>
                                	<select name="publish_month" class="form-control">
                                        @for( $i = 1 ; $i <= 12 ; $i++)
                                    	<option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                	</select>
                                </td>
                    			<td>月&nbsp;</td>
                             	<td>
                                	<select name="publish_date" class="form-control">
                                        @for( $i = 1 ; $i <= 31 ; $i++)
                                    		<option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                	</select>
                                </td>
            <td>日&nbsp;</td>
                            	<td>
                                	<select name="publish_hour" class="form-control">
                                        @for( $i = 1 ; $i <= 24 ; $i++)
                                    		<option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                	</select>
                                </td>
    <td>時&nbsp;</td>
                            
                             </tr>
  
                            </table>
                            
                            
                            
					</div>                                           
                        
                        
                        
                     
							 
						</div>
						
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
					
				</div>
				<!-- /.box -->             
	 

			</div>
			<!--/.col (left) -->
			
		</div>	
	  
	  
    </section>
    <!-- /.content -->
     
      
  
@endsection	