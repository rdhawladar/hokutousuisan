 @extends('ecm.header')
 @section('content')
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/mycart.css') }}">
    <style type="text/css">
        @media screen and (max-width: 768px){
            .header p{font-size: 20px; }
            .table th{font-size: 10px; }
            .btn-cart{padding: 9px;}


        }
        .table{vertical-align: middle;}
    </style>


    <div class="container page " style="margin-bottom: 100px; text-align: center;">
        <div class="header">
            <a href="#"><p>パスワードお忘れの方はこちら</p></a>
        </div>

        <div class="main">

            <div class="section login"">   

                <p class="txt01"  style="text-align: center">ご登録されたアドレスを入力してください。<br> パスワードを再発行すしメールで送りします<br><br></p>
                <p id="ErrorTextMsg" class="errortxt"></p>

                <form name="login_form" action="{{ url('/forget-pass') }}" method="post">       
                    {{ csrf_field() }}      
                    <table class="table loginform" style="width: 75%;">
                        @if (Session::get('fail'))
                            <span class="help-block rd-help rd-font">
                                <strong style="color: red;">{{ Session::get('fail') }}</strong>
                            </span>      
                        @endif                        
                        <tbody>
                            <tr>
                                <th style="width: 35%;">メールアドレス：</th>
                                <td ><input type="email" name="email" required style="width: 100%;"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="font-size: 10px; margin-top: 20px;padding: 10px">
                        <button class="btn-cart" type="submit" style="cursor: pointer;"> パスワードを再設定する </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection