@foreach($logo as $s)
	@if ($s->id == 1)
		@php				
	           $logo_title =  $s->logo_title;
	           $logo_url = URL::asset('/ecm/slider_img/'.$s->logo_url);
	    @endphp 
    @endif

	@if ($s->id == 6)
		@php				
	           $address =  $s->logo_title;
	           $bottom_url = URL::asset('/ecm/slider_img/'.$s->logo_url);
	    @endphp 
    @endif
@endforeach 

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, shrink-to-fit=no">   	
	<title>ホクトウ水産</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--CSS-->

	<link rel="stylesheet" href="{{ URL::asset('/ecm/css/import.css') }}" type="text/css" media="screen" />
	<link rel="stylesheet" href="{{ URL::asset('/ecm/css/theme.css') }}" type="text/css" media="screen" />
	<link rel="stylesheet" href="{{ URL::asset('/ecm/css/mystyle.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ URL::asset('/ecm/css/bootstrap.css') }}" type="text/css" media="screen" />	    
	<link rel="stylesheet" href="{{ URL::asset('/ecm/css/nivo-slider.css') }}" type="text/css" media="screen" />
    <script language="javascript" type="text/javascript">
        
        // SSL Gateway Start    <![CDATA[
        var cvc_loc0=(window.location.protocol == "https:")? "https://secure.comodo.net/trustlogo/javascript/trustlogo.js" :
        "http://www.trustlogo.com/trustlogo/javascript/trustlogo.js";
        document.writeln('<scr' + 'ipt language="JavaScript" src="'+cvc_loc0+'" type="text\/javascript">' + '<\/scr' + 'ipt>');
                var script = function(src) {
                    var e = document.createElement('script');
                    e.async = true;
                    e.src = src;
                    document.getElementsByTagName('head')[0].appendChild(e);
                };
        // SSL Gateway ENDs
    </script>	
	<style type="text/css">

		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}

		body{padding: 0px; background: #000; margin: 0 auto; height: auto;}

		.home-text-menu{  }
		.home-text-menu li {     list-style: none; width: 90%;padding: 5px;text-align: center;margin: 0 auto; margin-bottom: 1px;}
		.home-text-menu li a{ color: #fff; text-decoration: none; }
		.home-text-menu li a:hover{color: #e68801;}
}
		
		.vertical-menu {
		    width: 75px;
		    transform: rotate(180deg);
		    margin-top: -45%;
		    margin-left: 40%;
		    /* border-left: 2px solid white; */
		    /* margin-left: 5px; */
		    padding-left: 32px;

		}

		.vertical-menu a {
	    width: 37%;
	    display: block;
	    padding: 65px 14px 45px 18px;
	    text-decoration: none;
	    margin-top: -63px;
	    transform: rotate(270deg);
		}
		.myinfo{
			height: 100px;
		    filter: progid:DXImageTransform.Microsoft.gradient(startcolorstr=#b24b4b4b, endcolorstr=#b24b4b4b, gradienttype=1);
		    background-color: rgba(75, 75, 75, 0.5);
		    position: absolute;
		    z-index: 10;
		    width: 960px;
		}		

		.slider-text{z-index: 6; font-size: 20px; width: 100%; margin-top: 2%; top: 0; left: 0; position: absolute;}
		.slider-text h1{font-size: 20px; width: 85%; text-align: center;padding: 14px; color: #fff;margin: 0 auto; background-color: rgba(75, 75, 75, 0.5);}
		.home-footer{margin-top: 300px;}
            .top-logo{height: 155px;background: url({{ $logo_url }});background-repeat: no-repeat;margin-left: 16%;margin-top: 15%;    background-size: 80% 90%;}		



        @media screen and (max-width: 990px) 
        {
            .slider-text h1{ font-size: 16px; width: 95%;}        	
        }        
	
        @media screen and (max-width: 768px) 
        {
        	.home-text-menu{  }
        	.home-text-menu li { padding: 2px; }
            .top_ajax_wp{height: 350px; margin: 0 auto;}
            .slider-wrapper{height: 350px;}
            .nivoSlider{height: 350px;}
            .top_ajax_wp{width: 100%;}
            .slider-text{top:265px;}
            .slider-text h1{ font-size: 18px; width: 70%; padding: 10px 0px; font-weight: bold;}
            .left-cat a { font-size: 20px; }
            .left{margin-top: -25px;}
            .right{margin-top: 20px;}
            .top-logo{ background-size: 100% 90%;}


        }
        @media screen and (max-width: 520px) 
        {
            .slider-text h1{ font-size: 15px; width: 93%; padding: 10px 0px; font-weight: bold;}
        }  
		.nav-link{background-repeat: no-repeat; background-size: 40px;padding: 55px 18px; width: 30px; margin-right: 8px; }        
</style>


</head>
<body>




<div class="container home-body" style="height: 750px;">
	<div id="top_cnt_wp" class="clearfix">
		<div id="header_wp" style="background: url( {{ URL::asset ('/ecm/img/side_bg.jpg') }} ); background-size: 100% auto; background-repeat: no-repeat;">
			<header id="hader_wp2"   >
				<!-- <h1 class="top_logo" ></h1> -->
				<div style="" class="top-logo"></div>
				
				<nav class="navbar navbar-light navbar-expand-sm" style="width: 230px;margin: 0 auto;margin-bottom: 100px;border-top: 1px solid #fff;">
<!-- 				    <ul class="nav navbar-nav">
				        <li class="nav-item"><a class="nav-link"  href="{{ url('/user/panel') }}" onmouseover="this.style.background='url( {{ URL::asset ('/ecm/img/menu5g.png') }} )';"  onmouseout="this.style.background='url( {{ URL::asset ('/ecm/img/menu5.png') }} )';" style= "background: url( {{ URL::asset ('/ecm/img/menu5.png') }} );"></a>
				        </li>
				        <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}"  onmouseover="this.style.background='url( {{ URL::asset ('/ecm/img/menu4g.png') }} )';"  onmouseout="this.style.background='url( {{ URL::asset ('/ecm/img/menu4.png') }} )';" style= "background: url( {{ URL::asset ('/ecm/img/menu4.png') }} );"></a>
				        </li>
				        <li class="nav-item"><a class="nav-link" href="{{ url('/catagory/0') }}"  onmouseover="this.style.background='url( {{ URL::asset ('/ecm/img/menu3g.png') }} )';"  onmouseout="this.style.background='url( {{ URL::asset ('/ecm/img/menu3.png') }} )';" style= "background: url( {{ URL::asset ('/ecm/img/menu3.png') }} );"></a>
				        </li>
				        <li class="nav-item"><a class="nav-link" ref="{{ url('/home') }}" href="{{ url('/home') }}" style= "background: url( {{ URL::asset ('/ecm/img/menu1g.png') }} );"></a>
				        </li>
				    </ul> -->
					<ul class="nav navbar-nav home-text-menu" style="margin-left: 7px; ">
						<li class="nav-item"><a class="" href="{{ url('/home') }}">ホーム </a></li>
						<li class="nav-item"><a class="" href="{{ url('/catagory/0') }}">商品カテゴリー</a></li>
						<li class="nav-item"><a class="" href="{{ url('/contact') }}">お問い合わせ</a></li>
						<li class="nav-item"><a class="" href="{{ url('/user/panel') }}">マイページ</a></li>
					</ul>
				</nav>		
	            <div class="cart-icon home-cart-icon"  style=" "> 
	                 <a href="{{ url('/my-cart') }}">
	                    @if($total['tquantity'] >0 )
	                        <span>{{ $total['tquantity'] }}</span>
	                    @endif
	                 	<img src="{{URL::asset('/ecm/img/cart_icon.png')}}"> 
	                 </a>
	                 <p><a href="{{ url('/my-cart') }}">カートを見る</a></p>
	            </div>				
			     <!--  <ul class="vertical-menu" >

						  <a id="m1" class="active menu-control" ref="{{ url('/home') }}" href="{{ url('/home') }}" style= "background: url( {{ URL::asset ('/ecm/img/menu1g.png') }} );background-repeat: no-repeat; background-size: 40px;" > 
						  </a>
						  <a id="m2" class="menu-control"  href="#"  onmouseover="this.style.background='url( {{ URL::asset ('/ecm/img/menu2g.png') }} )';"  onmouseout="this.style.background='url( {{ URL::asset ('/ecm/img/menu2.png') }} )';" style= "background: url( {{ URL::asset ('/ecm/img/menu2.png') }} );background-repeat: no-repeat; background-size: 40px;">
						  </a>
						  <a id="m3" class="menu-control" href="{{ url('/catagory/0') }}"  onmouseover="this.style.background='url( {{ URL::asset ('/ecm/img/menu3g.png') }} )';"  onmouseout="this.style.background='url( {{ URL::asset ('/ecm/img/menu3.png') }} )';" style= "background: url( {{ URL::asset ('/ecm/img/menu3.png') }} );background-repeat: no-repeat; background-size: 40px;">
						  </a>
						  <a id="m4" class="menu-control" href="{{ url('/contact') }}"  onmouseover="this.style.background='url( {{ URL::asset ('/ecm/img/menu4g.png') }} )';"  onmouseout="this.style.background='url( {{ URL::asset ('/ecm/img/menu4.png') }} )';" style= "background: url( {{ URL::asset ('/ecm/img/menu4.png') }} );background-repeat: no-repeat; background-size: 40px;">
						  </a>
						  <a id="m5" class="menu-control" href="{{ url('/user/panel') }}"  onmouseover="this.style.background='url( {{ URL::asset ('/ecm/img/menu5g.png') }} )';"  onmouseout="this.style.background='url( {{ URL::asset ('/ecm/img/menu5.png') }} )';" style= "background: url( {{ URL::asset ('/ecm/img/menu5.png') }} );background-repeat: no-repeat;background-repeat: no-repeat; background-size: 40px;">
						  </a>
					</ul> -->



<!-- 				<div class="right_portion3 home-right">
						
					<img src="{{ $bottom_url }}" width="80" height="80">
				</div> -->
				
<!-- 				<div class="right_portion4 home-right">
						{!! $address !!}
				</div>	 -->			
	
			</header>


		</div>
		<div id="top_ajax_wp">
			<div class="slider-text">
				<h1>『北海道の絶品海産物を産地直送でお送りいたします</h1>
				<h1>美味しい当地グルメを皆さまの食卓に。』</h1>
			</div>
			<div class="slider-wrapper theme-default">
			  <div id="slider" class="nivoSlider">
			      	@foreach($slider as $s)
				           <img src ="{{ URL::asset('/ecm/slider_img/'.$s->slider_url) }}" >
			        @endforeach 
			  </div>	
			</div>
		</div> 		

	</div>
	<div class="home-cat-mobile">
		<div class="left left-cat">
			<h4><a href ="{{url('/catagory/1')}}">蟹</a></h4>
			<a href ="{{url('/catagory/1')}}"><img src="{{ URL::asset('/ecm/img/cat_crab.jpg') }}" class="home-cat-img"></a>
		</div>
		<div class="left left-cat">
			<h4><a href ="{{url('/catagory/2')}}">魚</a></h4>
			<a href ="{{url('/catagory/2')}}"><img src="{{ URL::asset('/ecm/img/cat_fish.jpg') }}" class="home-cat-img"></a>
		</div>
		<div class="right left-cat">
			<h4><a href ="{{url('/catagory/4')}}">その他</a></h4>
			<a href ="{{url('/catagory/4')}}"><img src="{{ URL::asset('/ecm/img/cat_other.jpg') }}" class="home-cat-img"></a>
		</div>
		</div>
		<div class="right left-cat">
			<h4><a href ="{{url('/catagory/3')}}">魚卵</a></h4>
			<a href ="{{url('/catagory/3')}}"><img src="{{ URL::asset('/ecm/img/cat_egg.jpg') }}" class="home-cat-img"></a>
	</div>

	<div class="container" id="info_wp2">
		<div class="top_info_title">
			<h2 style="color: #fff;">新着情報</h2>
		</div>
		<div class="top_info_list_wp">				
			@foreach($newsfeed as $news)
				<dl class="top_info_list"><dt>{{ $news-> created_at }}</dt><dd><a href="{{ url('news/'.$news->id) }}" title="test title " class="ov_f">{{ $news->newsfeed_title}}</a></dd></dl>
			@endforeach
		</div> 
	</div>
	<style type="text/css">
		.left-cat,.right-cat{ width: 25%; text-align: center; height: 300px }
		.home-cat-img{ border: 2px solid #fff; width: 75%; height: 50%; border-radius: 10px;}
		.left-cat h4{color: #fff; margin-top: 50px;}
		.left-cat a{color: #fff; text-decoration: none;}
		.left-cat a:hover{color: #777; }
		.left-cat a img:hover{opacity: .5;  border-radius: 50% ;}
	</style>
</div>

<div class="home-footer">
	@extends('ecm.footer')
</div>



<!--javascript________________________________________________________________________________ -->
<script type="text/javascript" src="{{ URL::asset('/ecm/js/smoothScroll.js') }}"></script>
<script>
$(document).ready(function(){

	$('.ov_f').hover(function(){ 
		$(this).fadeTo(200,0.6); 
	},function() {
		$(this).fadeTo(800,1); 
	});
});
</script>

<!-- スライダー用JS -->
<script type="text/javascript" src="{{ URL::asset('/ecm/js/bootstrap.bundle.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('/ecm/js/jquery-1.7.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/ecm/js/jquery.nivo.slider.js') }}"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });




// hover menu change

$('#m2 a').hover(function() {
  $(this).css('background', '/ecm/img/menu3.png');
}, function() {
  $(this).attr('background', '/ecm/img/menu3g.png');
});
</script>


</body>
</html>

