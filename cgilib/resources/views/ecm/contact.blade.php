@extends('ecm.header')
 
@section('content')


<link rel="stylesheet" href="{{ URL::asset('/ecm/css/registration.css') }}" type="text/css"  />
<style type="text/css">
    p{text-align: justify;}
</style>

<div class="container page">
    <form name="form1" action="{{ url('/contact-submit') }}" method="post" >
        {{ csrf_field() }}
        <!-- <div id="entry" class="wrap"> -->
            <section>
                <div >
                    <p>弊社に興味をお持ちいただきありがとうございます。</p>
                    <p>お問い合わせいただきました内容は、弊社の掲げる個人情報保護方針に沿って管理し、お客様の同意なく第三者に開示・提供することはございません。</p>
                    <p>詳細につきましては、当サイトの「プライバシーポリシー」をご参照ください。</p>

                    <table class="formTable">
                        <tbody>
                            <tr>
                                <th>お名前<span class="required">必須 </span></th>
                                <td><input oninvalid="this.setCustomValidity('Enter Your お名前')" oninput="setCustomValidity('')" title="お名前" pattern=".*[^ ].*" name="name"  class="contact" type="Text" value="{{ old('name') }}"  style=" "  required></td>
                            </tr>
                            <tr>
                                <th>ふりがな<span class="required">必須</span></th>
                                <td><input oninvalid="this.setCustomValidity('Enter Your ふりがな')" oninput="setCustomValidity('')" title="ふりがな" pattern=".*[^ ].*" name="fname" class="contact" type="Text" value="{{ old('fname') }}" style=""  required></td>
                            </tr>
                                        
                            <tr>
                                <th>メールアドレス <span class="required">必須</span></th>
                                <td><input type="email" name="email"  style="" value="{{ old('email') }}" required></td>
                            </tr>                            
 
                            <tr>
                                <th>電話番号<span class="required" >必須</span></th>
                                <td><input title="電話番号" name="mobile" type="tel" pattern="[0-9]*"  oninvalid="this.setCustomValidity('Enter Your 電話番号. Only Numbers Please.')" oninput="setCustomValidity('')"  value="{{ old('mobile') }}" style=""  required> </td>
                            </tr>      

                            <tr>
                                <th style="vertical-align: middle;">お問い合わせ内容<span class="required" >必須</span></th>
                                <td><textarea id="test" pattern="[\s\S]*\S[\s\S]*" type="text"  name="message" value="{{ old('message') }}" style=" min-height: 200px;"   required ></textarea> </td>
                            </tr>                         
                           
                        </tbody>
                    </table>

                </div>


                <div  style="text-align: center; margin-top: 20px;">
                    <button class="btn" type="submit" style="color: #fff; border-color: transparent;" id="send_btn" href="javascript:send();">送信</button>
                </div>
            </section>
    </form>
</div>

<script>
    $('#test').keyup(validateTextarea);

    function validateTextarea() {
            var errorMsg = "Please Enter Your Message Please.";
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
</script>
@endsection 

