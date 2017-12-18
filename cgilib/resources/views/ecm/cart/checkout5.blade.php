 @extends('ecm.header')
 @section('content')
@php 
    foreach($pro_order as $order)
    {
        if($order->session == $session)
            $way = $order->prefecture;
            $payment_method = $order-> payment_method;
            $order_id = $order->order_id;
    } 
    if($way == 1)
        $shipping_cost = 1000;
    else if($way == 48 || $way == 49)
        $shipping_cost = 2800;
    else
        $shipping_cost = 1180;
@endphp
 <link rel="stylesheet" href="{{ URL::asset('/ecm/css/mycart.css') }}" type="text/css"  />
 <link rel="stylesheet" href="{{ URL::asset('/ecm/css/login.css') }}" type="text/css"  />
 <style type="text/css">
 	.cart-payment-info{margin: 0 auto; margin-top: 25px; font-size: 12px; }
 </style>
<!-- CSS and JS for payment  -->
    <script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>
    <script type="text/javascript" src="{{ URL::asset('square/sqpaymentform.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('square/sqpaymentform.css') }}"> 


<fieldset>
<form method="post" action="#" style="margin: 5px; " scrolling ="no">
				{{ csrf_field() }}
								
	<div class="container page">
		<table width="100%" class="one">
		   	<thead >		   		
		       	<tr style="text-align: center;">
		           	<th>No.</th>
		           	<th>商品名</th>
               		<th>写真</th>		           	
		           	<th>単価</th>
		           	<th>数量</th>
		           	<th>小計</th> 
		       	</tr>
		   	</thead>
		   	<tbody class="two">
					@php 
						$totals = 0; 
						$serial = 1; 
					@endphp 
					
					@foreach($carts as $row) 
        			 	@foreach($product as $pro)
                  			@if($pro->id == $row->id) 					
				       		<tr>
				           		<td>@php echo $serial++ @endphp</td>
				           		<td>{{ $row->name }}</td>
				           		<td class="cart-pro-img"><img src="{{URL::asset('/ecm/product_img/'.$pro->product_thumbnail_url)}}" alt="商品写真"></td>
				           		<td>&yen; {{$row->price}} (税込) </td>
				           		<td>				 
									<input type="hidden" name="product_id[]" value="{{ $row->id }}"/>
									<input type="hidden" name="price[]" value="{{ $row->price }}"/>
									<input type="hidden" name="quantity[]" value="{{ $row->quantity }}"/>
										{{ $row->quantity }}
								</td>
								<td>&yen; {{($row->price*$row->quantity)}} (税込)   </td>
								@php 
								   $totals += ($row->price*$row->quantity);
								@endphp 
				       		</tr>
		                  @endif
		                @endforeach		       		
					@endforeach

		   	</tbody>  
		   	<table class="summary"> 	
			   	<tr>
		   			<td >小計</td>   			 
					<td >&yen; {{ $totals }} (税込)</td>   	
		   		</tr>
		   		<tr style="text-align: left;">
		   			<td >代金引換手数料</td>   			 
					<td >&yen; {{ $delivery_cost }} (税込)</td>   	
		   		</tr>
		   		<tr>
		   			<td >配送料 (佐川急便)</td>   			 
					<td >&yen; {{ $shipping_cost }} (税込)</td>   	
		   		</tr>
		   		<tr style="font-weight: bold;">
		   			<td style="border-top: 1px solid #555;">合計</td>   			 
					<td style="border-top: 1px solid #555;"> 
						&yen; @php echo $shipping_cost + $totals + $delivery_cost; @endphp  
					(税込)</td>   	
		   		</tr>
		   	</table>
		</table>

<input type="hidden" name="delivery_cost" value="{{$delivery_cost}}">
<input type="hidden" name="shipping_cost" value="{{$shipping_cost}}">
<input type="hidden" name="payment_method" value="{{$payment_method}}">

<!--  END payment method information  -->   

	    <div>
	        <a  class="btn-cart cont" href="{{ url('/catagory/0') }}" style="color: #999; margin-right: 10px;">お買い物を続ける</a>
	        <a  class="btn-cart cont" href="{{url('checkout/4')}}" style="color: #999;">戻る</a>  
	      @if($payment_method != 3)
	        <a  class="btn-cart conf" href="{{url('order-entry')}}" style="color: #999;">この内容で注文する</a>  
	      @else 
	      	<a  class="btn-cart conf" href="{{url('checkout/6')}}" style="color: #999;">この内容で注文する</a>  
	      @endif
	    </div>  
	</div> 




</form>   
</fieldset>


	


@endsection
	
	
	
 
