
@extends('ecm.header')
 
@section('content')

<link rel="stylesheet" href="{{ URL::asset('/ecm/css/bottom_page.css') }}" type="text/css" media="screen" />

<div class="container page">
      <h1 class="title">送料について</h1>

      <h2 class="sub-title">佐川急便でお届けします</h2>

      <span><pre style="color: #fff;">
        
          北海道 1000円    

          北海道　沖縄　離島以外 1180円      

          沖縄　離島 2800円       

          ※運送の都合上、一部の地域・離島で、お届けできない地域がございます。

          ※一箇所の配送先に対して、一送料です。     

          ※代金引換は別に手数料がかかります      

          代金引換手数料         

          1万円以下 324円        

          3万円以下 432円        

          10万円以下  642円
      </pre></span>
</div>

@endsection