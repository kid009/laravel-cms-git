<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;


class SidebarComposer
{
    public function compose(View $view): void
    {
        $categories = Cache::remember('categories', 3600, function () {
            return Category::select('id', 'name')->orderBy('name', 'asc')->get();
        });

        $tags = Cache::remember('tags', 3600, function () {
            return Tag::select('id', 'name')->orderBy('name', 'asc')->get();
        });

        $view->with([
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
}
