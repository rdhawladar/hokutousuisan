 @extends('ecm.header')
 @section('content')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/login.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/mycart.css') }}"/>        
    <style type="text/css">
        .order_address{width: 45%; background: #333; color: #fff; display: inline-block; border: 1px solid;}
        textarea{overflow: hidden;}   
    </style>
    <form name="form1" action="{{url('checkout/4')}}" method="POST">
            {{ csrf_field() }}         
        <div class="container page">
            <div class="section">
                <h1 class="pageTitle">ご注文者情報 </h1>

                <table class="date-confirm formTable table "> 
                    <tbody style="text-align: left; font-size: 12px;">
                        <tr>
                            <th>送付方法のご案内 </th>
                            <td>送付は「佐川急便」を利用します。</td>
                            
                        </tr>                           
                        <tr>
                            @php 
                                $shipping_cost=0;
                                    foreach($pro_order as $order)
                                    {
                                        if($order->session == $session){
                                            $way = $order->prefecture;
                                            $zip_code1 = $order->zip_code1;
                                            $zip_code2 = $order->zip_code2;
                                            $municipality = $order->municipality;
                                            $address = $order->address;
                                        }

                                    } 
                                    if($way == 1)
                                        $shipping_cost = 1000;
                                    else if($way == 48 || $way == 49)
                                        $shipping_cost = 2800;
                                    else
                                        $shipping_cost = 1180;
                            @endphp
                            <th>お届け先</th>
                            <td>
                                <form name="form2" action="{{url('address-change')}}" method="POST">
                                        {{ csrf_field() }}            

                                        <span class="notes">郵便番号: 
                                            <input class="order_address" id="order_address"  value="{{ $zip_code1 }}" type="text" name="zip_code1"  style="width: 8%; text-align: center; height: 22px" size="3" maxlength="3" pattern="[0-9]*" title="Numbers Only" required/> -
                                            <input class="order_address" id="order_address"  value="{{ $zip_code2 }}" type="text" name="zip_code2"  style="width: 10%;text-align: center; height: 22px" size="4" maxlength="4" pattern="[0-9]*" title="Numbers Only" required/><br>

                                            <label style="margin-top: 10px;"> 都道府県: </label> 
                                            <select onChange="myNewFunction(this);" class="order_address"  style="padding: 2px;border-radius: 0; height: 25px; " name="prefecture" value="{{ old('prefecture') }}" required>
                                                        @foreach($prefectures as $data)
                                                          @php $selected = ""; @endphp
                                                           @if($data->id == $way)
                                                                 @php  $selected = "selected";  @endphp
                                                              @else @php $selected = ""; @endphp
                                                            @endif 
                                                            <option class="order_address"  value="{{ $data->id }}" {{$selected }}>{{ $data->name }}  </option>
                                                        @endforeach
                                            </select>
                                        </span><br>
                                        <span class="notes">市区町村: 
                                            <textarea   class="order_address"  name="municipality" value="{{$municipality }}" type="text" style="height: 50px; vertical-align: top;" required> {{$municipality }} </textarea></span>

                                        <span class="notes">
                                            <label style="vertical-align: top; margin-top: 8px; " >住所 &nbsp; &nbsp;  &nbsp; :</label>
                                            <textarea class="order_address"  onkeyup="auto_grow(this)" style="min-height: 50px;margin-top: 10px;" name="address"> {{ $address }}
                                          </textarea> 
                                      </span>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th>送料</th>
                            <td>￥  <span id="shipping_cost">{{ $shipping_cost }} </span>
                                <span class="notes">佐川急便でお届けします</span>
                                <span class="notes">北海道 1000円</span>
                                <span class="notes">北海道　沖縄　離島以外 1180円</span>
                                <span class="notes">沖縄　離島   2800円</span>
                                <span class="notes">※運送の都合上、一部の地域・離島で、お届けできない地域がございます。</span>
                                <span class="notes">※一箇所の配送先に対して、一送料です。</span>
                            </td>
                        </tr>
                        <tr>
                            <th> お届け希望日 </th>
                           <td colspan="2">
                                <!-- <select class="select" oninvalid="this.setCustomValidity('Please select お届け希望日')" oninput="setCustomValidity('')" name="order_date" id="harea" style="background: #555;margin-bottom: 15px;">                             -->
                                <select class="select" name="order_date" style="background: #555;margin-bottom: 15px;">
                                    @php 
                                        $min = $order_date_range->min_delivery_date;
                                        $max = $order_date_range->max_delivery_date;
                                    @endphp
                                    <option value="{{date("0-0-0")}}">指定しない（最短発送になります）</option>
                                    @for($count = $min; $count<=$max ; $count++)
                                        <option value="{{date("Y-m-d", strtotime("+$count day", strtotime(date('Y-m-d'))))}} "> {{date("Y-m-d", strtotime("+$count day", strtotime(date('Y-m-d'))))}}</option>
                                    @endfor

                                </select>

                                <span class="notes">お届け希望日を選択しない場合は最短(注文確認、もしくはご入金確認後7～10営業日以内)で発送いたします。</span>
                                <span class="notes">お届け希望日を選択した場合は、配達店でのお荷物お預かり期間が短くなりますので、必ずご指定日にお受け取りください。 保管期限を過ぎますと、商品が自動的に返送となりますのでご注意ください。</span>                            
                            </td>
                        </tr>
                            <th> 指定時間帯 </th>
                           <td colspan="2">
                            <!-- oninvalid="this.setCustomValidity('Please select お届け希望日')" oninput="setCustomValidity('')" -->
                                <select class="select"  name="order_time" id="harea" style="background: #555; " >
                                    <option value="00:00〜00:00">指定しない</option>
                                    <option value="12:00〜13:00">午前中</option>
                                    <option value="12:00〜13:00">12:00〜14:00</option>
                                    <option value="13:00〜14:00">14:00〜16:00</option>
                                    <option value="14:00〜15:00">16:00〜18:00</option>
                                    <option value="15:00〜16:00">19:00〜21:00</option>
                                </select>
                            </td>
                        </tr>

                            <!--                             <tr>
                            <th>住所<span class="required">必須</span></th>
                            <td colspan="2">
                                <input name="emailreceive" value="Y" type="radio" id="emailreceiveY" checked=""><label for="emailreceiveY">希望します。</label>
                                <input name="emailreceive" value="N" type="radio" id="emailreceiveN"><label for="emailreceiveN">希望しません。&nbsp;</label>
                            </td>
                        </tr> -->
                      
                    </tbody>
                </table>

            </div>

            <div style="margin-bottom: 120px;">
                <a  class="btn-cart cont cart-login" href="{{ url('/catagory/0') }}" style="color: #999; margin-right: 10px;">お買い物を続ける</a>

                    @if(Auth::check())
                    <a  class="btn-cart cont cart-login" href="{{url('/my-cart')}}" style="color: #999;">戻る</a>
                @else 
                    <a  class="btn-cart cont cart-login" href="{{url('/checkout/2')}}" style="color: #999;">戻る</a>   
                @endif              
                <button class="btn-cart conf cart-login" type="submit" style="cursor: pointer;"> この内容で注文する </button>


              
            </div>   

        </div>
    </form>
<script>

    function myNewFunction(sel)
    {
        var prefecture_val = sel.options[sel.selectedIndex].value;
        //alert(sel.options[sel.selectedIndex].text);
                          if(prefecture_val == 1)
                                        shipping_cost = 1000;
                                    else if(prefecture_val == 48 || prefecture_val == 49)
                                        shipping_cost = 2800;
                                    else
                                        shipping_cost = 1180;

        document.getElementById("shipping_cost").innerHTML =shipping_cost;
    }
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }      
</script>    
@endsection