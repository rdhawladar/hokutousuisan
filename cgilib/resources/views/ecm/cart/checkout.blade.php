 @extends('ecm.header')
 @section('content')
 <link rel="stylesheet" href="{{ URL::asset('/ecm/css/mycart.css') }}" type="text/css"  />


	<fieldset>
	<legend>Your Choosen Products</legend>
			<form method="post" action="{{ url('/order-entry') }}">
				{{ csrf_field() }}
	<table width="100%" class="one">
	   	<thead >
	       	<tr>
	           	<th>Product</th>
	           	<th>Qty</th>
	           	<th>Unit Price</th>
	           	<th>Sub Total</th> 
	       	</tr>
	   	</thead>
	   	<tbody class="two">
				@php 
					$totals = 0 ; 
				@endphp 
				
				@foreach($carts as $row) 
	       		<tr>
	           		<td>
	               		<p><strong>{{ $row->name }}</strong></p>               		 
	           		</td>
	           		<td>				 
						<input type="hidden" name="product_id[]" value="{{ $row->id }}"/>
						<input type="hidden" name="price[]" value="{{ $row->price }}"/>
						<input type="hidden" name="quantity[]" value="{{ $row->quantity }}"/>
							{{ $row->quantity }}
					</td>
	           		<td>${{ $row->price }}</td>
					<td>${{ ($row->price*$row->quantity) }}</td>
					@php 
					   $totals += ($row->price*$row->quantity);
					@endphp 
	       		</tr>
				@endforeach
	   	</tbody>   	
   	<tfoot >
	</table>

	</table>
    <table width="100%" class="total" >	
   		<tr style="text-align: left;">
   			<td width="30%" >&nbsp;</td>   			 
			<td  width="30%">&nbsp;</td>   			 
			<td  width="30%">totals:&nbsp;</td>   			 
   			<td width="30%"> ${{ $totals }}</td>
   		</tr>
	</table>
    <table width="100%" class="summary" >	
   		<tr>
   			<td >小計（税別）</td>   			 
			<td >&yen; 7000  </td>   	
   		</tr>
   		<tr style="text-align: left;">
   			<td>税</td>   			 
			<td>&yen; 700</td>   	
   		</tr>
   		<tr style="text-align: left;">
   			<td >代金引換手数料</td>   			 
			<td >&yen; 70</td>   	
   		</tr>
   		<tr">
   			<td >配送料 (クロネコヤマト - 宅急便)</td>   			 
			<td >&yen; 7</td>   	
   		</tr>
   		<tr>
   			<td style="border-top: 1px solid #555;">合計</td>   			 
			<td style="border-top: 1px solid #555;"> &yen; 70002</td>   	
   		</tr>
	</table>

	</fieldset>
	
	<fieldset>   
			
		<table width="100%" style="margin-top: 50px;">	
			<tr style="background: transparent; border:none;">
	  		<td><a class="next cont" href="{{ url('/catagory/0') }}">お買い物を続ける</a></td>
	  		<td colspan="2"></td>
	  		<td><a  class="next conf" href="{{ url('/checkout1') }}">お支払い手続きに進む</a></td>
			</tr>
	   	</table>
	</fieldset>
	

	@endsection
	
	
	
 
