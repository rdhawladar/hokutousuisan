
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
 <link rel="stylesheet" href="{{ URL::asset('/ecm/css/mycart.css') }}" type="text/css"  />    
 <style type="text/css">
       .pro-detail ol, ul {
        margin-top: 0;
        margin-bottom: 10px;
      }
      li {
        display: list-item;
        text-align: -webkit-match-parent;
      }
.pro-detail ul, menu, dir {
    display: block;
    list-style-type: disc;
    list-style: square !important;
    -webkit-margin-before: 1em;
    -webkit-margin-after: 1em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    -webkit-padding-start: 40px;
}
.pro-detail ol ol, ol ul, ul ol, ul ul {
    margin-bottom: 0;
}
.pro-detail ol ul, ul ol, ul ul, ol ol {
    -webkit-margin-before: 0px;
    -webkit-margin-after: 0px;
}
.pro-detail ul ul, ol ul {
    list-style-type: circle;
}    
 </style>       

<div class="container page">
                    @if (count($errors) > 0)
                    <div class="order-alert error">
                        <h4><i class="icon fa fa-ban"></i> {{ $errors->first() }} </h4>
                    </div>          
                    @endif
                    
                    @if (Session::get('success'))
                    <div class="order-alert success">
                        <h4><i class="icon fa fa-check"></i>  {{ Session::get('success') }}</h4>                      
                      </div>    
                    @endif 
      <!-- Portfolio Item Row -->
      <div class="row pro">

        <div class="col-md-8">
          <img class="pro-img img-responsive" src="{{$product_thumbnail_url}}" alt="">
        </div>

        <div class="col-md-4">
          <ul>
            <li><h3 class="cat-title">{{ $pro_title }} </h3></li>
            <li><h2 class="cat-price" style="color: #fff;">商品 ID: {{  $pro_id }} </h2></li>
            <li><h2 class="cat-price">
                    @if($pro_price==0)
                      <span style = "color:red">売り切れ</span>
                    @else 
                      価格 &yen;{{$pro_price}} (税込)  
                    @endif </h2></li>
            <li class="">
                @if($pro_price==0)
                  <button class="cart" type="submit" name="" style="background: url({{ URL::asset('/ecm/img/cart.png') }});"> </button>  
                @else 
                  <form method="post" action="{{ url('/add-to-cart/'.$pro_id.'/x') }}">
                              {{ csrf_field() }}
                              <input type="hidden" name="id" value="{{ $pro_id }}"/>
                              <!-- Quantity: <input  type="number" name="qty" min="1" step="1" value="1" style="width: 40px; height: 30px;">  <br><br> -->
                              <button class="cart" type="submit" name="" style="cursor: pointer; background: url({{ URL::asset('/ecm/img/cart.png') }});"> </button>  
                  </form>                
                @endif               
            </li>
          </ul>
        </div>

      </div>
<!--       <div class="row pro-detail" >
          {!! $pro_description !!}
      </div> -->
      <iframe src="{{url('/product-description/'.$pro_id)}}" style="width: 100%;" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
</div>

<script type="text/javascript">
    setTimeout(function() {
        $('.success').fadeOut('fast');
    }, 1000);


    function resizeIframe(obj) {

      obj.style.height = (parseFloat(obj.contentWindow.document.body.scrollHeight)+80) + 'px';
    }
</script>

@endsection 