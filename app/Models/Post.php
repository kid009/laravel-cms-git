<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'description',
        'content',
    ];

    // Define the relationship with Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with Tag
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
