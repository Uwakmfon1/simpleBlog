<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
            ->where('title','LIKE', '%'.$search.'%' )
            ->orWhere('slug','LIKE','%'.$search.'%')
            ->orWhere('post','LIKE', '%'.$search.'%'));
            // ->paginate(9);
            return $query;
            // ->where('title','LIKE', '%'.strval(request('search')).'%' )
            // ->orWhere('post','LIKE', '%'.strval(request('search')).'%'));
    }



}
