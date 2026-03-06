@extends('layouts.app')

@section('content')
    <div class="container mt-3">

        <h2>Tags / Create</h2>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf

                    @include('tag._form')

                </form>
            </div>
        </div>
    </div>
@endsection
