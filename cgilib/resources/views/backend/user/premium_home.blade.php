@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        You are Premium Member
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

	
	
	
    <!-- Main content -->
    <section class="content">

	
    

   

      	
    <!--  ======================== Request Form ===================================================== -->
	<div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
           
            <div class="box box-primary">  
			    <br/>
            
                <h3 style="text-align:center;">You are {{ $amount }}万  Member!</h3>
                
				<br/>
				
				
			</div>	
				
				
				
               
		  
			</div> 
      </div>
	 
 
	
	
	
    
	
	
    
	 
	<div class="row">
	
		<style>
	    #chat_menu{
	        list-style:none;
	    }
	</style>
	
        <div class="col-md-12">
           
          <div class="box box-primary direct-chat direct-chat-primary">
              <!--
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                 
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
             
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            -->
            
            <div class="box-body">
            
                        <link type="text/css" href="http://sbkmart.com/cometchatv2/cometchatcss.php" rel="stylesheet" charset="utf-8">
                        <script type="text/javascript" src="http://sbkmart.com/cometchatv2/cometchatjs.php" charset="utf-8"></script>

                        <div id="cometchat_embed_chatrooms_container" style="display:inline-block; border:1px solid #CCCCCC;"></div>
                        <script src="http://sbkmart.com/cometchatv2/js.php?type=core&name=embedcode" type="text/javascript"></script>
                        <script>
                        var w = (window.innerWidth)-283;
                        var iframeObj = {};
                        iframeObj.module="chatrooms";
                        iframeObj.style="padding-left:5px;min-height:420px;min-width:"+ w +"px;";
                        iframeObj.src="http://sbkmart.com/cometchatv2/cometchat_embedded.php?crid=16";
                        iframeObj.width="900";
                        iframeObj.height="300";
                        if(typeof(addEmbedIframe)=="function"){
                        addEmbedIframe(iframeObj);
                        }
                        </script>
               
            </div>
             
          
             
          </div>
           
        </div>
         
    </div>
	
		
		
		
 
    
              

 
	  
	  
	  
    </section>
    <!-- /.content -->
	
 	
@endsection	