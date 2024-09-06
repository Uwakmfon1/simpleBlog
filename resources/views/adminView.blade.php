<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <h2>
                <a href="{{ route('logout') }}" class="font-bold text-xl">
                    Logout
                </a>
            </h2>
        </div>
    </x-slot>
    <h1 class="bg-black font-bold text-xl">Admin View</h1>
    <br>
    <form action="#" method="GET" style="margin-left: 25px;">
        @csrf
        <input type="text" placeholder="search" name="search" value="{{ request('search') }}"
            style="height: 40px; width: 20%;">
    </form>

    <div class="py-12 bg-[{{ URL('images/bg1.jpg') }}]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($posts->count())
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
                </div>
                <br>
                {{ $posts->links() }}
            @else
                <div>
                    <h2>{{ request('search') }} Not Found</h2>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
