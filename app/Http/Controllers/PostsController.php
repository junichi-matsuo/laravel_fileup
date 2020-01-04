<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Http\Requests\CreatePostRequest;
use Carbon\Carbon;

class PostsController extends Controller
{
    //ログインしていないと、PostsController内の処理ができないようにする。
    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $posts = Post::all();
      return view('posts.index')->with('posts',$posts);
    }

    public function create() {
      return view('posts.create');
    }

    public function store(CreatePostRequest $request) {
            $nowtime = Carbon::now();
      //ログインしているユーザーを取得
      $user = Auth::user();
      //ファイル名取得
      $filename = $user->id . "_".$nowtime."_". $request->file('file')->getClientOriginalName();
      //storage/app/publicにファイルを保存する
      $request->file('file')->storeAs('public',$filename);

      $post = new Post();
      $post->title = $request->title;
      $post->path = '/storage/'.$filename;
      $user->posts()->save($post);
      session()->flash('flash_message', '投稿が完了しました');
      return redirect('posts/create');
    }

    public function edit(Post $post) {
      return view('posts.edit')->with('post',$post);
    }

    public function destroy(Post $post) {
      $post->delete();
      session()->flash('flash_message', '投稿画像を削除しました');
      return redirect('/');
    }
}
