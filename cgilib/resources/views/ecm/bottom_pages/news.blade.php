
@extends('ecm.header')
 
@section('content')
<link rel="stylesheet" href="{{ URL::asset('/ecm/css/bottom_page.css') }}" type="text/css" media="screen" />

<div class="container page">
  <div class="middle">
      <h3 class="title">{{ $newsfeed->newsfeed_title }}</h3>
      <h2>Date: {{ $newsfeed->created_at }}
      <p> {!! $newsfeed->newsfeed_description !!} </p>
  </div>
</div>

@endsection 


<?php //include 'footer.php' ?>