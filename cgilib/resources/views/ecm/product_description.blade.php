<!DOCTYPE html>
<html>
<head>
</head>
<body>


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

      <div class="row pro-detail" style="color: #fff;">
          {!! $pro_description !!}
      </div>

</body>
</html>