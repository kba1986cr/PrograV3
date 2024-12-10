<nav class="bg-gray-200 dark:bg-gray-800 dark:text-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    {{-- <svg class="w-8 h-8 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"> --}}
                        {{-- <img src="{{ asset('storage/Dibujos/imageCalendar.webp') }}" alt="Calendario" class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" > --}}
                    
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
                    <a href="{{ route('loggin') }}"
                    class="px-3 py-2 text-sm font-semibold rounded-md hover:text-sky-700 dark:hover:text-white {{ request()->routeIs('loggin.*') ? 'text-gray-800 dark:text-white' : 'text-slate-500' }}">
                    Calendario
                </a>
                    <a href="{{ route('registrarPuesto') }}"
                        class="px-3 py-2 text-sm font-semibold rounded-md hover:text-sky-700 dark:hover:text-white {{ request()->routeIs('registrarPuesto') ? 'text-gray-800 dark:text-white' : 'text-slate-500' }}">
                        Gestión de Puestos
                    </a>
                    <a href="{{ route('about') }}"
                        class="px-3 py-2 text-sm font-semibold rounded-md hover:text-sky-700 dark:hover:text-white {{ request()->routeIs('about') ? 'text-gray-800 dark:text-white' : 'text-slate-500' }}">
                        About
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-3 py-2 text-sm font-semibold rounded-md hover:text-sky-700 dark:hover:text-white {{ request()->routeIs('contact') ? 'text-gray-800 dark:text-white' : 'text-slate-500' }}">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
