<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    
     /*
      Create a new controller instance.
     
      @return void
     */
    public function authUser()
    {
        $this->middleware('auth');
    }
    public function showAll(){
        $posts = Post::paginate(10); /* получаем все посты при помощи модели Post */
        return view('index', ['posts' => $posts]); 
    }
    public function create(Request $request){
        $user = Auth::user();
        $post = new Post;
        $post->title = $request->title;
        $post->author = $user->name;
        $post->text = $request->text;
        $post->positive = 0;
        $post->negative = 0;
        $post->save();

        return redirect('/');
    }
    public function show($id){
        $post = Post::find($id);
        return view('show_post', $post);
    }
    public function increasePositive($id){
        $post = Post::find($id);
        $post->positive++;
        $post->save();
        return back();
    }
    public function increaseNegative($id){
        $post = Post::find($id);
        $post->negative++;
        $post->save();
        return back();
    }

}