 @extends('ecm.header')
 @section('content')
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/mycart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/login.css') }}">

    <style type="text/css">
      .profile tr{ background: transparent; color: #000; border: none;}
      .user-panel-info{ text-align: left;    width: 70%; font-size: 16px; margin-top: 20px; }
      .user-panel-info p{color: #000; font-size: 14px;}
      .logout{padding: 10px; cursor: pointer; margin: 10px; border-radius: 5px; background: #555; color: #fff; }
      .table{text-align: left; vertical-align: middle;}
      .table tr th, .table tr td{text-align: left;vertical-align: middle; border: none;     padding-top: 0px;padding-bottom: 14px;}
      input, textarea{width: 100%; overflow: hidden;}
      .table tr th{text-align: right; width: 40%; vertical-align: top;}
      .header{opacity: 1;}
      .header p{float: left;}
    </style>
    <div class="container page" style="width: 90%;">
        <div class="header">
            <a href="{{ url('/user/logout') }}"  style="float: right;"><button class= "logout" style="">ログアウト</button></a>
                    @if (Session::get('success'))
                    <div class="order-alert success">
                        <h4><i class="icon fa fa-check"></i>  {!! Session::get('success') !!}</h4>                      
                      </div>    
                    @endif               
            <form method="post" action="{{ url('/user/profile-update') }}">
             {{ csrf_field() }}

            <div class="user-panel-info" >
              <table class="profile table">
                <tr>
                  <th>『ホクトウ水産ID』</th>
                  <td>:</td>
                  <td>{{ Auth::user()->id }}<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"></td>
                </tr>
                <tr>
                  <th>名前(姓)*</th>
                  <td>:</td>
                  <td><input type="text" name="sname1" value="{{ Auth::user()->sname1 }}" required></td>
                </tr>
                <tr>
                  <th>名前(名)* </th>
                  <td>:</td>
                  <td><input type="text" name="sname2" value="{{ Auth::user()->sname2 }}" required></td>
                </tr>
                <tr>
                <tr>
                  <th>ふりがな(姓)*</th>
                  <td>:</td>
                  <td><input type="text" name="fname1" value="{{ Auth::user()->fname1 }}" required></td>
                </tr>
                <tr>
                  <th>ふりがな(名)* </th>
                  <td>:</td>
                  <td><input type="text" name="fname2" value="{{ Auth::user()->fname2 }}" required></td>
                </tr>
                <tr>
                  <th>電話番号</th>
                  <td>:</td>
                  <td><input type="text" name="mobile" value="{{ Auth::user()->mobile }}" size="14" maxlength="14" pattern="[0-9]*" title="Numbers Only" required></td>
                </tr>
                <tr>
                  <th>『メールアドレス』</th>
                  <td>:</td>
                  <td><input type="email" name="newemail" value="{{ Auth::user()->email }}" required ></td>
                </tr>
                <tr>
                  <th>住所</th>
                  <td style="vertical-align: top;">:</td>
                  <td>
                    <p style="width: 100%; margin-left: 0; margin-top: -4px; background: #eee;" name="address" readonly="">
                      {{ Auth::user()->zip_code1 }} - {{ Auth::user()->zip_code2 }} &nbsp; &nbsp; {{ $prefecture_user }}  &nbsp; &nbsp; {{ Auth::user()->municipality }}  &nbsp; &nbsp; {{ Auth::user()->address }}. 
                    </p>      

                    郵便番号: <input type="text" name="zip_code1" value="{{ Auth::user()->zip_code1 }}" style="width: 13%;height: 22px" size="3" maxlength="3" pattern="[0-9]*" title="Numbers Only" required>-
                    <input type="text" name="zip_code2" value="{{ Auth::user()->zip_code2 }}" style="width: 15%;height: 22px" size="4" maxlength="4" pattern="[0-9]*" title="Numbers Only" required> <br>
                    <label style="margin-top: 5px;"> 都道府県: </label> <select style="font-size: 16px; height: 30px; vertical-align: top; margin-top: 5px; padding: 2px; " name="prefecture" value="{{ old('prefecture') }}"  style="border-radius: 0; " required>
                                
                                @foreach($prefecture as $data)
                                  @php $selected = ""; @endphp
                                   @if($data->id == Auth::user()->prefecture)
                                         @php  $selected = "selected";  @endphp
                                      @else @php $selected = ""; @endphp
                                    @endif 
                                    <option value="{{ $data->id }}" {{$selected }}>{{ $data->name }}  </option>
                                @endforeach
                    </select> <br>
                    
                    <labeL> 市区町村: </labeL>
                    <textarea  onkeyup="auto_grow(this)"  name="municipality" value="{{Auth::user()->municipality }}" type="text" style="width: 75%;h height: 70px;vertical-align: top; margin-top: 5px; " required> 
                        {{Auth::user()->municipality }}
                    </textarea>
                    
                    <textarea onkeyup="auto_grow(this)"  style=" min-height: 75px;margin-top: 3px;" name="address"> 
                        {{ Auth::user()->address }}
                    </textarea> 
                </td>

                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><a href="{{ url('/user/profile-update') }}"  style="float: right; margin-right: -12px;"><button class= "logout" type="submit">更新</button></a></td>
                </tr>
              </table>
            </div>
          </form>
        </div>

        <div class="section login">
        	<h1 style="margin-top: 20px; padding: 20px; background: #555; font-size: 18px;">ご注文履歴</h1>
        </div>  
    	<table width="100%">
       	<thead>
           	<tr class="one">
                <!-- <th>注文番号</th> -->
                <th>注文日</th>
               	<th>商品名前</th>
               	<th>数量</th>
               	<!-- <th>単価</th> -->
                <th>小計</th> 
           	</tr>
       	</thead>
       	<tbody class="two">
          @foreach($order_info as $order)
               		<tr>
                    <!-- <td>{{$order->id}}</td> -->
               			<td>{{$order->olca}}</td>
               			<td>{{$order->pro_protitle}}</td>
               			<td>{{$order->olquantity}}</td>
                    <!-- <td>{{$order->price}}</td> -->
               			<td>{{$order->olprice* $order->olquantity }}</td>
               		</tr>
       		@endforeach
          {!! $order_info->links() !!}
       	</tbody> 
    	</table>        



    </div>

     <script type="text/javascript">

        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }                                                
    </script>    
@endsection