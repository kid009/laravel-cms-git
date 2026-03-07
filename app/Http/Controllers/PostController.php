<?php

namespace App\Http\Controllers;

use App\Actions\Post\CreatePostAction;
use App\Actions\Post\DeletePostAction;
use App\Actions\Post\UpdatePostAction;
use App\DTOs\Post\CreatePostData;
use App\DTOs\Post\UpdatePostData;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);

        return view('post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', [
            'post' => new Post(),
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request, CreatePostAction $action)
    {
        $dto = new CreatePostData(
            title: $request->validated('title'),
            description: $request->validated('description'),
            content: $request->validated('content'),
            categoryId: $request->validated('category_id'),
            userId: Auth::user()->id,
            tagIds: $request->validated('tag_ids') ?? []
        );

        $action->execute($dto);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id, UpdatePostAction $action)
    {
        $post = Post::findOrFail($id);

        $data = new UpdatePostData(
            title: $request->validated('title'),
            description: $request->validated('description'),
            content: $request->validated('content'),
            categoryId: $request->validated('category_id'),
            tagIds: $request->validated('tag_ids') ?? []
        );

        $action->execute($data, $post);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DeletePostAction $action)
    {
        $post = Post::findOrFail($id);

        $action->execute($post);

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
