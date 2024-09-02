                    {{-- <br><br> --}}
                    <x-app-layout>
                    <x-slot name="header">
                        <div class="flex justify-between">
                            {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Dashboard') }}
                            </h2> --}}
                            <h2></h2>
                            <div class="flex">
                                @if (Auth::user())
                                <p class="mt-2  font-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                            <li><a class="dropdown-item" href="#!">Settings</a></li>
                                            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                                            <li>
                                                <hr class="dropdown-divider" />
                                            </li>

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

                                @else
                              <p class="mt-2  font-bold">Guest</p>
                                @endif

                            </div>

                        </div>
                    </x-slot>
                    <br><br>
                    <main class="container px-3">
                        <h1 class="text-black font-bold text-lg">{{ $title }}</h1> <br>

                        <div class="grid lg:grid-cols-3 gap-7  lg:gap-8 text-white">
                          <h2 class="text-black">{{ $post }}</h2>
                        </div>


                        <br><br><br><br>
                        <h2>Comments</h2>
                        <section>
                            <article class="flex bg-gray-200 p-6 m-2">
                                <div>
                                    <img src="https://i.pravatar.cc/100" alt="">
                                </div>
                                <div>
                                    <header>
                                        <h3>John Doe</h3>
                                        <p>Posted
                                            <time>2 Months ago</time>
                                        </p>
                                    </header>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Magni ad beatae molestiae autem a. Expedita natus consequatur laborum totam animi.</p>
                                </div>
                            </article>
                        </section>
                    </main>

{{--
    </body>
</html> --}}
</x-app-layout>

