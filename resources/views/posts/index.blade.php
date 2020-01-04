@extends('layouts.app')

@section('content')

<div class="container">
  @if(session('flash_message'))
  <div class="alert alert-success" role="alert">{{ session('flash_message')}}</div>
  @endif
  <div class="row">
    @foreach($posts as $post)
    <div class="col-md-3" style="margin-top:10px;">
      <a href="{{ action('PostsController@edit',$post) }}"><img src="{{$post->path}}" width="95%"></a>
    <h3 style="margin-top:3px;text-align:center;">「{{ $post->title}}」</h3>
  </div>
    @endforeach

</div>
</div>

@endsection
