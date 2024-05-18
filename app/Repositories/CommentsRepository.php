<?php
namespace App\Repositories;

use App\Models\Post;

class CommmentsRepository{
    public function edit($id)
{
    return Post::edit($id);
}

}
//
