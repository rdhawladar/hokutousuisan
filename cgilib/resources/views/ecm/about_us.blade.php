@extends('ecm.header')
 
@section('content')

<link rel="stylesheet" href="{{ URL::asset('/ecm/css/registration.css') }}" type="text/css"  />
<link rel="stylesheet" href="{{ URL::asset('/ecm/css/about_us.css') }}" type="text/css"  />


<div class="container page" style="margin-top: 70px; margin-bottom: 40px;">
        <div id="entry" class="wrap">
                    <p>会社概要</p>              

                    <table class="table formTable">
                        <tbody>
                            <tr>
                                <th style="padding: 6px 0px; text-align: center;"> 会社名　
<!-- <span class="required">必須 </span> --></th>
                                <td style="padding: 6px 19px; ">ホクトウ水産</td>
                            </tr>  
<!--                             <tr>
                                <th style="padding: 6px 0px; text-align: center;">資本金 </th>
                                <td style="padding: 6px 19px; ">xxxx　万円</td>
                            </tr>  
                            <tr>
                                <th style="padding: 6px 0px; text-align: center;">設立</th>
                                <td style="padding: 6px 19px; ">平成0年0月0日</td>
                            </tr>   -->
<!--                             <tr>
                                <th style="padding: 6px 0px; text-align: center;">代表取締役 <span class="required">必須 </span></th>
                                <td style="padding: 6px 19px; ">澤口大輔</td>
                            </tr>   -->
<!--                             <tr>
                                <th style="padding: 6px 0px; text-align: center;">従業員数  <span class="required">必須 </span></th>
                                <td style="padding: 6px 19px; ">44名</td>
                            </tr>  --> 
                            <tr>
                                <th style="padding: 6px 0px; text-align: center;">所在地<!-- <span class="required">必須 </span> --></th>
                                <td style="padding: 6px 19px; ">東京都渋谷区幡ヶ谷2-7-6　3階</td>
                            </tr>  
                            <tr>
                                <th style="padding: 6px 0px; text-align: center;">TEL<!-- <span class="required">必須 </span> --></th>
                                <td style="padding: 6px 19px; ">0120-553-103　</td>
                            </tr>  
                            <tr>
                                <th style="padding: 6px 0px; text-align: center;">FAX<!-- <span class="required">必須 </span> --></th>
                                <td style="padding: 6px 19px; ">03-5967-1539</td>
                            </tr>  
                            <tr>
                                <th style="padding: 6px 0px; text-align: center;">ホームページ<!-- <span class="required">必須 </span> --></th>
                                <td style="padding: 6px 19px; color: #fff"><a style="color: #fff;" href= "https://hokutousuisan.com"> https://hokutousuisan.com</a></td>
                            </tr>  
                            <tr>
                                <th style="padding: 6px 0px; text-align: center;">E-Mail <!-- <span class="required">必須 </span> --></th>
                                <td style="padding: 6px 19px; ">support@hokutousuisan.com</td>
                            </tr>  
                            <tr>
                                <th style="padding: 6px 0px; text-align: center;">取り扱い商品<!-- <span class="required">必須 </span> --></th>
                                <td style="padding: 6px 19px; ">毛がに、タラバガニ、花咲がに、ずわいがになどの蟹類といくら醤油漬、生うに、牡蠣、お刺身秋刀魚などの旬の魚介類と アスパラ、メロン、じゃがいもなどの旬の野菜、果物。</td>
                            </tr>  
   
                        
                           
                        </tbody>
                    </table>
        </div>
</div>

@endsection 

