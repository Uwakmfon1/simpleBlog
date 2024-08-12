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
            ->where('title', 'like', '%'. $search .'%' )
            ->orWhere('post', 'like', '%'. $search .'%' ));
    }
    

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

}
