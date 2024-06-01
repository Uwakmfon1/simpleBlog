<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        if (auth::check()) {
            $posts = Post::simplePaginate(6);
        } else {
            $posts = DB::table('posts')->limit(10)->get();   // --- either use this or above
            // $posts = Post::limit(10);//->simplePaginate(6);
        }

        foreach ($posts as $post) {
            $title = strtoupper($post->title);
            $id   =  $post->id;
            $slug = $post->slug;
            $body = $post->post;
        }

        return view('dashboard', [
            'id'=>$id,
            'posts' => $posts,
            'title'=>$title,
            'slug'=>$slug,
            'body'=>$body
        ]);
    }
   
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
