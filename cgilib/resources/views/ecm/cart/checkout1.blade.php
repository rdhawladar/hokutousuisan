 @extends('ecm.header')
 @section('content')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/ecm/css/mycart.css') }}"/>


    <!-- from the site:  https://www.makeshop.jp/ssl/slogin/ -->
    <div class="wrap container page login-alignment">
        <!-- form for login and registration and guest -->
        <div class="header">
            <a href="{{ url('/catagory/0') }}"><p>オンラインショップ</p></a>
        </div>

        <div class="main">
            <div class="section login">                
                <h2>ログイン</h2>
                <p class="txt01">会員の方は、登録時に入力された会員IDとパスワードでログインしてください。<br><br></p>
                <p id="ErrorTextMsg" class="errortxt"></p>

               <form name="login_form" action="{{ url('/user/login/2') }}" method="post">      
                    {{ csrf_field() }}      
                    <table class="loginform">
                        @if ($errors->has('email'))
                            <span class="help-block rd-help rd-font">
                                <strong style="color: red;">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        @if (Session::get('wrong_auth'))
                            <span class="help-block rd-help rd-font">
                                <strong style="color: red;">{{ Session::get('wrong_auth') }}</strong>
                            </span>      
                        @endif   
                    <table class="loginform">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td><input type="text" name="email" value="" ></td>
                            </tr>
                            <tr>
                                <th>パスワード</th>
                                <td><input type="password" name="password"></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="keeptxt"><input type="checkbox" id="login_keep" name="auto_login" value="on" checked=""><label for="login_keep">次回からIDの入力を省略する</label></p>
                    <div class="btn">
                        <button class="btn-cart" type="submit" style="cursor: pointer;"> ログイン </button>
                    </div>
                    <p class="forget-link"><a href="{{ url('/forget-pass') }}">パスワードをお忘れの方はこちら</a></p>
                </form>
            </div>

            
            <div class="section entry">
                <h2>まだ会員登録されてない方</h2>
                <p class="txt01">初めてご利用の方は、こちらから会員登録すると便利にお買い物ができるようになります。</p>

                <div class="btn"><a href="{{ url('/registration') }}"> <input type="button" value="新規会員登録" onclick="javascript:location.href='http://localhost/ecm_kojo"> </a></div>
            </div>

            
            <div class="section entry">
                <h2>会員登録をさせず購入を希望される方 </h2>
                <p class="txt01">メールアドレスとパスワードを登録しないで購入を希望する方はこちらからご利用ください。</p>

                <div class="btn"><a href="{{ url('/checkout/2') }}"> <input type="button" value="ゲスト購入する" > </a></div>
            </div>
        </div>
        <div>
            <a  class="btn-cart cont" href="{{ url('/catagory/0') }}" style="color: #999; margin-right: 10px;">お買い物を続ける</a>
            <a  class="btn-cart cont" href="{{url('my-cart')}}" style="color: #999;">戻る</a>
            <!-- <a  class="btn-cart conf cart-login" href="{{url('checkout/2')}}" style="color: #999;">ゲスト購入する</a> -->
        </div>         

    </div>
@endsection
