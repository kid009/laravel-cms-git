@extends('layouts.home')

@section('content')
    @if ($post != null)
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-text">{{ $post->title }}</h4>
                <p class="card-text">{{ $post->description }}</p>
                <hr>
                <p class="card-text">{!! $post->content !!}</p>
                <hr>
                @foreach ($post->tags as $tag)
                    <span class="badge bg-info">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
    @else
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">Post Not Found</h4>
                <p class="card-text">The post you are looking for does not exist.</p>
            </div>
        </div>
    @endif
@endsection
