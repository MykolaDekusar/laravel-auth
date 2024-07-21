@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-primary col-3 mt-4" href="{{ route('admin.projects.create') }}">Crea nuovo post</a>
        <div class="row justify-content-center">
            @if ($posts->isEmpty())
                <h1>Mi dispiace {{ Auth::user()->name }} i post sono vuoti</h1>
                <div class="d-flex justify-content-center align-intems-center">
                    <h2>Vuoi creare un nuovo post? </h2>
                    <a class="btn btn-primary" href="">Crea nuovo post</a>
                </div>
            @endif

            <div class="mt-4">{{ $posts->links() }}</div>
            @foreach ($posts as $data)
                <div class="col-12 mt-2">
                    <div class="card p-3 text-center">
                        <h2>{{ $data->title }}</h2>
                        <div class="image">
                            <img src="{{ $data->image }}" alt="">
                        </div>
                        <div class="d-flex buttons justify-content-between">
                            <a class="btn btn-success" href="{{ route('admin.projects.show', $data) }}">Details</a>
                            <form action="{{ route('admin.projects.destroy', $data) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="mt-4">{{ $posts->links() }}</div>
        </div>
    </div>
@endsection
