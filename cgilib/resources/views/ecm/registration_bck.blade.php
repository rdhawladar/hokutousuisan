 @extends('ecm.header')
 @section('content')
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ecm/css/registration.css') }}">


    <form name="form1" action="#" method="POST">
        <div id="entry" class="wrap">
            <section>
                <div class="section">
                    <div class="loginBtnWrap"><a href="{{ url('/login') }}" class="btn shop-btn">ログイン</a></div>
                    <div class="shopBtnWrap"><a href="{{ url('/catagory/0') }}" class="btn shop-btn">ショップへ戻る</a></div>
                    <h1 class="pageTitle">会員情報登録</h1>
                    <p>以下のフォームに必要事項をご入力ください。<br> ログイン時のIDは会 員 I Dをご利用ください。</p>

                    <table class="formTable">
                        <tbody>
                            <tr>
                                <th>お名前<span class="required">必須</span></th>
                                <td><input name="hname" size="15" maxlength="20" type="Text" value=""><span class="notes">例）山田太郎</span></td>
                            </tr>
                            <tr>
                                <th>お名前（フリガナ）<span class="required">必須</span></th>
                                <td><input name="kname" size="15" maxlength="20" type="Text" value=""><span class="notes">例）ヤマダタロウ</span></td>
                            </tr>
                                        
                            <tr>
                                <th>会員ID<span class="required">必須</span></th>
                                <td>
                                    <input name="id" id="id_input" size="10" maxlength="12" type="text" style="ime-mode:disabled;">
                                    <a style="background: #ededed;" href="javascript:showIdValidationMessage()" class="btn check-btn">IDチェック</a>
                                    <span class="notes">&nbsp;※4～12文字の半角英数字</span>            
                                    <div id="id_auto_create">
                                        <input type="radio" name="id_auto_create" id="idAutoCreateN" value="N" onclick="javaScript:changeIdFormDisplay();" checked="">
                                        <label class="radio" for="idAutoCreateN">会員IDを手動入力</label>
                                        <input type="radio" name="id_auto_create" id="idAutoCreateY" value="Y" onclick="javaScript:changeIdFormDisplay();">
                                        <label class="radio" for="idAutoCreateY">会員IDを自動入力</label>
                                    </div>        
                                </td>
                            </tr>                            
                            <tr>
                                <th>メールアドレス<span class="required">必須</span></th>
                                <td><input name="email" size="20" maxlength="255" type="Text" value="" style="ime-mode:disabled;"> <span class="notes"> 例）info@example.com&nbsp;※半角英数字</span></td>
                            </tr>
                            <tr>
                                <th>パスワード<span class="required">必須</span><input name="oldpasswd" value="" type="hidden"></th>
                                <td>
                                    <input type="hidden" name="oldpasswd" value="">
                                    <input name="password1" value="" size="10" maxlength="16" type="password" style="ime-mode:disabled;">
                                    <span class="notes">&nbsp;※4～16文字の半角英数字</span>
                                </td>
                            </tr>
                            <tr>
                                <th>パスワード確認<span class="required">必須</span></th>
                                <td><input name="password2" value="" size="10" maxlength="16" type="password" style="ime-mode:disabled;"></td>
                            </tr>
                            <tr>
                                <th>メールマガジン<span class="required">必須</span></th>
                                <td>
                                    <input name="emailreceive" value="Y" type="radio" id="emailreceiveY" checked=""><label for="emailreceiveY">希望します。</label>
                                    <input name="emailreceive" value="N" type="radio" id="emailreceiveN"><label for="emailreceiveN">希望しません。&nbsp;</label>
                                </td>
                            </tr>
                             <tr>
                                <th>電話番号</th>
                                <td>
                                    <input name="hphone1" size="5" maxlength="5" type="text" value="" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">-
                                    <input name="hphone2" size="4" maxlength="4" type="text" value="" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">-
                                    <input name="hphone3" size="4" maxlength="4" type="text" value="" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">
                                    <span class="notes">例）00-0000-0000&nbsp;※半角数字</span>
                                    <input name="hphone" type="hidden" value="">
                                </td>
                            </tr>
                            <tr>
                                <th>郵便番号</th>
                                <td>
                                    <input name="hpost1" id="hpost1" size="3" maxlength="3" type="Text" value="" pattern="[0-9]*" style="ime-mode:disabled;" onkeyup="findZipcode('h');" class="inputS">-
                                    <input name="hpost2" id="hpost2" size="4" maxlength="4" type="Text" value="" pattern="[0-9]*" style="ime-mode:disabled;" onkeyup="findZipcode('h');" class="inputS">
                                    <span class="notes">例）000-0000 ※半角数字</span>
                                    <span id="hsearchmessage"></span>
                                </td>
                            </tr>
                            <tr>
                                <th>都道府県</th>
                                <td>
                                    <select name="haddress1" id="harea" style="    background: #555555;">
                                        <option value="">選択してください</option><option value="1">北海道</option><option value="2">青森県</option><option value="3">岩手県</option><option value="4">宮城県</option><option value="5">秋田県</option><option value="6">山形県</option><option value="7">福島県</option><option value="8">茨城県</option><option value="9">栃木県</option><option value="10">群馬県</option><option value="11">埼玉県</option><option value="12">千葉県</option><option value="13">東京(23区内)</option><option value="14">東京(23区外)</option><option value="15">神奈川県</option><option value="16">新潟県</option><option value="17">富山県</option><option value="18">石川県</option><option value="19">福井県</option><option value="20">山梨県</option><option value="21">長野県</option><option value="22">岐阜県</option><option value="23">静岡県</option><option value="24">愛知県</option><option value="25">三重県</option><option value="26">滋賀県</option><option value="27">京都府</option><option value="28">大阪府</option><option value="29">兵庫県</option><option value="30">奈良県</option><option value="31">和歌山県</option><option value="32">鳥取県</option><option value="33">島根県</option><option value="34">岡山県</option><option value="35">広島県</option><option value="36">山口県</option><option value="37">徳島県</option><option value="38">香川県</option><option value="39">愛媛県</option><option value="40">高知県</option><option value="41">福岡県</option><option value="42">佐賀県</option><option value="43">長崎県</option><option value="44">熊本県</option><option value="45">大分県</option><option value="46">宮崎県</option><option value="47">鹿児島県</option><option value="48">沖縄県</option><option value="49">離島部</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>市区町村</th>
                                <td><input name="haddress2" id="haddress2" size="20" maxlength="80" type="Text" value=""><span class="notes">例）渋谷区</span></td>
                            </tr>
                            <tr>
                                <th>それ以降の住所</th>
                                <td><input name="haddress" id="haddress" size="30" maxlength="120" type="Text" value=""><span class="notes">例）○○町1-1-1</span></td>
                            </tr>
                                                        <tr>
                                <th>FAX番号</th>
                                <td>
                                    <input name="fax1" size="4" maxlength="5" type="text" value="" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">-
                                    <input name="fax2" size="4" maxlength="4" type="text" value="" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">-
                                    <input name="fax3" size="4" maxlength="4" type="text" value="" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">
                                    <span class="notes">例）00-0000-0000 ※半角数字</span>
                                    <input name="fax" value="" type="hidden">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="policyWrap">
                    <h2 class="policyTitle">会員規約および個人情報の取り扱いについて</h2>
                    <div class="privacyPolicyWrap">
                        <iframe src="{{ url('/agreement') }}" class="privacyPolicy"></iframe>
                    </div>
                    
                    <div class="agreeBox">
                        <input name="agree" id="agree" class="agreeCheck" type="checkbox"><label for="agree">上記会員規約、個人情報の取り扱いについて同意する</label>
                    </div>
                </div>

                <div class="btnWrap">
                    <a class="btn disabled" id="send_btn" href="javascript:send();">この内容で会員登録する</a>
                </div>
            </section>

            <footer class="footer">
                <p class="copyright"><small>©2017 Excel Company Limited All Rights Reserved.</small></p>
            </footer>

        </div>
    </form>
@endsection