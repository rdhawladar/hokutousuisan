
@extends('ecm.header')
 
@section('content')

          @foreach($page as $cat)
          @if($cat->id == $id)
                @php  
                    $cat_title = $cat->otherpage_title; 
                    $cat_description = $cat->otherpage_description; 
                    $cat_banner = URL::asset('/ecm/img/'.$cat->otherpage_banner_url); 

                @endphp 
            @endif
          @endforeach


<!-- ページタイトル画像▼ -->
<h2 class="about_page_tit" style="background: url({{ $cat_banner }});  background-repeat: no-repeat;" title="{{ $cat_title }}">{{ $cat_title }}</h2>
<!-- ページタイトル画像▲ -->

<!-- コンテンツ枠 920px▼ -->
<div id="k_cnt_wp" class="clearfix">

<section class="">
    <h3 class="catagory_tit">{{ $cat_title }}</h3>
    <div>
        <p style="text-align: justify;"> {!! $cat_description !!}</p>
    </div>

    <br><br>

</section>
</div>


@endsection 


<?php //include 'footer.php' ?>