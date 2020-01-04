@extends('layouts.app')

@section('content')

<div class="container">
  <div>
  <img src="{{$post->path}}" width="80%">
  </div>


  <form action="{{ action('PostsController@destroy',$post)}}" method="post">
  {{csrf_field()}}
  {{method_field('delete')}}
      <div class="row" style="margin-top:30px;">
    <button type="submit" class="btn btn-danger col-sm-3">削除する</button>
    </div>
  </form>

</div>

@endsection
