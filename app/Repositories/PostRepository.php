<?php
namespace App\Repositories;

use App\Models\Post;

class PostRepository{
    protected $postRepository;

    public function get()
    {
        return Post::latest()->get();
    }

    public function find($id)
    {
        return Post::where('id',$id)->first();
    }
}
//


