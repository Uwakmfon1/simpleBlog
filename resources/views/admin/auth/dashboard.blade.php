@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')


    <div class="container-fluid px-4">
        <h1 class="mt-4 text-3xl font-bold">Dashboard</h1>
        <br>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body text-xl font-bold">Total Publication</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div><a href="#" class="font-bold"> {{ count($postFromUser) }}</a></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body text-xl font-bold">Signed Up Users</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div><a href="{{ route('fetchTotalUsers') }}" class="font-bold"> {{ count($totalUsers) }}</a>
                        </div>

                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @php
    dd( session());
    @endphp --}}

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-16 flex flex-wrap gap-7 lg:gap-8 text-white">
                @foreach ($getPosts as $getPost)
                    <div class="bg-white fit-content w-80 p-6 rounded">
                        <a href="{{ url('/post/' . $getPost->id) }}" class="text-black">
                            <img src="{{ asset('public/images/' . $getPost->image) }}" alt="img">
                            <h2 class="font-bold text-xl font-mono">{{ strtoupper($getPost->title) }}</h2>
                            <p class="pt-5">{{ $getPost->slug }}</p>
                        </a>
                    </div>
                    <br>
                @endforeach
            </div> <br><br>

            <a href="{{ route('create') }}" class="bg-blue-500 text-white p-4" type="button">Make a New Post</a>

        @endsection
    </div>
