@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')


    <div class="container-fluid px-4">
        <main class="container px-3">
            <h1 class="mt-4 text-3xl font-bold">Create Post</h1>
            <br><br>

            <form action="store"  method="POST" enctype="multipart/form-data" class="ml-4 border-blue-900 rounded">
                @csrf
                <h1 class="font-bold ">Title of Blog</h1>
                <input type="text" name="title"><br><br>
                {{-- <h2 class="font-bold text-xl">Body</h2><br> --}}
                <h2 class="text-xl font-bold">Choose Image for the post</h2>
                <input type="file" id="image" name="image">
                @error('file')
                    <div class="text-red-600">The Image Field is required</div>
                @enderror
                <br><br>
                <h2>Write your Post</h2>
                <textarea name="newPost" id="newPost" cols="30" rows="10"></textarea><br>
                <button type="submit" class="bg-blue-400 text-white px-4 py-2 rounded">Post</button>
            </form>

            <br><br><br><br>
        </main>



    @endsection
</div>
