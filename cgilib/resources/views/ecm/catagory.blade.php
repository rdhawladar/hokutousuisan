
@extends('ecm.header')
 
@section('content')
 <link rel="stylesheet" href="{{ URL::asset('/ecm/css/mycart.css') }}" type="text/css"  />
          @foreach($catagory as $cat)
            @if($cat->id == $id) 
                @php  
                    $cat_title = $cat->catagory_title; 
                    $cat_description = $cat->catagory_description; 
                    $cat_banner = URL::asset('/ecm/catagory_img/'.$cat->catagory_banner_url); 

                @endphp 
            @endif
          @endforeach


    <!-- Page Content -->
    <div class="container page">
        <img class="banner" src="{{ $cat_banner }}" style="background-repeat: no-repeat; width: 100%; height: 20%px;" title="{{ $cat_title }}" >
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
        <div class="middle">
            <h3 class="catagory_tit">{{ $cat_title }}</h3>
            <p> {!! $cat_description !!} </p>
        </div>



      @foreach($product as $i => $pro)
        @if($pro->catagory_id == $id || $id == 0 ) 
            @php  
                $cat_title = $pro->product_title; 
                $cat_description = $pro->product_description; 
                $price = $pro->price; 
                $cat_thumbnail = URL::asset('/ecm/product_img/'.$pro->product_thumbnail_url); 
                $cat_description = mb_substr(strip_tags($cat_description), 0, 80);

            @endphp      
            <div class="row cat-row">
                <div class="col-md-6 mb-4 nopadding">
                  <div class="card cat-card">
                    <div class="card-body cat-card-body">
                         <a href="{{ url('/pro-details/'.$pro->id) }}"><img class="cat-img card-img-top" src="{{$cat_thumbnail}}" alt=""></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-4 nopadding">
                  <div class="cat-card card ">
                    <div class="cat-card-body card-body ">
                      <h4 class="cat-title" title="$cat_title" ><a href="{{ url('/pro-details/'.$pro->id) }}" style="color: #E0B338;"> {{$cat_title}} </a></h4>
                      <div class="cat-description">
                          {!! htmlspecialchars_decode($cat_description) !!} 
                            <a href="{{ url('pro-details/'.$pro->id) }}" style="color: #E0B338;"> もっと見る。。</a>
                      </div>                                             
                      <h2 class="cat-price"><b> 
                            @if($price==0)
                              <span style = "color:red">売り切れ</span>
                            @else 
                              価格 &yen;{{$price}} (税込)  
                            @endif    </b></h2>
                      @if($price==0)
                        <button class ="cart" type="submit" style="background: url({{ URL::asset('/ecm/img/cart.png') }});"> </button> 
                      @else 
                        <a href="{{ url('/add-to-cart/'.$pro->id.'/'.$id) }}">
                          <button class ="cart" type="submit" style="cursor: pointer;background: url({{ URL::asset('/ecm/img/cart.png') }});"> </button> 
                        </a>                           
                      @endif                              
                 
                    </div>
                  </div>
                </div>
            </div>
            @endif
          @endforeach

    </div>
    <!-- /.container -->






<!-- <script type="text/javascript">
    setTimeout(function() {
        $('.success').fadeOut('fast');
    }, 1000);
    </script> -->
@endsection 

