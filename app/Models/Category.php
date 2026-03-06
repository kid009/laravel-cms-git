<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Define the relationship with Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
