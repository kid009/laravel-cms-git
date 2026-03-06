@extends('layouts.home')

@section('content')
    <div class="nav-scroller py-1 mb-5">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="/">Home</a>
            @foreach ($categories as $category)
                <a class="p-2 link-secondary" href="#">{{ $category->name }}</a>
            @endforeach
        </nav>
    </div>

    @foreach ($posts as $post)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $post->category->name }}</h4>
                <p class="card-text">{{ $post->title }}</p>
            </div>
        </div>
    @endforeach
@endsection
