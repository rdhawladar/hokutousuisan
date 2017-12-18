
@extends('ecm.header')
 
@section('content')

          @foreach($product as $pro)
            @if($pro->id == $id) 
                @php  
                    $pro_title = $pro->product_title; 
                    $pro_price = $pro->price; 
                    $pro_description = $pro->product_description; 
                    $product_thumbnail_url  = URL::asset('/ecm/product_img/'.$pro->product_thumbnail_url);
                    $pro_id = $pro->id;
                @endphp 
            @endif
          @endforeach

<!-- コンテンツ枠 920px▼ -->
<div id="k_cnt_wp" class="clearfix">

<section class="factory03">
  

    <br><br>
                <ul style="float: left;width: 90%; padding: 26px 0px ; margin-left: 45px;" >
                    <li style="margin-left: 0px; float: left;padding: 0px;">
                        <img src="{{ $product_thumbnail_url }}" width="300" height="200" style="width: 560px; height: 500px;">
                    </li>
                    <li  style="float: right; padding: 0px 0px; width: 200px;    margin-top: 76px;">
                        <h3 class="catagory_sub_tit" style="font-weight: bold;font-size: 25px; ">{{ $pro_title }} </h3><br><br>
                        <h2 class="catagory_sub_tit" ">product ID: {{  $pro_id }} </h2><br><br>
                        <h2 class="catagory_sub_tit" ">Price: {{$pro_price}} &yen;</h2><br><br>
                        <form method="post" action="{{ url('/ecm/update-cart') }}">
                            {{ csrf_field() }}
                            <input type="dden" name="id" value="{{ $pro_id }}"/>
                            Quantity: <input  type="number" name="qty" min="1" step="1" value="1" style="width: 40px; height: 30px;">  <br><br>
                            <button class="cart" type="submit" name="" style="background: url({{ URL::asset('/ecm/img/cart.png') }});"> </button>  
                        </form>
                    </li>
                </ul>     


            <p style="text-align: justify; width: 90%; margin-left: 45px;"> {{ $pro_description }}</p>
         

</section>
</div>


@endsection 


<?php //include 'footer.php' ?>