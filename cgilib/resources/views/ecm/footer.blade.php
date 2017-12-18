
        @foreach($logo as $s)
            @if ($s->id == 1)
                @php                
                       $logo_title =  $s->logo_title;
                       $logo_url = URL::asset('/ecm/slider_img/'.$s->logo_url);
                @endphp 
            @endif
            @if ($s->id == 2)
                @php                
                       $footer1_title =  $s->logo_title;
                       $footer1_url = URL::asset('/ecm/slider_img/'.$s->logo_url);
                @endphp 
            @endif      
            @if ($s->id == 3)
                @php                
                       $footer2_title =  $s->logo_title;
                       $footer2_url = URL::asset('/ecm/slider_img/'.$s->logo_url);
                @endphp 
            @endif
            @if ($s->id == 4)
                @php                
                       $footer3_title =  $s->logo_title;
                       $footer3_url = URL::asset('/ecm/slider_img/'.$s->logo_url);
                @endphp 
            @endif
        @endforeach 

        @foreach($footer as $d)
            @if ($d->id == 1) @php $address =  $d->footer_data; @endphp @endif
            @if ($d->id == 2) @php $ul =  $d->footer_data; @endphp @endif
            @if ($d->id == 3) @php $ur =  $d->footer_data; @endphp @endif
            @if ($d->id == 4) @php $ll =  $d->footer_data; @endphp @endif
            @if ($d->id == 5) @php $lr =  $d->footer_data; @endphp @endif
            
        @endforeach 




    <style type="text/css">
        .flink a{ color: #fff; font-size: 10px; }
        .flink{ padding: 18px; }
        .flink p{margin: 0; }
        .flink a:hover{ color: #999; text-decoration: none; }
        .copy-right{font-size: 12px; width: 100%; text-align: center; font-family: "ヒラギノ明朝 Pro W3","Hiragino Mincho ProN","HGS明朝E","ＭＳ Ｐ明朝",serif; line-height: 20px; color: #777;}
    </style>


<!-- Footer -->

<!--Footer-->
<footer class="container page-footer center-on-small-only">
    <!--Footer Links-->
    <div class="container-fluid" style="background: url( {{ URL::asset ('/ecm/img/footer_bg.jpg') }} ); background-repeat: no-repeat; background-size: cover;">
        <div class="row">
            <!--First column-->
            <div class="col-lg-10 flink">
                <ul>
<!--                     <li><a href="#!">サイトポリシー  </a></li>
                    <li><a href="#!">サイトマップ  </a></li> -->
                    <li><a href= "{{url('/privacy-protection')}}" > 個人情報保護  </a></li>
                    <li><a href="{{url('/com-transaction')}}">特定商取引  </a></li>
                    <li><a href="{{url('/about-us')}}">会社について </a></li>
                    <li><a href="{{url('/about-delivery-fee')}}" >送料について </a></li>
                </ul>
            </div>            
            <!--/.First column-->
            <!--Second column-->

            <div class="col-lg-2 pull-right flink" >
                <script type="text/javascript">TrustLogo("{{ URL::asset('/ecm/img/ssl1.png') }}", "CL1", "none"); </script> 
                  <!-- http://hokutousuisan.com/ecm/img/tl.jpg", "CL1", "none"); -->
            </div>
            <!--/.Second column-->           
        </div>
    </div>
    <!--/.Footer Links-->
    <!--Copyright-->
    <div class="footer-copyright copy-right">
        <div class="container-fluid">Copyright &copy; All rights reserved </div>
    </div>
    <!--/.Copyright-->
</footer>
<!--/.Footer-->


