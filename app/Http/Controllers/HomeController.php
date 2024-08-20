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
            return redirect('/auth');
        } else {
            $posts = Post::simplePaginate(9);
        }

        foreach ($posts as $post) {
            $title = strtoupper($post->title);
            $id   =  $post->id;
            $slug = $post->slug;
            $body = $post->post;
        }


        return view('dashboard', [
            'id'=>$id,
            'posts' => $posts, //Post::latest()->filter(request(['search']))->get(),
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
    

    public function auth(Request $request)
    {
        $filters = $request->only(['search']);
        $posts = Post::filter($filters)->paginate(9);    //latest()->filter(request(['search']))->paginate(6);

        return view('authView', [
            'posts' => $posts,
        ]);

    }




}
