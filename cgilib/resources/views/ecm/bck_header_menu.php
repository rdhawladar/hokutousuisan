
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>マルフジ株式会社</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!--CSS-->
    <link rel="stylesheet" href="{{ URL::asset('/ecm/css/mystyle.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ URL::asset('/ecm/css/import.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ URL::asset('/ecm/css/kasou.css') }}" type="text/css" media="screen" />

</head>

<style type="text/css">
    a {
    --color: red;
    }
</style>

<body style="background: #000;">
        @foreach($logo as $s)
            @if ($s->id == 1)
                @php                
                       $logo_title =  $s->logo_title;
                       $logo_url = URL::asset('/ecm/slider_img/'.$s->logo_url);
                @endphp 
            @endif
        @endforeach



        <!-- catagory name defining -->

        
          @foreach($catagory as $cat)
            @if($cat->type =="cat_1") @php $cat_1 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="cat_2") @php $cat_2 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="cat_3") @php $cat_3 = $cat->catagory_title; @endphp @endif

            @if($cat->type =="sub_11") @php $sub_11 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_12") @php $sub_12 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_13") @php $sub_13 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_14") @php $sub_14 = $cat->catagory_title; @endphp @endif

            @if($cat->type =="sub_21") @php $sub_21 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_22") @php $sub_22 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_23") @php $sub_23 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_24") @php $sub_24 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_25") @php $sub_25 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_26") @php $sub_26 = $cat->catagory_title; @endphp @endif

            @if($cat->type =="sub_31") @php $sub_31 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_32") @php $sub_32 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_33") @php $sub_33 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_34") @php $sub_34 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_35") @php $sub_35 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_36") @php $sub_36 = $cat->catagory_title; @endphp @endif
            @if($cat->type =="sub_37") @php $sub_37 = $cat->catagory_title; @endphp @endif
          @endforeach



    <p>&nbsp;</p>
    <div id="wrapper" ><!--  repeat-x #000 -->
        <header id="kasou_header">
        <h1 class="k_h_logo" ><a href="{{ url('/') }}" style="background: url({{ $logo_url }}); background-size: 114px 61px;  background-repeat: no-repeat;" title="{{ $logo_title }}"> {{ $logo_title }} </a></h1>


        <nav id="kasou_nav"><!-- Gナビ部分ここから -->
        	 <ul class="mainnav">
                        <li><a href="{{ url('/') }}">
                                @foreach($menu as $m)
                                    @if($m->id == 1)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach
                            </a>
                        </li>
                        <li ><a @if(Request::path() == 'ecm/otherpage/1') style="color: #E0B338;" @endif href="{{ url('/ecm/otherpage/1') }}">
                                 @foreach($menu as $m)
                                    @if($m->id == 2)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach
                            </a>
                        </li>
                        <li class="sub-menu hassubs">
                            <a @if(Request::path() == 'ecm/catagory') style="color: #E0B338;" @endif href="{{ url('/ecm/catagory') }}">
                                @foreach($menu as $m)
                                    @if($m->id == 3)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach                            
                            </a>

                            <ul class="dropdown">

                                <li class="sub-menu subs hassubs"><a href="{{ url('/ecm/catagory/'.$type='cat_1' )}}">{{ $cat_1}}</a>
                                    <ul class="dropdown">
                                        <li class="subs"><a href="#">{{ $sub_11}}</a></li>
                                        <li class="subs"><a href="#">{{ $sub_12}}</a></li>
                                        <li class="subs"><a href="#">{{ $sub_13}}</a></li>
                                        <li class="subs"><a href="#">{{ $sub_14}}</a></li>
                                    </ul>
                                </li>
                                <li class="sub-menu subs hassubs"><a href="{{ url('/ecm/catagory/'.$type='cat_2' )}}">{{ $cat_2}}</a>
                                    <ul class="dropdown">
                                        <li class="subs"><a href="#">{{ $sub_21}}</a></li>
                                        <li class="subs"><a href="#"> {{ $sub_22}}</a></li>
                                        <li class="subs"><a href="#">{{ $sub_23}}</a></li>
                                        <li class="subs"><a href="#">明太子</a></li>
                                        <li class="subs"><a href="#">味付け数の子</a></li>
                                        <li class="subs"><a href="#">塩数の子</a></li>
                                    </ul>
                                </li>
                                <li class="sub-menu subs hassubs"><a href="{{ url('/ecm/catagory/'.$type='cat_3' )}}">{{ $cat_3}}</a>
                                    <ul class="dropdown">
                                        <li class="subs"><a href="#">{{ $sub_31}}</a></li>
                                        <li class="subs"><a href="#">{{ $sub_32}}</a></li>
                                        <li class="subs"><a href="#">{{ $sub_33}}</a></li>
                                        <li class="subs"><a href="#"> 縞ホッケ開き一夜干し</a></li>
                                        <li class="subs"><a href="#">きんき(きちじ)一夜干し</a></li>
                                        <li class="subs"><a href="#">サーモン刺身</a></li>
                                        <li class="subs"><a href="#">サイトについて</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a  @if(Request::path() == 'ecm/otherpage/2') style="color: #E0B338;" @endif href="{{ url('/ecm/otherpage/2') }}">
                                @foreach($menu as $m)
                                    @if($m->id == 4)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach                            
                            </a>
                        </li>
                        <li><a href="{{ url('/ecm/login') }}">
                                @foreach($menu as $m)
                                    @if($m->id == 5)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach                            
                            </a>
                        </li>
                        <li><a href="#">
                                @foreach($menu as $m)
                                    @if($m->id == 6)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach                            
                            </a>
                        </li>
                    </ul>
                    <br style="clear: both;">
        </nav><!-- Gナビ部分ここまで -->
        </header>
</div>
   @yield('content')
   @extends('ecm.footer')
    <!--javascript-->
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

$('.sub-menu ul').hide();
$(".sub-menu a").mouseover(function () {
  $(this).parent(".sub-menu").children("ul").slideToggle("20");
  $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

</script>
</body>
</html>