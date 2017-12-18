 @extends('ecm.header')
 @section('content')
 <!-- CSS and JS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/mycart.css') }}"/>    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/registration.css') }}"/>    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/login.css') }}"/>    
    <style type="text/css">
        .hide {display: none;}
        .method {display:block; cursor:pointer; }
    </style>

    @php 
        if($total['tprice'] < 10000)
            $delivery_cost = 324;
        else if($total['tprice'] < 30000)
            $delivery_cost = 432;
        else if($total['tprice'] < 100000)
            $delivery_cost = 642;
        else $delivery_cost = 0;         
    @endphp

    <form name="form" action="{{url('checkout/5')}}" method="POST" >
            {{ csrf_field() }}                  

        <input type="text" name="delivery_cost" hidden value="{{$delivery_cost}}" >            
        <div class="container page">
                <div class="section">
                    <h1>お支払い方法の選択</h1>
                    <div class="m-detail">
                        <p>「代金引換」「クレジットカード支払」「【前払い】ATM決済(ペイジー)」「【前払い】コンビニ決済(番号式)」のお支払方法がご利用いただけます。</p>
                        <p>※決済サービス会社のメンテナンスにより、ご希望の支払方法をご利用いただけない場合がございます。</p>
                        <p>その場合は、選択可能な支払方法をご選択いただくか、表示されているメンテナンス時間外にご利用ください。</p>
                        <p>【フリーメール（hotmail、Yahooメール、gooフリーメール等）をお使いのお客様へ】</p>
                        <p>メール配信業者様のシステム障害等で、メールが受信できないお問い合わせが増えております。</p>
                        <p>コンビニ・ＡＴＭ払いをご選択の場合は特に、お支払のためのメールが受信できない場合もございますので、</p>
                        <p>もしメールが受信できない場合は、弊社カスタマーサービスまでお問い合わせいただけますようお願い申し上げます。</p>
                    </div>
                </div>

                <label class="method" >
                    <input type="radio" value="1" name="payment_method" onclick="show1();" checked="">
                        <span>代引き手数料  &nbsp; &nbsp; &nbsp; &nbsp;  &yen;{{$delivery_cost}}</span>
                        <p class="notes">※代金引換は別に手数料がかかります</p>
                        <p class="notes">代金引換手数料</p>
                        <p class="notes">1万円以下   324円  </p>
                        <p class="notes">3万円以下   432円</p>
                        <p class="notes">10万円以下  642円</p>
                </label>

                <label class="method" >
                    <input type="radio" value="2" name="payment_method" onclick="showbank();" >銀行振込
                    <div id="div1" class="hide">
                        <hr>
                        <p class="notes">銀行名 &nbsp;&nbsp;：   三井住友銀行</p>
                        <p class="notes">支店名 &nbsp;&nbsp;：   下高井戸支店</p>
                        <p class="notes">口座種別：　普通口座</p>
                        <p class="notes">口座番号：　4001469</p>
                        <p class="notes">口座名義：　サワグチ　ダイスケ</p>
                    </div>
                </label>

                <label class="method" >
                    <input type="radio" value="3" name="payment_method"><span>クレジットカード支払い</span>
                </label>                

                <div style="margin-top: 5%; margin-bottom: 70px;">
                    <a  class="btn-cart cont cart-login" href="{{ url('/catagory/0') }}" style="color: #999; margin-right: 10px;">お買い物を続ける</a>
                    <a  class="btn-cart cont cart-login" href="{{url('my-cart')}}" style="color: #999;">戻る</a>

                    <button class="btn-cart conf cart-login" type="submit" style="cursor: pointer;"> この内容で注文する </button>                      
                </div>   
        </div>
    </form>

<script type="text/javascript">
    function show1(){
      document.getElementById('div1').style.display ='none';
    }
    function showbank(){
      document.getElementById('div1').style.display = 'block';
    }
</script>


<br><br><br>
@endsection