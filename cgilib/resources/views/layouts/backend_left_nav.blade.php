  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
<!--         <div class="pull-left image">
          <img src="{{ URL::asset('/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div> -->
<!--         <div class="pull-left info">
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> -->
      </div>
	  
   
 
      	<!-- sidebar menu: : style can be found in sidebar.less -->      
        <ul class="sidebar-menu" data-widget="tree" id = "open-coll" style="font-size:11px;">    <!-- 
            <li id="tree_three" class="treeview">
                <a href="#"><i class="fa fa-book"></i> <span>Menu Control</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu"  id="treeul_three">
                  <li><a href="{{ url('/admin/menu-list') }}"><i class="fa fa-circle-o"></i>Change Menu Name</a></li>     
                </ul>
            </li>   --> 


            <li id="tree_nine" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>ホーム設定</span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_nine">
                  <li><a href="{{ url('/admin/slider-image-entry') }}"><i class="fa fa-circle-o"></i>バーナ画像アップロード</a></li>
                  <li><a href="{{ url('/admin/slider-image-list') }}"><i class="fa fa-circle-o"></i>バーナ画像編集／削除 </a></li>
                  <li><a href="{{ url('/admin/logo-edit/'.$id=1) }}"><i class="fa fa-circle-o"></i>ロゴ変更 </a></li>
                  <li><a href="{{ url('/admin/logo-edit/'.$id=6) }}"><i class="fa fa-circle-o"></i>会社住所 </a></li>
                  <li><a href="{{ url('/admin/newsfeed-entry') }}"><i class="fa fa-circle-o"></i> 新着情報入力 </a></li>
                  <li><a href="{{ url('/admin/newsfeed-list') }}"><i class="fa fa-circle-o"></i> 新着情報一覧  </a></li>
                </ul>
            </li>  

            <li id="tree_nine" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>カテゴリー設定</span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_nine">
                  <li><a href="{{ url('/admin/catagory-entry') }}"><i class="fa fa-circle-o"></i>カテゴリー追加</a></li>
                  <li><a href="{{ url('/admin/catagory-list') }}"><i class="fa fa-circle-o"></i>カテゴリー編集／削除  </a></li>
                </ul>
            </li>  
            
            <li>
                <a href="{{ url('/admin/order-date-range') }}">
                  <i class="fa fa-envelope"></i> <span>配信日設定</span>
                </a>
            </li> 
            

            <li id="tree_nine" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>商品設定</span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_nine">
                 <li><a href="{{ url('/admin/product-entry') }}"><i class="fa fa-circle-o"></i>商品追加</a></li>
                  <li><a href="{{ url('/admin/product-list') }}"><i class="fa fa-circle-o"></i>商品編集／削除</a></li>
                </ul>
            </li> 
            
<!--             <li id="tree_nine" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span> その他設定 </span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_nine">
                  <li><a href="{{ url('/admin/otherpage-edit/1') }}"><i class="fa fa-circle-o"></i> 会社について</a></li>
                   <li><a href="{{ url('/admin/otherpage-edit/2') }}"><i class="fa fa-circle-o"></i>Contact Us </a></li> 
                </ul>
            </li>  -->
            
            

            <li id="tree_nine" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>メンバー管理</span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_nine">
                  <li><a href="{{ url('/admin/member-list') }}"><i class="fa fa-circle-o"></i>メンバー一覧</a></li>
                </ul>
            </li>             

            <li id="tree_nine" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>注文管理</span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_nine">
                  <li><a href="{{ url('/admin/order-list/0') }}"><i class="fa fa-circle-o"></i>新規注文</a></li>
                  <li><a href="{{ url('/admin/order-list/1') }}"><i class="fa fa-circle-o"></i>発注済み </a></li>
                </ul>
            </li> 

            <li id="tree_nine" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>お問い合わせ </span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_nine">
                  <li><a href="{{ url('/admin/message-list') }}"><i class="fa fa-circle-o"></i>全てのメッセージ</a></li>
                </ul>
            </li> 


            
<!--            <li id="tree_nine" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>Footer Setting </span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_nine">
                  <li><a href="{{ url('/admin/footer-edit/'.$id=2) }}"><i class="fa fa-circle-o"></i>Upper Left Box URL</a></li>
                  <li><a href="{{ url('/admin/footer-edit/'.$id=3) }}"><i class="fa fa-circle-o"></i>Upper Right Box URL</a></li>
                  <li><a href="{{ url('/admin/footer-edit/'.$id=4) }}"><i class="fa fa-circle-o"></i>Lower Left Box URL</a></li>
                  <li><a href="{{ url('/admin/footer-edit/'.$id=5) }}"><i class="fa fa-circle-o"></i>Lower Right Box URL</a></li>
                </ul>
            </li>  -->


		
<!--             <li id="tree_one" class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Member Function </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a> 
              <ul class="treeview-menu" id="treeul_one">
                <li><a href="{{ url('/admin/members-registration') }}"><i class="fa fa-circle-o"></i> 会員登録</a></li>
                <li><a href="{{ url('/admin/custom-members-registration') }}"><i class="fa fa-circle-o"></i>Custom 会員登録</a></li>
                <li><a href="{{ url('/admin/all-members-list') }}"><i class="fa fa-circle-o"></i> 会員一覧</a></li>                
              </ul>
            </li>		
  		
        		<li id="tree_two" class="treeview">
                <a href="#">
                  <i class="fa fa-folder"></i> <span>Calendar-news & report</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_two">
                  <li><a href="{{ url('/admin/calendar-event-entry') }}"><i class="fa fa-circle-o"></i>イベント作成</a></li>
                  <li><a href="{{ url('/admin/calendar-event-list') }}"><i class="fa fa-circle-o"></i>イベント一覧</a></li>
                  <li><a href="{{ url('/admin/news-entry') }}"><i class="fa fa-circle-o"></i>ニュース作成</a></li>
                  <li><a href="{{ url('/admin/news-list') }}"><i class="fa fa-circle-o"></i>ニュース一覧</a></li>               
                </ul>
            </li>
        
        
            <li id="tree_three" class="treeview">
          			<a href="#"><i class="fa fa-book"></i> <span>Description</span>
          				<span class="pull-right-container">
          				  <i class="fa fa-angle-left pull-right"></i>
          				</span>
          			</a>
          			<ul class="treeview-menu"  id="treeul_three">
          				<li><a href="{{ url('/admin/explanation-list') }}"><i class="fa fa-circle-o"></i>説明詳細</a></li>     
          			</ul>
        		</li>	
		
				
            <li id="tree_four" class="treeview">
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>ビデオ設定</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_four">
                  <li><a href="{{ url('/admin/videos-entry') }}"><i class="fa fa-circle-o"></i> ビデオアップロード</a></li>
                  <li><a href="{{ url('/admin/video-list') }}"><i class="fa fa-circle-o"></i> ビデオ一覧</a></li>
                </ul>
            </li>
		
        
        
        
            <li id="tree_five" class="treeview">
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Audio setting</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_five">
                  <li><a href="{{ url('/admin/audios-entry') }}"><i class="fa fa-circle-o"></i> Audio Upload</a></li>
                  <li><a href="{{ url('/admin/audios-list') }}"><i class="fa fa-circle-o"></i> Audio control</a></li>
                </ul>
            </li>  
          
          
          
            <li id="tree_six" class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i>
                  <span>申請一覧 </span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" id="treeul_six">
                                
                  <li><a href="{{ url('/admin/majime-terrorist-requests') }}"><i class="fa fa-circle-o"></i> 真面目なテロリスト要望</a></li>
                  <li><a href="{{ url('/admin/question-answer-request') }}"><i class="fa fa-circle-o"></i> Q&A音声質問</a></li>
                </ul>        
            </li>  
		
      
      	    <li id="tree_seven" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>コメント一覧</span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
          		  <ul class="treeview-menu" id="treeul_seven">
                      <li><a href="{{ url('/admin/blockchain-related-lecture-user-comments') }}"><i class="fa fa-circle-o"></i>ブロックチェーン講義</a></li>
                      <li><a href="{{ url('/admin/bitcoin-related-lecture-user-comments') }}"><i class="fa fa-circle-o"></i>ビットコインせどり</a></li>
                </ul>
            </li>

        		<li id="tree_eight" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>一緒に遊ぶ会員権イベント</span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
          		  <ul class="treeview-menu" id="treeul_eight">
                      <li><a href="{{ url('/admin/membership-power-feedback-entry') }}"><i class="fa fa-circle-o"></i>イベント作成</a></li>
                      <li><a href="{{ url('/admin/membership-power-feedback-list') }}"><i class="fa fa-circle-o"></i>イベント一覧</a></li>
                </ul>
            </li>      

            <li id="tree_nine" class="treeview">
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>Crazy Mindset Voice</span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
          		  <ul class="treeview-menu" id="treeul_nine">
                  <li><a href="{{ url('/admin/crazy-mindset-audio-entry') }}"><i class="fa fa-circle-o"></i>Audio Upload</a></li>
                  <li><a href="{{ url('/admin/crazy-mindset-audio-list') }}"><i class="fa fa-circle-o"></i>Audio List</a></li>
                </ul>
            </li>    
            <li id="tree_nine" >
                <a href="{{ url('/admin/test_data_up') }}">
                  <i class="fa fa-envelope"></i> <span>Image / data entry</span>
                </a>
            </li>     
            <li id="tree_nine" >
                <a href="{{ url('/admin/test_data_show') }}">
                  <i class="fa fa-envelope"></i> <span>show test data</span>
                </a>
            </li>  --> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<script>
   $(".treeview").on("click" , function(){
        var cur_url = window.location.href;
        // alert(cur_url);
   });

     
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
     return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');


</script>
