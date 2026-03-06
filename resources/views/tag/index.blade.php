@extends('layouts.app')

@section('content')
    <div class="container mt-3">

        <h2>Tags</h2>

        <div class="card mt-3">
            <div class="card-header">
                <a href="{{ route('tags.create') }}" class="btn btn-primary">Add New Tag</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tag Name</th>
                            <th>Count of Posts</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->posts->count() }}</td>
                                <td>
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $tags->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

