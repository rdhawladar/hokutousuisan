
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>竹丸渋谷水産 株式会社</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--CSS-->
	<link rel="stylesheet" href="{{ URL::asset('/ecm/css/import.css') }}" type="text/css" media="screen" />
	<link rel="stylesheet" href="{{ URL::asset('/ecm/css/theme.css') }}" type="text/css" media="screen" />
	<link rel="stylesheet" href="{{ URL::asset('/ecm/css/nivo-slider.css') }}" type="text/css" media="screen" />
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
	</style>
	<!-- <link rel="EditURI" type="http://www.kojohama.com/application/rsd+xml" title="RSD" href="http://www.kojohama.com/xmlrpc.php?rsd" />
	<link rel="wlwmanifest" type="http://www.kojohama.com/application/wlwmanifest+xml" href="http://www.kojohama.com/wp-includes/wlwmanifest.xml" /> 
	<meta name="generator" content="WordPress 4.2.16" /> -->

	<style>
	.vertical-menu {
	    /*width: 200px;*/
	    transform: rotate(90deg);
	    margin-top: 16%;
	}

	.vertical-menu a {
	/*    background-color: #eee;
	    color: black;*/
	    width: 38%;
	    display: block;
	    padding: 5px;
	    text-decoration: none;
	}

	/*.vertical-menu a:hover {
	    background-color: #ccc;
	}*/

	.vertical-menu a.active {
	   /* background-color: #4CAF50;*/
	    color: #dfb338;
	}
	</style>
</head>
<body>
<!-- <h1>test : <br>
	{{ URL::asset('/ecm/slider_img/') }} test
	@foreach($slider as $s)
		           <img src ="{{ URL::asset('/ecm/slider_img/'.$s->slider_url) }}" >,  {{ $s-> slider_title}}	<br>
	           	@endforeach 
</h1> -->
	<div id="wrapper">

	<!-- コンテンツ枠ここから 960px -->
	<div id="top_cnt_wp" class="clearfix">



	<!-- トップAjax▼ -->
	<div id="top_ajax_wp">
	  <div class="slider-wrapper theme-default">
	      <div id="slider" class="nivoSlider">
	      	@foreach($slider as $s)
		           <img src ="{{ URL::asset('/ecm/slider_img/'.$s->slider_url) }}" >
	        @endforeach 
	        <!-- <img src="http://www.kojohama.com/img/ajax/top_01.jpg">
	        <img src="http://www.kojohama.com/img/ajax/top_02.jpg">
	        <img src="http://www.kojohama.com/img/ajax/top_03.jpg">
	        <img src="http://www.kojohama.com/img/ajax/top_04.jpg">
	        <img src="http://www.kojohama.com/img/ajax/top_03.jpg"> -->
	      </div>
	  </div>
	</div>
	<!-- トップAjax▲ -->


	<!-- ヘッダ・ライトナビ▼ -->
	<div id="header_wp">
	<!-- ヘッダ▼ -->
	<header id="hader_wp2">
		@foreach($logo as $s)
			@if ($s->id == 1)
				@php				
			           $logo_title =  $s->logo_title;
			           $logo_url = URL::asset('/ecm/slider_img/'.$s->logo_url);
			    @endphp 
		    @endif
        @endforeach 
	<h1 class="top_logo" ><a href="./home" title="{{ $logo_title }}" style="background: url({{$logo_url}});">{{ $logo_title }}</a></h1>
	<img src="http://www.kojohama.com/img/top_img_01.png" class="logo_sita_img">

	<h2 class="header_text01">虎杖浜の最高級たらこ</h2>
	<h4 class="header_text02">虎杖浜が生んだ最高級のたらこ<br>この逸品をぜひ一度ご賞味ください。</h4>


	<img src="http://www.kojohama.com/img/line_01.png" width="300" height="3" class="nav_line_01">
	<nav id="top_nav"><!-- Gナビ部分ここから -->
		<ul class="vertical-menu" >
		  <a href="{{ url('/') }}" class="active">          
			  	@foreach($menu as $m)
		           	@if($m->id == 1)
		           	{{ $m->menu_title}}
		           	@endif		
	           	@endforeach
          </a>
		  <a href="{{ url('/ecm/home') }}"> 
		  		@foreach($menu as $m)
		           	@if($m->id == 2)
		           	{{ $m->menu_title}}
		           	@endif		
	           	@endforeach
		  </a>
		  <a href="{{ url('/ecm/catagory') }}">
		  		@foreach($menu as $m)
		           	@if($m->id == 3)
		           	{{ $m->menu_title}}
		           	@endif		
	           	@endforeach
		  </a>
		  <a href="{{ url('/ecm/concept') }}">
		  		@foreach($menu as $m)
		           	@if($m->id == 4)
		           	{{ $m->menu_title}}
		           	@endif		
	           	@endforeach
		  </a>
		  <a href="#">
		  		@foreach($menu as $m)
		           	@if($m->id == 5)
		           	{{ $m->menu_title}}
		           	@endif		
	           	@endforeach
		  </a>
		  <a href="{{ url('/ecm/login') }}">
		  		@foreach($menu as $m)
		           	@if($m->id == 6)
		           	{{ $m->menu_title}}
		           	@endif		
	           	@endforeach
		  </a>
		</ul>
	</nav><!-- Gナビ部分ここまで -->


	<!-- <nav id="top_nav"> --><!-- Gナビ部分ここから -->
	<!-- 	<ul>
			<dd id="navi01" style="transform: rotate(-90deg);"><a style="transform: rotate(-90deg);" href="#" title="採用情報"><h3>testing</h3></a></dd>
			<dd id="navi02" style="transform: rotate(-90deg);"><a href="#" title="受賞履歴"><h3>受賞履歴</h3></a></dd>
			<dd id="navi03" style="transform: rotate(-90deg);"><a href="#" title="製造工程"><h3>製造工程</h3></a></dd>
			<dd id="navi04" style="transform: rotate(-90deg);"><a href="#" title="商品紹介"><h3>商品紹介</h3></a></dd>
			<dd id="navi05" style="transform: rotate(-90deg);"><a href="concept.php" title="会社概要"><h3>会社概要</h3></a></dd>
			<dd id="navi07on" style="transform: rotate(-90deg);"><a href="./" title="トップページ"><h3>トップページ</h3></a></dd>
		</ul> -->
	<!-- </nav> --><!-- Gナビ部分ここまで -->





	<img src="http://www.kojohama.com/img/line_01.png" width="300" height="3" class="nav_line_02">

	<div id="header_img_01"><img src="http://www.kojohama.com/img/top_img_02.jpg" width="80" height="80"></div>
	<h3 class="header_img_02">虎杖浜から「おいしい」を届けます。</h3>
	</header>
	<!-- ヘッダ▲ -->
	</div>
	<!-- ヘッダ・ライトナビ▲ -->

	<br clear="all">
	</div>
	<!-- コンテンツ枠ここまで 960px -->

	<!-- 新着情報など枠▼ -->
	<div id="info_wp">
	<div id="info_wp2">

	<!-- 新着情報▼ -->
	<h2 class="top_info_tit">新着情報</h2>
	<div class="top_info_list_wp">
	<dl class="top_info_list"><dt>2015.09.29</dt><dd><a href="#" title="秋の渋谷水産フェアーを開催します。" class="ov_f">秋の渋谷水産フェアーを開催します。</a></dd></dl>
	<dl class="top_info_list"><dt>2014.02.25</dt><dd><a href="#" title="厚生労働大臣賞受賞" class="ov_f">厚生労働大臣賞受賞</a></dd></dl>
	<dl class="top_info_list"><dt>2012.08.15</dt><dd><a href="#" title="竹丸渋谷水産フェア開催します！" class="ov_f">竹丸渋谷水産フェア開催します！</a></dd></dl>
	</div>
	<!-- 新着情報▲ -->

	<!-- 住所など▼ -->
	<div class="top_ad">
	<h2>竹丸渋谷水産株式会社</h2>
	<address>〒059-0641北海道白老郡白老町字虎杖浜179番地の5<br>
	TEL / 0144-87-2433</address>
	</div>
	<a href="#" title="お問い合わせ"><img src="http://www.kojohama.com/img/top_img_04.png" width="80" height="20" class="top_contact_btn ov_f"></a>
	<!-- 住所など▲ -->
	</div>
	</div>
	<!-- 新着情報など枠▲ -->
<!-- 
	<footer id="top_footer">
	<h3 class="top_bnr_01"><a href="http://shibuyasuisan.com/" target="_blank" title="お買い物はこちらから" class="ov_f">竹丸渋谷水産 オンラインショップ「お買い物はこちら」</a></h3>
	<p class="top_bnr_01_text">ご贈答品からご自宅用まで、虎杖浜より美味しさとこだわりをお届けします。</p>

	<h3 class="top_bnr_02"><a href="./process/" title="竹丸渋谷水産の工場見学" class="ov_f">竹丸渋谷水産の工場見学</a></h3>

	<h3 class="top_bnr_03">安心安全の証「北海道HACCP」</h3>
	<p class="top_bnr_03_text">北海道HACCPの8段階評価で最高の8を取得しました。</p>

	<h3 class="top_bnr_04"><a href="./chart/" title="商品カルテ" class="ov_f">商品カルテ</a></h3>
	<h3 class="top_bnr_05"><a href="http://ameblo.jp/takemarushibuya/" title="渋谷部長のブログ" class="ov_f" target="_blank">渋谷部長のブログ</a></h3>
	<h3 class="top_bnr_06"><a href="https://ja-jp.facebook.com/takemarushibuyasuisan" title="facebook" class="ov_f" target="_blank">facebook</a></h3>
	</footer>
	<div id="copy">Copyright &copy; Excel Company Limited All rights reserved</div> -->

	</div>

@extends('ecm.footer')

<!--javascript________________________________________________________________________________ -->
<script type="text/javascript" src="{{ URL::asset('/ecm/js/jquery-1.7.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/ecm/js/smoothScroll.js') }}"></script>
<!-- HTML5 IE対策 IE7までOK -->

<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/ie7-squish.js"></script>
<![endif]-->

<!-- ロールオーバー透過用JS -->
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
<script type="text/javascript" src="{{ URL::asset('/ecm/js/jquery.nivo.slider.js') }}"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"http:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/www.kojohama.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.2.16"}};
			!function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
</script>


</body>
</html>

