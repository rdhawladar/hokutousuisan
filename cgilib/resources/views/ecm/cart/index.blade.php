@extends('ecm.header')
 @section('content')
 <link rel="stylesheet" href="{{ URL::asset('/ecm/css/mycart.css') }}" type="text/css"  />
 <div class="tb-page container page">
 
      <!-- <legend>Your Cart</legend> -->
      <!-- alert -->  
        @if (Session::get('fail'))
        <div class="order-alert error">
            <h4><i class="icon fa fa-ban"></i> {{ Session::get('fail') }} </h4>
        </div>          
        @endif
        
        @if (Session::get('success'))
        <div class="order-alert success">
            <h4><i class="icon fa fa-check"></i> {{ Session::get('success') }}</h4>                      
          </div>    
        @endif
        <!-- alert  end-->    

      <!-- table to show selected product lists-->
    <table class="table">
       	<thead>
           	<tr class="one">
                <th>No.</th>
                <th>商品名</th>
               	<th>写真</th>
               	<th>単価</th>
                <th>数量</th>
                <th>小計</th> 
               	<th>削除</th> 
           	</tr>
       	</thead>
       	<tbody class="two">     		
        			@php 
        				$totals = 0 ; 
                $serial =1;
        			@endphp 
        			
              @foreach($carts as $row) 
        			 @foreach($product as $pro)
                  @if($pro->id == $row->id) 
               		<tr>
                      <td>  @php echo $serial++; @endphp </td>
                      <td>{{ $row->name }} )</td>
                   		<td class="cart-pro-img"><img src="{{URL::asset('/ecm/product_img/'.$pro->product_thumbnail_url)}}" alt="商品写真"></td>
                      <td>&yen; {{$row->price }} (税込) </td>
                      <td>
                          <form method="post" action="{{ url('/update-cart') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $row->id }}"/>
                            <input style="width:25px;" type="text" name="qty" value="{{ $row->quantity }}">
                            <input type="submit" value="更新" class="update" style="cursor:pointer;" />
                          </form>     
                      </td>
                      <td>&yen; {{($row->price*$row->quantity) }} (税込) </td>
              				<td><a href="{{ url('/remove-cart/'.$row->id) }}"  class="update" style="padding: 5px; font-size: 10px; color: red; " /> X</td>
              				@php 
              				   $totals += ($row->price*$row->quantity);
              				@endphp 
               		</tr>
                  @endif
                @endforeach
    			    @endforeach
       	</tbody> 
    </table>
      <!-- end table to show selected product lists-->  

      <!-- table to show total price -->
      <table width="100%" class="total" >	
       		<th style="text-align: left;">   	
      		  	<td colspan="4" style="text-align: right;width: 64%;"></>合計:&nbsp;</td>   			 
       			<td>&yen; {{$totals }} (税込) </td>
       		</th>
    	</table>
      <!-- end  table to show total price -->

      <!-- button control for next and back  and continue shop -->
        <div>
            <a  class="btn-cart cont" href="{{ url('/catagory/0') }}" style="color: #999; margin-right: 10px;">お買い物を続ける</a>
            @if(Auth::check())
                <a  class="btn-cart conf" href="{{url('checkout/3')}}" style="color: #999;">購入手続きへ</a>
            @else 
            <a  class="btn-cart conf" href="{{url('checkout/1')}}" style="color: #999;">購入手続きへ</a>
            @endif
        </div>  
      <!-- end button control for next and back  and continue shop -->  
</div>
 @endsection