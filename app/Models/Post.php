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
        //Filter function for post. Used as "->filter()"
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
            ->where('title','LIKE', '%'.$search.'%' )
            ->orWhere('slug','LIKE','%'.$search.'%')
            ->orWhere('post','LIKE', '%'.$search.'%'));

            return $query;
    }



}
