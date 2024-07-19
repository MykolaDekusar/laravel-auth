@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <h1 class="p-3">Welcome to your page {{ Auth::user()->name }}</h1>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="d-flex mt-4 justify-content-between">
                            {{ __('You are logged in!') }}
                            <a class="btn btn-danger " href="{{ route('admin.posts') }}" type="button">Go to posts</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
