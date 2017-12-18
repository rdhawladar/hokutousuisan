
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
        @if($cat->type =="cat_1" || $cat->type =="cat_3" || $cat->type =="cat_2") 
            @php  
                $cat_title = $cat->catagory_title; 
                $cat_description = $cat->catagory_description; 
                $cat_thumbnail = URL::asset('/ecm/catagory_img/'.$cat->catagory_thumbnail_url); 
            @endphp 
                @if($i%2==1)
                <ul class="clearfix" style="float: left;">
                    <li @if($i==3) style="margin-left: 45px;" @endif >
                        <img src="{{$cat_thumbnail}}"" width="437" height="306">
                        <h3 class="catagory_sub_tit">{{ $cat_title }}</h3>
                        <p style="text-align: justify;">{{$cat_description}}</p>
                    </li>
                </ul>
                @endif
                @if($i%2==0)
                <ul class="clearfix" style="float: right;">
                    <li>
                        <img src="{{$cat_thumbnail}}" width="437" height="306"> 
                        <h3 class="catagory_sub_tit">{{ $cat_title }}</h3>
                        <p style="text-align: justify;">{{$cat_description}}</p>
                    </li>
                </ul>
                @endif
            
        @endif
      @endforeach

</section>
</div>


@endsection 


<?php //include 'footer.php' ?>