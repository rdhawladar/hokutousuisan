 @extends('ecm.header')
 @section('content')
 <link rel="stylesheet" href="{{ URL::asset('/ecm/css/mycart.css') }}" type="text/css"  />
	
					<!-- /.box-header -->				
					
					@if (count($errors) > 0)
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Error!</h4>
						{{ $errors->first() }} 
					</div>			
					@endif
					
					@if (Session::get('success'))
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						{{ Session::get('success') }}
					  </div>	
					@endif



	<fieldset>
	<legend>Your Choosen Products</legend>
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
					$total = 0 ; 
				@endphp 
				
				@foreach($carts as $row) 
	       		<tr>
	           		<td>
	               		<p><strong>{{ $row->name }}</strong></p>               		 
	           		</td>
	           		<td>				 
						<input type="hidden" name="id[]" value="{{ $row->id }}"/>
							{{ $row->quantity }}
					</td>
	           		<td>${{ $row->price }}</td>
					<td>${{ ($row->price*$row->quantity) }}</td>
					@php 
					   $total += ($row->price*$row->quantity);
					@endphp 
	       		</tr>
				@endforeach
	   	</tbody>   	
   	<tfoot >
	</table>

		<hr/>
    <table width="100%" class="total" >	
   		<tr style="text-align: left;">
   			<td width="30%">&nbsp;</td>   			 
			<td  width="30%">&nbsp;</td>   			 
			<td  width="30%">Total:&nbsp;</td>   			 
   			<td > ${{ $total }}</td>
   		</tr>
	</table>
	<hr/>

	</fieldset>
	
	<fieldset>
		<form method="post" action="{{ url('/order-entry') }}">
				{{ csrf_field() }}
			<legend>Shipping & Payment</legend>

			<div class="text"> 
			    <div class="label">Name:</div> 
			    <input type="text" size="30" name="name" title="Name"/> 
			</div> 

			<div class="text"> 
			    <div class="label">Contact no:</div> 
			    <input type="text" size="30" name="mobile" title="contact"/> 
			</div> 

			<div class="text"> 
			    <div class="label">E-mail:</div> 
			    <input type="text" size="30" name="email" title="E-mail"/> 
			</div> 

			<div class="text"> 
			    <div class="label">Shipping Address:</div> 
			    <textarea rows="5" cols="50" name="address" title="adress"></textarea> 
			</div> 	
			<table width="100%" class="two">   	
					<tr>
						<td>Payment Method(Cash On Delivery)</td>
						<td><input type="radio" name="payment_method" checked value="COD" checked="true" /></td>
					</tr>	
					<tr>
						
					</tr>		
					<tr>
						<td><a class="next" href="{{ url('/catagory/0') }}">Continue Shopping</a></td>
						<td><button  class="next" type="submit" value="submit" >Confirm Order</button></td>
					</tr>
			</table>
		</form>
	</fieldset>
	

	@endsection
	
	
	
 
