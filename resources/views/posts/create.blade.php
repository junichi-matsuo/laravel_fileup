@extends('layouts.app')

@section('content')

<div class="container">
  <form method="post" action="/posts" enctype="multipart/form-data">
	{{ csrf_field() }}
  <div class="form-group">
  <label>投稿する画像のタイトルを入力してください</label>
  <input type="text" name="title" class="form-control col-sm-4" value="{{ old('title')}}">
  </div>

  <div class="form-group">
  <label>投稿する画像を選んでください</label>
	<input type="file" id="file" name="file" class="form-control col-sm-4">
  </div>
  <div class="form-group">
	<button type="submit" class="btn btn-primary">アップロード</button>
  </div>
	</form>

  @if ($errors->has('title'))
  <div class="alert alert-danger" role="alert">{{$errors->first('title')}}</div>
  @endif

  @if ($errors->has('file'))
  <div class="alert alert-danger" role="alert">{{$errors->first('file')}}</div>
  @endif

  @if (session('flash_message'))
  <div class="alert alert-success" role="alert">{{ session('flash_message')}}</div>
  @endif

</div>


@endsection
