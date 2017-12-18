
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   

    <title>ホクトウ水産</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

  <script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>



    <!--CSS-->
    <link rel="stylesheet" href="{{ URL::asset('/ecm/css/import.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ URL::asset('/ecm/css/bootstrap.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ URL::asset('/ecm/css/labs.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ URL::asset('/ecm/css/mobile_menu.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ URL::asset('/ecm/css/mystyle.css') }}" type="text/css" media="screen" />
    
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

            var style = function(css) {
                var e = document.createElement('style');
                if(e.styleSheet){
                    e.styleSheet.cssText = css;
                } else {
                    e.appendChild(document.createTextNode(css));
                }
                document.getElementsByTagName('head')[0].appendChild(e);
            }

            var toggleDisplay=function(el,display,class_el){
                var EL=document.querySelector(el);
                if(EL.style.display==display){
                    EL.style.display="none";
                    if(class_el)EL.classList.add(class_el);
                }else{
                    EL.style.display=display;
                    if(class_el)EL.classList.add(class_el);
                }
            };

            // multilevel dropdown control
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
    <link rel="stylesheet" href="mobile_menu.css">

    <style type="text/css">
        a {
        --color: red;
        }
        .sumary{ 
            float: right;
            border: 2px solid #fff;
            padding: 8px;
            background: #333;
            border-radius: 7px;
         }

        @media screen and (max-width: 768px) 
        {
            .desktop-menu{
                display:none;
            }        
            .mobile-menu{
                display:block;
                width: 98%;
            }
            .cat-row{ text-align: center; }
            .pro ul{ text-align: center; margin-top: 0%; }
            .pro div{height: 175px;}
        }
        @media screen and (min-width: 768px) 
        {
            .desktop-menu{
                display:none;
            }        
            .mobile-menu{
                display:block;
            }
            #menu ul{ background: none; }
        }
    </style>      
    <script type="text/javascript" src="{{ URL::asset('/ecm/js/jquery-1.7.1.min.js') }}"></script>
</head>
<body style="background: #000; margin: 0 auto;" >
    @foreach($logo as $s)
        @if ($s->id == 1)
            @php                
                   $logo_title =  $s->logo_title;
                   $logo_url = URL::asset('/ecm/slider_img/'.$s->logo_url);
            @endphp 
        @endif
    @endforeach     
       
       @include('ecm.head')
        <div style="min-height: 520px; color: #fff;">
            <br><br>
            @yield('content')
            <br><br>
        </div>
       @include('ecm.footer')

    <!--javascript-->

    <script type="text/javascript" src="{{ URL::asset('/ecm/js/smoothScroll.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <!-- <script type="text/javascript" src="{{ URL::asset('/ecm/js/jquery.js') }}"></script>   -->  
    <script type="text/javascript" src="{{ URL::asset('/ecm/js/bootstrap.bundle.js') }}"></script>    
    <script type="text/javascript" src="{{ URL::asset('/ecm/js/jquery-1.7.1.min.js') }}"></script>
</body>
</html>