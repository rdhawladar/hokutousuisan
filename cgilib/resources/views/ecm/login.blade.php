 @extends('ecm.header')
 @section('content')
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/mycart.css') }}">

    <div class="container page " style="margin-bottom: 100px; text-align: center; min-height: 620px;">
                    @if (Session::get('reg_success'))
                    <div class="order-alert success">
                        <h4><i class="icon fa fa-check"></i>  {!! Session::get('reg_success') !!}</h4>                      
                      </div>    
                    @endif                              
        <div class="header">
            <a href="{{ url('/home') }}"><p>オンラインショップ</p></a>
        </div>

        <div class="main">
            <div class="btn shoplink"><a href="{{ url('/catagory/0') }}"> <input class="shopbtn" type="button" value="ショップへ戻る"> </a></div>

            <div class="section login">                
                <h2>ログイン</h2>
                <p class="txt01">会員の方は、登録時に入力された会員IDとパスワードでログインしてください。<br><br></p>
                <p id="ErrorTextMsg" class="errortxt"></p>

                <form name="login_form" action="{{ url('/user/login/1') }}" method="post">       
                    {{ csrf_field() }}      
                    <table class="table loginform">
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
                        @if (Session::get('success'))
                            <span class="help-block rd-help rd-font">
                                <strong style="color: green; font-weight: bold;">{!! Session::get('success') !!}</strong>
                            </span>      
                        @endif                        
                        <tbody>
                            <tr>
                                <th>Email</th>
                                <td><input type="email" name="email" required></td>
                            </tr>
                            <tr>
                                <th>パスワード</th>
                                <td><input type="password" name="password"  required></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="keeptxt"><input type="checkbox" id="login_keep" name="auto_login" value="on" checked=""><label for="login_keep">次回からIDの入力を省略する</label></p>
                    <div class="btn">
                        <button class="btn-cart" type="submit" style="cursor: pointer;"> ログイン </button>
                    </div>
                    <p class="link"><a href="{{ url('/forget-pass') }}">パスワードをお忘れの方はこちら</a></p>
                </form>
            </div>

            
            <div class="">
                <h2>まだ会員登録されてない方</h2>
                <p class="txt01">初めてご利用の方は、こちらから会員登録すると便利にお買い物ができるようになります。</p>

                <div class="btn"><a href="{{ url('/registration') }}"> <input type="button" value="新規会員登録" > </a></div>
            </div>
        </div>


    </div>
@endsection