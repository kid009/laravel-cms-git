@extends('layouts.app')

@section('content')
    <div class="container mt-3">

        <h2>Posts</h2>

        <div class="card mt-3">
            <div class="card-header">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New Post</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->tags->count()}}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="btn btn-sm btn-outline-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
