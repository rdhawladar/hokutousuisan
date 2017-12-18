@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mobile Application
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

	 
	<script src="{{ URL::asset('/assets/dist/js/springy.js') }}"></script>
    <script src="{{ URL::asset('/assets/dist/js/springyui.js') }}"></script>
	
    <!-- Main content -->
    <section class="content">

        <div class="row">        
            <div id="mydata" class="col-md-12">
                
                <script>
                    $(function(){
 
                        $.getJSON("http://xn--u9j926gj4ecxa32lwx8cf56a.com/user/your-video-newtwork-json", function(data){
                            var graph = new Springy.Graph();
                            graph.addNodes(data.mine)
                            $.each(data.nodes , function(k,v){
                                  graph.addNodes(v);
                            }); 
                            for(var i = 0 ; i< data.nodes_line.length ; i++ ) {
                                 graph.addEdges(data.nodes_line[i]);
                            }
                            var springy = $('#springydemo').springy({  
                                graph: graph
                            });
                        });  
                    });
                </script>
                <canvas id="springydemo" width="500" height="380" />
                
            </div>
        </div>    






    </section>
    <!-- /.content -->
	
 	
@endsection	