 @extends('ecm.header')
 @section('content')
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/registration.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/mycart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/login.css') }}">


    <form name="form1" action="{{ url('/registration') }}" method="POST">
            {{ csrf_field() }}            
        <div class="container page">
            <section>
                <div class="">
                    <h1>会員情報登録</h1>
                    <p>以下のフォームに必要事項をご入力ください。<br> ログイン時のIDはメールアドレスをお使いください。</p>

                    <table class="guest-order formTable">
                        <tbody>
                            <tr>
                                <th>名前<span class="required">必須</span></th>
                                <td class="name">
                                    <span class="notes">姓</span>
                                    <input  oninvalid="this.setCustomValidity('Enter Your 姓')" oninput="setCustomValidity('')" title="姓" pattern=".*[^ ].*" value="{{ old('sname1') }}" required name="sname1" type="Text"  >
                                </td>
                                <td class="name">
                                    <span class="notes">名</span>
                                    <input oninvalid="this.setCustomValidity('Enter Your 名')" oninput="setCustomValidity('')" title="名" pattern=".*[^ ].*" value="{{ old('sname2') }}" required name="sname2" type="Text">
                                </td>
                            </tr>
                            <tr>
                                <th>ふりがな<span class="required">必須</span></th>
                                <td class="name">
                                    <span class="notes">姓</span>
                                    <input  oninvalid="this.setCustomValidity('Enter Your 姓')" oninput="setCustomValidity('')" title="姓" pattern=".*[^ ].*" value="{{ old('fname1') }}" required  name="fname1" type="Text">
                                </td>
                                <td class="name">
                                    <span class="notes">名</span>
                                    <input  oninvalid="this.setCustomValidity('Enter Your 名')" oninput="setCustomValidity('')" title="名" pattern=".*[^ ].*" value="{{ old('fname2') }}" required name="fname2" type="Text" >
                                </td>
                            </tr>                          
                            <tr>
                                <th>メールアドレス<span class="required">必須</span></th>
                                <td colspan="2">
                                    <input noninvalid="this.setCustomValidity('Enter Your メールアドレス')" oninput="setCustomValidity('')" title="必須" pattern=".*[^ ].*"  value="{{ old('email') }}" name="email" type="email" type="Text" value="" required> <span class="notes"> 例）info@example.com&nbsp;※半角英数字</span>
                               
                                        <span class="help-block rd-help rd-font">
                                            <strong style="color: red;">{{ Session::get('fail') }}</strong>
                                        </span>      
                                                                                                         
                                </td>
                            </tr>
                            <tr>
                                <th>パスワード<span class="required">必須</span>
                                <td colspan="2">
                                    <input oninvalid="this.setCustomValidity('Enter Your パスワード')" oninput="setCustomValidity('')" name="password" value="" type="password" id="password" required="">
                                </td>
                            </tr>
                            <tr>
                                <th>パスワード確認<span class="required">必須</span></th>
                                <td colspan="2"><input name="password2" value="" type="password" id="confirm_password" required=""></td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td colspan="2">
                                    <input name="mobile" type="tel" pattern="[0-9]*"  oninvalid="this.setCustomValidity('Enter Your 電話番号. Only Numbers Please.')" oninput="setCustomValidity('')"  value="{{ old('mobile') }}" style="width: 150px;" equired class="inputS" required>
                                </td>
                            </tr>
                                <tr>
                                    <th>郵便番号<span class="required">必須</span></th>
                                    <td colspan="2">
                                        <input name="zip_code1" size="3" maxlength="3" type="Text" value="" pattern="[0-9]*" class="inputS" title="Numbers Only" required>-
                                        <input name="zip_code2" size="4" maxlength="4" type="Text" value="" pattern="[0-9]*" class="inputS" title="Numbers Only" required>   
                                            <span class="notes">例）000-0000 ※半角数字</span>
                                            <span id="hsearchmessage"></span>                                    
                                    </td>
                                </tr>   
                            <tr>
                                <th>都道府県</th>
                                <td colspan="2">
                                    <select oninvalid="this.setCustomValidity('Please select 都道府県')" oninput="setCustomValidity('')" name="prefecture" style="background: #555555;" value="{{ old('prefecture') }}" required>
                                        <option value="">選択してください</option>
                                        <option value="1">北海道</option>
                                        <option value="2">青森県</option>
                                        <option value="3">岩手県</option>
                                        <option value="4">宮城県</option>
                                        <option value="5">秋田県</option>
                                        <option value="6">山形県</option>
                                        <option value="7">福島県</option>
                                        <option value="8">茨城県</option>
                                        <option value="9">栃木県</option>
                                        <option value="10">群馬県</option>
                                        <option value="11">埼玉県</option>
                                        <option value="12">千葉県</option>
                                        <option value="13">東京(23区内)</option>
                                        <option value="14">東京(23区外)</option>
                                        <option value="15">神奈川県</option>
                                        <option value="16">新潟県</option>
                                        <option value="17">富山県</option>
                                        <option value="18">石川県</option>
                                        <option value="19">福井県</option>
                                        <option value="20">山梨県</option>
                                        <option value="21">長野県</option>
                                        <option value="22">岐阜県</option>
                                        <option value="23">静岡県</option>
                                        <option value="24">愛知県</option>
                                        <option value="25">三重県</option>
                                        <option value="26">滋賀県</option>
                                        <option value="27">京都府</option>
                                        <option value="28">大阪府</option>
                                        <option value="29">兵庫県</option>
                                        <option value="30">奈良県</option>
                                        <option value="31">和歌山県</option>
                                        <option value="32">鳥取県</option>
                                        <option value="33">島根県</option>
                                        <option value="34">岡山県</option>
                                        <option value="35">広島県</option>
                                        <option value="36">山口県</option>
                                        <option value="37">徳島県</option>
                                        <option value="38">香川県</option>
                                        <option value="39">愛媛県</option>
                                        <option value="40">高知県</option>
                                        <option value="41">福岡県</option>
                                        <option value="42">佐賀県</option>
                                        <option value="43">長崎県</option>
                                        <option value="44">熊本県</option>
                                        <option value="45">大分県</option>
                                        <option value="46">宮崎県</option>
                                        <option value="47">鹿児島県</option>
                                        <option value="48">沖縄県</option>
                                        <option value="49">離島部</option>
                                    </select>
                                </td>
                            </tr>
                        <tr>
                            <th>市区町村<span class="required">必須</span></th>
                            <td colspan="2"><input  oninvalid="this.setCustomValidity('Enter Your 市区町村')" oninput="setCustomValidity('')" title="市区町村" pattern=".*[^ ].*" name="municipality" value="{{ old('municipality') }}" type="text" required>
                            <span class="notes">※半角英数字ハイフンなしでご記入ください。</span>
                            </td>
                        </tr>
                        <tr>
                            <th>住所<span class="required">必須</span></th>
                            <td colspan="2">
                                <textarea id="textarea" pattern="[\s\S]*\S[\s\S]*" name="address" style="height: 250px;" value="{{ old('address') }}" required></textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

                <div style="margin-top: 20px;">
                    <p>会員規約および個人情報の取り扱いについて</p>
                    <div class="privacyPolicyWrap">
                        <iframe src="{{ url('/agreement') }}" class="privacyPolicy"></iframe>
                    </div>
                    
                    <div class="agreeBox">
                        <label for="agree" ><input name="agree" id="agree" class="agreeCheck" type="checkbox" required="">上記会員規約、個人情報の取り扱いについて同意する</label>
                    </div>
                </div>
            </section>
            <br><br>
            <div style="margin-bottom: 120px;">
                <a  class="btn-cart cont cart-login" href="{{ url('/catagory/0') }}" style="color: #999; margin-right: 10px;">お買い物を続ける</a>
                <a  class="btn-cart cont cart-login" href="{{ url('/login') }}" style="color: #999;">ログイン</a>
                <button class="btn-cart conf cart-login" type="submit" style="cursor: pointer;"> この内容で会員登録する </button>
            </div>             

        </div>
    </form>

    <script type="text/javascript">
        // password matching check 
        var password = document.getElementById("password")
          , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;  
        //END password matching check 

        // address validation
        $('#textarea').keyup(validateTextarea);

        function validateTextarea() {
                var errorMsg = "Please Enter Yourr Address Please.";
                var textarea = this;
                var pattern = new RegExp('^' + $(textarea).attr('pattern') + '$');
                var hasError = !$(this).val().match(pattern); // check if the line matches the pattern
                 if (typeof textarea.setCustomValidity === 'function') {
                    textarea.setCustomValidity(hasError ? errorMsg : '');
                 } else { // Not supported by the browser, fallback to manual error display
                    $(textarea).toggleClass('error', !!hasError);
                    $(textarea).toggleClass('ok', !hasError);
                    if (hasError) {
                        $(textarea).attr('title', errorMsg);
                     } else {
                        $(textarea).removeAttr('title');
                     }
                 }
                 return !hasError;
            }     
        //END validation                   
    </script>
@endsection