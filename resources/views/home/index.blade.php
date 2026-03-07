@extends('layouts.home')

@section('content')

    @if ($posts != null && $posts->count() > 0)
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <a href="{{ route('home.show', $post->id) }}" class="text-decoration-none">
                        <h4 class="card-text">{{ $post->title }}</h4>
                    </a>
                    <p class="card-text">{{$post->description}}</p>

                    @foreach ($post->tags as $tag)
                        <span class="badge bg-info">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        @endforeach
    @else
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title text-danger">ไม่ค้นพบข้อมูลบทความ</h4>
            </div>
        </div>
    @endif


    <div class="d-flex justify-content-center mt-3">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
