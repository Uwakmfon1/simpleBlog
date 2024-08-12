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
            // $posts = DB::table('posts')->limit(8)->get();
            $posts = Post::simplePaginate(9); //->limit(8)->get();
            // $posts = Post::limit(10);//->simplePaginate(6);               // --- either use this or above
        }

        foreach ($posts as $post) {
            $title = strtoupper($post->title);
            $id   =  $post->id;
            $slug = $post->slug;
            $body = $post->post;
        }


        return view('dashboard', [
            'id'=>$id,
            'posts' => $posts,//Post::latest()->filter(request(['search']))->get(),
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

    public function search()
    {
        dd(request('search'));
    }



}
