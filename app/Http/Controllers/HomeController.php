<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
            $posts = Post::simplePaginate(12);
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

    public function auth(Request $request)
    {
        $filters = $request->only(['search']);
        $posts = Post::filter($filters)->paginate(9);
        $auth_user = Auth::user()->id;
        $postFromUSer = Post::where('user_id',$auth_user)->get();
        $totalUsers = User::whereNot('admin',1)->get();



        //if admin logged in
        if(Auth::user()->admin == 1){
            $getPosts = $this->getYourPosts($filters);
            return view('admin/auth/dashboard',
            ['postFromUser'=>$postFromUSer, 'getPosts'=>$getPosts,'totalUsers'=> $totalUsers,'posts'=>$posts]);
        }

        //  else
        return view('authView', [
            'posts' => $posts,
        ]);
    }

    public function fetchTotalUsers()
    {
        $totalUsers = User::whereNot('admin',1)->get();
        return view('admin/auth/signedUsers',['totalUsers'=>$totalUsers]);
    }

    protected function getYourPosts($filters)
    {
        $posts = Post::where('user_id',Auth::user()->id)->filter($filters)->get();
        return $posts;
    }


}
