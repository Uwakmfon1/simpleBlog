<x-app-layout>
    @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth

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
                <form action="#" method="GET">
                    <h2>Simple Blog init</h2>
                    <input
                        type="text"
                        placeholder="search blog posts"
                        name="search"
                        value="{{ request('search') }}"
                        style="height: 50px; width: 200px">
                </form>
          
            @else
                <x-slot name="header">
                    <div class="flex justify-between">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Welcome') }}
                        </h2>
                        <span class="flex">
                            <h2 class="font-semibold text-xl text-black  leading-tight">
                                <a href="{{ route('login') }}"
                                    class="rounded-md text-xl px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    {{ __('Login') }}
                                </a>
                            </h2>
                            @if (Route::has('register'))
                                <h2 class="font-semibold text-xl  leading-tight">
                                    <a href="{{ route('register') }}"
                                        class="rounded-md text-xl px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Register
                                    </a>
                                </h2>
                            @endif
                        </span>
                    </div>
                </x-slot>
            @endauth
        </nav>
    @endif

    </header>

    @if(auth()->guest())
    <div></div>
@else



@endif


    <div class="py-12">
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
            </div>



            <br>
            <br>
            <br>
            <br>
            @if(auth()->guest())

            <h3>Nothing here, <a href="{{ route('register') }}" class="text-purple-900">sign up for more interesting stories</a></h3>
            @else
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
