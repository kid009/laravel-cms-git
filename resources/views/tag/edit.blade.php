@extends('layouts.app')

@section('content')
    <div class="container mt-3">

        <h2>Tags / Edit</h2>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('tag._form')

                </form>
            </div>
        </div>
    </div>
@endsection
