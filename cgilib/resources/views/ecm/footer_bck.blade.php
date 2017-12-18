


<!-- フッタ▼ -->

<h3 class="about_tit01"></h3>
<div id="footer_wp">
    <footer id="kasou_footer">
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

        <h2 class="kasou_f_logo"><a href="../" style="background: url({{ $logo_url }}); background-size: 120px 57px;  background-repeat: no-repeat;" title="{{ $logo_title }}">Company Name for logo</a></h2>
        
        <div style="bottom: 8px;
    position: absolute;">
            {!! $address !!} 
        </div>
        <!-- <h3 class="kasou_f_btn"><a href="../contact/" title="お問い合わせ" class="ov_f">お問い合わせ</a></h3>
 -->


    <style type="text/css">
        .button-one{
                float: right;
                background: #000;
                /* color: #000 !important; */
                margin-left: 50px;
                width: 181px;
                height: 45px;
                margin-top: 25PX;
                border-radius: 7px;
                border: 1px solid #fff;
        }

            .button-two{
             float: right;
                background: #000;
                /* color: #000 !important; */
                margin-left: 50px;
                width: 181px;
                height: 45px;
                margin-top: 20PX;
                border-radius: 7px;
                border: 1px solid #fff;
        }
        .button-one a, .button-two a{ color: #fff; font-size:  text-decoration: underline; font-size: 14px; font-weight: bold;}
    </style>
        <div>
            <button class="button-one"> <a href="{{ $ur }}" target="_blank"> サイトポリシー  </a></button>
            <button class="button-one"> <a href="{{ $ul }}" target="_blank">  サイトマップ  </a></button>
           
        </div>
        <div style="margin-left: 402px;">
             <button class="button-two"> <a href="{{ $lr }} " target="_blank"> 個人情報保護  </a></button>
            <button class="button-two"> <a href="{{ $ll }}" target="_blank">特定商取引  </a></button>
            
        </div>
    </footer>
    <div id="copy">Copyright &copy; All rights reserved</div>
</div>
<!-- フッタ▲ -->