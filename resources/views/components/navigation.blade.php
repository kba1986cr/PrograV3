{{-- <ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('about') }}">About</a></li>
    <li><a href="{{ route('contact') }}">Contact</a></li>
    <li><a href="{{ route('loggin') }}">Loggin</a></li>
</ul> --}}

{{-- <nav>
    <ul>
        <li class="{{ request()->routeIs('home') ? 'text-green-400' : 'text-gray-600' }}"><a href="{{ route ('home') }}">Home</a></li>
        <li class="{{ request()->routeIs('posts.*') ? 'text-green-400' : 'text-gray-600' }}"><a href="{{ route ('posts.index') }}">Blog</a></li>
        <li class="{{ request()->routeIs('about') ? 'text-green-400' : 'text-gray-600' }}"><a href="{{ route ('about') }}">About</a></li>
        <li class="{{ request()->routeIs('contact') ? 'text-green-400' : 'text-gray-600' }}"><a href="{{ route ('contact') }}">Contacto</a></li>
    </ul>
</nav> --}}

{{-- <nav
    class="w-screen overflow-scroll bg-white border-b dark:bg-slate-900 border-slate-900/10 lg:px-8 dark:border-slate-300/10 lg:mx-0">
    <nav
        class="w-screen overflow-scroll bg-white border-b dark:bg-black/40 border-slate-900/10 lg:px-8 dark:border-slate-300/10 lg:mx-0">
        <div class="px-4 mx-auto max-w-7xl sm:px-16 lg:px-20">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                    <div class="flex items-center flex-shrink-0">
                        <a href="{{ route('home') }}">
                            <svg class="w-8 h-8 text-sky-500" fill="none" width="0" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">  Aca va el signo de loggin
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="mx-auto">
                        <div class="flex space-x-4">
                            <a href="{{ route('home') }}"
                                class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('home') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                Home
                            </a>
                            <a href="{{ route('about') }}"
                                class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('about') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                About
                            </a>
                            <a href="{{ route('contact') }}"
                                class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('contact') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                Contact
                            </a>
                            <a href="{{ route('loggin') }}" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('loggin.*') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                Loggin
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav> --}}

<nav class="bg-gray-200 dark:bg-gray-900 shadow-lg dark:border-gray-300/10 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    {{-- <svg class="w-8 h-8 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"> --}}
                        {{-- <img src="{{ asset('storage/img/imageCalendar.webp') }}" alt="Calendario" class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" > --}}
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />

                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                        </path>
                    </svg>
                </a>
            </div>
            <!-- Menu Rutas -->
            <div class="mx-auto">
                <div class="flex space-x-4">
                    <a href="{{ route('home') }}"
                        class="px-3 py-2 text-sm font-semibold no-underline hover:text-sky-700 dark:hover:text-white {{ request()->routeIs('home') ? 'text-gray-800 dark:text-white' : 'text-slate-400' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}"
                        class="px-3 py-2 text-sm font-semibold no-underline hover:text-sky-700 dark:hover:text-white {{ request()->routeIs('about') ? 'text-gray-800 dark:text-white' : 'text-slate-400' }}">
                        About
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-3 py-2 text-sm font-semibold no-underline hover:text-sky-700 dark:hover:text-white {{ request()->routeIs('contact') ? 'text-gray-800 dark:text-white' : 'text-slate-400' }}">
                        Contact
                    </a>
                    <a href="{{ route('loggin') }}"
                        class="px-3 py-2 text-sm font-semibold no-underline hover:text-sky-700 dark:hover:text-white {{ request()->routeIs('loggin.*') ? 'text-gray-800 dark:text-white' : 'text-slate-400' }}">
                        Loggin
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
