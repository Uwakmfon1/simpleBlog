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
                        <div><a href="{{ route('fetchTotalUsers') }}" class="font-bold"> {{ count( $totalUsers ) }}</a></div>

                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Success Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-16 flex flex-wrap gap-7 lg:gap-8 text-white">
                @foreach ($getPosts as $getPost)
                    <div class="bg-white fit-content w-80 p-6 rounded">
                        <a href="{{ url('/post/' . $getPost->id) }}" class="text-black">
                            <h2 class="font-bold text-xl font-mono">{{ strtoupper($getPost->title) }}</h2>
                            <p class="pt-5">{{ $getPost->slug }}</p>
                        </a>
                    </div>
                    <br>
                @endforeach
            </div>

            {{-- <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="ml-16 flex flex-wrap gap-7 lg:gap-8 text-white">
                        @foreach ($posts as $post)
                            <div class="bg-white fit-content w-80 p-6 rounded">
                                <a href="{{ url('/post/' . $post->id) }}" class="text-black">
                                    <h2 class="font-bold text-xl font-mono">{{ strtoupper($post->title) }}</h2>
                                    <p class="pt-5">{{ $post->slug }}</p>
                                </a>
                            </div>
                            <br>
                        @endforeach
                    </div> --}}


        @endsection
    </div>
