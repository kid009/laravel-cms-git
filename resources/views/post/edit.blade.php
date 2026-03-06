@extends('layouts.app')

@section('content')
    <div class="container mt-3">

        <h2>Posts / Edit</h2>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('post._form')

                </form>
            </div>
        </div>
    </div>
@endsection
