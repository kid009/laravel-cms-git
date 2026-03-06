@extends('layouts.app')

@section('content')
    <div class="container mt-3">

        <h2>Categories / Create</h2>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    @include('category._form')

                </form>
            </div>
        </div>
    </div>
@endsection
