<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <div class="flex">
                <p class="mt-2  font-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="#!">Settings</a></li>
                            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                            <li><hr class="dropdown-divider" /></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="ml-5 text-bold">
                                    @csrf
                                    <a class="nav-item dropdown" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

                 

        </div>
    </x-slot>
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
