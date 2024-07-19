@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-2">
                <div class="card p-3">
                    <h2>{{ $data->title }}</h2>
                    <h5>{{ $data->description }}</h5>
                    <div class="image">
                        <img src="{{ $data->image }}" alt="">
                    </div>
                    <p>Creato il: {{ $data->created_at }}</p>
                    <div><a class="btn btn-success" href="{{ route('admin.projects.edit', $data->id) }}">Modify Post</a>
                    </div>
                    <form action="{{ route('admin.projects.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete Post</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
