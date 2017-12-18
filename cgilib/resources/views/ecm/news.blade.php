
@extends('ecm.header')
 
@section('content')

<!--           @foreach($newsfeed as $news)                
                @php  
                    $newsfeed_title   = $news->newsfeed_title; 
                    $newsfeed_description = $news->newsfeed_description; 
                    $created_at = $news->created_at; 
                @endphp 
          @endforeach -->


<div class="container page">
  <div class="middle">
      <h3 class="catagory_tit">{{ $newsfeed->newsfeed_title }}</h3>
      <p> {!! $newsfeed_description !!} </p>
  </div>
</div>

@endsection 