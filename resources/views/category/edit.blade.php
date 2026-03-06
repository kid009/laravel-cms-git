@extends('layouts.app')

@section('content')
    <div class="container mt-3">

        <h2>Categories / Edit</h2>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('category._form')

                </form>
            </div>
        </div>
    </div>
@endsection
