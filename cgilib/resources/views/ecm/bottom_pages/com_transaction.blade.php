
@extends('ecm.header')
 
@section('content')
<link rel="stylesheet" href="{{ URL::asset('/ecm/css/bottom_page.css') }}" type="text/css" />

<div class="container page">
    <h1 class="title">特定商取引法に基づく表記</h1>
      <table class="table">
          <tbody class="row-hover">
              <tr class="row-1 odd">
                <td class="column-1">販売業者</td>
                <td class="column-2">ホクトウ水産</td>
              </tr>
              <tr class="row-2 even">
                <td class="column-1">代表者</td>
                <td class="column-2"> 販売責任者　澤口大輔</td>
              </tr>
              <tr class="row-3 odd">
                <td class="column-1">住所</td
                  ><td class="column-2"> 東京都渋谷区幡ヶ谷2-7-6　3階</td>
              </tr>
              <tr class="row-4 even">
                <td class="column-1">電話番号</td>
                <td class="column-2"> 0120-553-103</td>
              </tr>
              <tr class="row-4 even">
                <td class="column-1">FAX番号</td>
                <td class="column-2">  03-5967-1539</td>
              </tr>
              <tr class="row-6 even">
                <td class="column-1">Emaiｌ</td>
                <td class="column-2">support@hokutousuisan.com</td>
              </tr>
              <tr class="row-7 odd">
                <td class="column-1">URL</td>
                <td class="column-2"> https://hokutousuisan.com/</td>
              </tr>
              <tr class="row-8 even">
                <td class="column-1">注文方法</td>
                <td class="column-2">電話　FAX　インターネット</td>
              </tr>
              <tr class="row-9 odd">
                <td class="column-1">お支払方法</td>
                <td class="column-2">クレジットカード決済<br>
                    銀行振り込み<br>
                    代金引換</td>
              </tr>
              <tr class="row-10 even">
                <td class="column-1">商品代金以外の費用</td>
                <td class="column-2">送料　振込手数料　代引き手数料</td>
              </tr>
              <tr class="row-11 odd">
                <td class="column-1">お支払期限</td><td class="column-2">銀行振り込みの場合は、ご注文当日含め、2日以内にお願いします</td>
              </tr>
              <tr class="row-12 even">
                <td class="column-1">商品の引き渡し時期</td>
                <td class="column-2">
                    商品のお届けは、ご入金確認後、1週間程でお届けいたします。<br>ギフトーシーズンなど混み合っているの場合は、10日前後でのお届けとなる場合がございます。予めご了承下さい。
                    <ul>
                      <li>※通常商品の場合、7日後～60日以内のお届け希望日を選択することも可能で</li>
                      <li>※旬商品(生鮮品)など、商品によっては「お届け期間」が限定される場合がございます。各商品ページで詳しくご案内しております。ご確認ください。</li>
                      <li>※旬商品(生鮮品)などは、漁模様や収穫の都合上、ご希望日に添えない場合がございます。予めご了承下さい。</li>
                    </ul>
                    <p>
                      お届け希望日は、運送会社にお客様のお届け希望日を伝えるもので、 当店でお届け日を保証するものではありません。また天候・道路事情等により、お届け希望日、時間帯にお届けできない事もございます。
                    </p>
                    <p> ■発送について</p>
                    <p> 商品は、佐川急便でのお届けとなります。</p>
                    <p> 一部の旬商品(生鮮品)のご注文につきましては、ヤマト航空やその他の運送会社でのお届けとなります。</p>
                    <p> ご注文商品に冷凍品を含む場合は、全て【冷凍便】でのお届けとなります。</p>
                    <p> 旬商品(生鮮品)は、商品の特性上、他の通常商品との同送・同梱はできません。</p>
                    <p> お届け先一箇所、一温度帯に対して、一送料とさせていただきます。</p>
                    <p> 商品の発送は、日本国内に限らせていただきます</p>
                </td>
              </tr>
              <tr class="row-13 odd">
                <td class="column-1">返品　キャンセルについて</td>
                <td class="column-2">
                  <ul>
                      <li>■返品・交換について</li>
                      <li>
                        商品の性質上、お客様のご都合による返品、交換は致しかねます。ご注文と異なる商品の場合(数量不足・不良品)は、送料と共に、弊社負担にて新品をお届け致します。品質管理には十分留意しておりますが、万一容器の破損や汚損、もしくは品質に問題があった場合には、直ちに、ご連絡下さい。お話し合いの上、責任をもって対応させていただきます。なお、すべてお召し上がりになられた後でのご連絡の場合は、返品・交換出来かねますので、ご了承ください。
                      </li>
                      <li> ■キャンセルについて</li>
                      <li>
                        ご注文内容変更・キャンセルにつきましては、ご注文頂いた当日中に、上記のお問合せ先(お電話又はメール)にて、ご連絡下さい。確認の為、お客様のお申込番号、お名前、お電話番号をお知らせ願います。ご注文日の翌日以降のご変更の場合、お届けの希望日に間に合わない場合がございます。予めご了承下さい。
                      </li>
                  </ul>
                </td>
              </tr>
          </tbody>
      </table>
</div>

@endsection