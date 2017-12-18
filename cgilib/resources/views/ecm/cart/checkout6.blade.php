 @extends('ecm.header')
 @section('content')
   <script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>

  <!-- link to the local SqPaymentForm initialization -->
  <script type="text/javascript" src="{{ URL::asset('square/sqpaymentform.js') }}"></script>

  <!-- link to the custom styles for SqPaymentForm -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('square/sqpaymentform.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/mycart.css') }}"/>    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/registration.css') }}"/> 
    <style type="text/css">
        .payment-box { font-size: 14px; color: #000; text-align: left; width: 100%;}
        .payment-box td{background: #fff; color: #000;}
        .head td {background: #ddd; text-align: center;}
        .payment-box th{text-align: left;}
        .payment-box tr{ border: none; }
        .button-credit-card{background:#ddd; color: #000 }
        .card-img img{width: 50px; }
        @media screen and (max-width: 768px){
          .btn-cart, .btn-cart:link, .btn-cart:visited, .btn-cart:active, .btn-cart:hover{width: 40%;padding: 10px 10px;}
        }
    </style>

    <div class="container page" style="min-height: 100px; max-width: 530px;">
        <div id="sq-ccbox" style="width: 100%;">
            <!--
              You should replace the action attribute of the form with the path of
              the URL you want to POST the nonce to (for example, "/process-card")
            -->
          <h4 style="text-align: center;"> 内容をご確認の上、『確認する』ボタンをクリックしてください。 </h4>  
            <form id="nonce-form" novalidate action="{{ url('/payment-process-card') }}" method="post">
                {{ csrf_field() }}
              
              <table class="payment-box">
                  <thead>
                    <tr class="card-img">
                      <td colspan="2">
                        <img src="{{URL::asset('/ecm/img/card/visa.jpg')}}">
                        <img src="{{URL::asset('/ecm/img/card/mastercard.jpg')}}">
                        <img src="{{URL::asset('/ecm/img/card/ae.png')}}">
                        <img src="{{URL::asset('/ecm/img/card/jcb.png')}}">
                      </td>
                    </tr>                    
                  </thead>
                  <tbody>             
                    <tr>
                      <td colspan="2">
                        <P>カード番号 <span style="color: red;">(必須)</span> </P>
                        <div id="sq-card-number"></div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <P>カード確認番号 <span style="color: red;">(必須)</span> </P>
                        <span class="notes" style="font-size: 10px; text-align: left; margin-top: -14px;">（VISA JCB　マスターカードは裏面３桁の数字　アメックスは表面４桁の数字）</span>
                        <div id="sq-cvv"></div>
                      </td>                      
                    </tr>
                    <tr>
                      <td colspan="2">
                        <P>カード有効期間 <span style="color: red;">(必須)</span> </P>
                        <div id="sq-expiration-date"></div>
                      </td>                      
                    </tr>
<!--                     <tr>
                      <td colspan="2">
                        <P>郵便番号 <span style="color: red;">(必須)</span> </P>
                      </td>                      
                    </tr> -->
                       <div id="sq-postal-code"></div>
                    <tr>
                      <td colspan="2">
                        <button id="sq-creditcard" class="button-credit-card" onclick="requestCardNonce(event)" style="margin-left: 20px;">確認する</button>
                      </td>
                    </tr>
                  </tbody>
              </table>
                    
              <!--
                After a nonce is generated it will be assigned to this hidden input field.
              -->
              <input type="hidden" id="card-nonce" name="nonce">
            </form>
          </div>
    </div>
    <div class="container page" style="margin-bottom: 20px;display: inline-block; min-height: 0 !important; max-width: 600px; ">
        <a  class="btn-cart cont" href="{{ url('/catagory/0') }}" style="color: #999; margin-left: 20px; float: right;">お買い物を続ける</a>
        <a  class="btn-cart cont" href="{{url('checkout/5')}}" style="color: #999; float: right; margin-left: 15px;">戻る</a>  
    </div>            
@endsection