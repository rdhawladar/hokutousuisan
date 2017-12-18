
@extends('ecm.header')
 
@section('content')

          @foreach($catagory as $cat)
            @if($cat->type =="main") 
                @php  
                    $cat_title = $cat->catagory_title; 
                    $cat_description = $cat->catagory_description; 
                    $cat_banner = URL::asset('/ecm/catagory_img/'.$cat->catagory_banner_url); 

                @endphp 
            @endif
          @endforeach


<!-- ページタイトル画像▼ -->
<h2 class="about_page_tit" style="background: url({{ $cat_banner }});  background-repeat: no-repeat;" title="{{ $cat_title }}">{{ $cat_title }}</h2>
<!-- ページタイトル画像▲ -->

<!-- コンテンツ枠 920px▼ -->
<div id="k_cnt_wp" class="clearfix">

<section class="factory03">
    <h3 class="catagory_tit">{{ $cat_title }}</h3>
    <div>
        <p style="text-align: justify;"> {{ $cat_description }}</p>
    </div>

    <br><br>

      @foreach($catagory as $i => $cat)
        @if($cat->parent_type !="cat"  && $cat->parent_type !="main") 
            @php  
                $cat_title = $cat->catagory_title; 
                $cat_description = $cat->catagory_description; 
                $cat_thumbnail = URL::asset('/ecm/catagory_img/'.$cat->catagory_thumbnail_url); 
            @endphp 
                <ul style="float: left;width: 90%; padding: 26px 0px ; margin-left: 45px;border-bottom: .5px solid #555;" >
                    <li style="margin-left: 0px; float: left;padding: 0px;">
                        <a href="{{ url('/ecm/pro-details/'.$cat->id) }}">
                            <img src="{{$cat_thumbnail}}"" width="300" height="200" style="width: 300px; height: 200px;">
                        </a>
                    </li>
                    <li  style="float: right; padding: 0px 0px; width: 465px;">
                        <a href="{{ url('/ecm/pro-details/'.$cat->id) }}">
                            <h3 class="catagory_sub_tit">{{ $cat_title }} </h3>
                        </a>
                        <p style="text-align: justify;">{{ substr($cat_description, 0, 400) }} 
                            <a href="{{ url('/ecm/pro-details/'.$cat->id) }}" style="color: #E0B338;">もっと見る。。</a>
                        </p> 
                        <br>
                        <a href="#">
                            <button class="cart" type="submit" style="background: url({{ URL::asset('/ecm/img/cart.png') }});"> </button> 
                        </a>
                    </li>
                </ul>           
        @endif
      @endforeach

</section>
</div>


@endsection 


<?php //include 'footer.php' ?>