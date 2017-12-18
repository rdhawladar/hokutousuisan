 @extends('ecm.header')
 @section('content')

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/mycart.css') }}"/>    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/registration.css') }}"/> 
    <div class="container" style="min-height: 600px;">
        <form name="form1" action="#" method="POST">
            <div id="entry" class="wrap">
                    <div class="section" >
                        <h1 class="pageTitle" style="float: left;width: 100%; padding-left: 20px;">ご注文ありがとうございます。</h1>
                        <div class="confirm-mess" style="height: 415px;">
                            <p> ご注文番号 &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;HS000000{{$order_id}}</p>
                            <p> 『ご注文番号』は大切の保存してください。</p>
                            <p style="margin: 0;">『ご注文内容確認メール』を送りしましたので、</p>
                            <p style="">ご確認くださいますようお願いいたします。</p>
                            <p style="">またのご利用を心よりお待ちしております。</p>
                        </div>
                    </div>
            </div>
        </form>
    </div>
@endsection