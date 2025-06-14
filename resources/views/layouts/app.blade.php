<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Cleaning Service')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    <header class="bg-white dark:bg-gray-800 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a href="{{ url('/') }}" class="font-extrabold text-xl text-indigo-600 dark:text-indigo-400 tracking-wide">Ham & Cleaning</a>
            <nav>
                <ul class="flex space-x-2 md:space-x-4 items-center">
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}"
                               class="px-3 py-2 rounded transition font-semibold {{ request()->routeIs('dashboard') ? 'bg-indigo-100 text-indigo-700 dark:bg-indigo-900 dark:text-white' : 'hover:text-indigo-700 dark:hover:text-indigo-300 text-gray-700 dark:text-gray-200' }}">
                                <i data-feather="home" class="inline w-4 h-4 mr-1"></i> Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.index') }}"
                               class="px-3 py-2 rounded transition font-semibold {{ request()->routeIs('services.*') ? 'bg-indigo-100 text-indigo-700 dark:bg-indigo-900 dark:text-white' : 'hover:text-indigo-700 dark:hover:text-indigo-300 text-gray-700 dark:text-gray-200' }}">
                                <i data-feather="layers" class="inline w-4 h-4 mr-1"></i> Services
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('bookings.index') }}"
                               class="px-3 py-2 rounded transition font-semibold {{ request()->routeIs('bookings.*') ? 'bg-indigo-100 text-indigo-700 dark:bg-indigo-900 dark:text-white' : 'hover:text-indigo-700 dark:hover:text-indigo-300 text-gray-700 dark:text-gray-200' }}">
                                <i data-feather="calendar" class="inline w-4 h-4 mr-1"></i> Bookings
                            </a>
                        </li>
                        <li class="relative">
                            <button id="profileDropdownButton" type="button" class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 dark:hover:bg-indigo-900 transition focus:outline-none font-semibold text-gray-700 dark:text-gray-200">
                                <i data-feather="user" class="inline w-4 h-4 mr-1"></i>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div id="profileDropdownMenu" class="hidden absolute right-0 mt-2 w-44 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded shadow z-50">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Edit Profil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Logout</button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="px-3 py-2 rounded transition font-semibold hover:text-indigo-700 dark:hover:text-indigo-300 text-gray-700 dark:text-gray-200">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="px-3 py-2 rounded transition font-semibold hover:text-indigo-700 dark:hover:text-indigo-300 text-gray-700 dark:text-gray-200">Register</a>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto p-6">
        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white dark:bg-gray-800 shadow-inner p-4 text-center text-sm text-gray-600 dark:text-gray-400">
        &copy; {{ date('Y') }} Cleaning Service. All rights reserved.
    </footer>
    <script>
      feather.replace()
      // Dropdown toggle
      document.addEventListener('DOMContentLoaded', function () {
          const btn = document.getElementById('profileDropdownButton');
          const menu = document.getElementById('profileDropdownMenu');
          if(btn && menu){
              btn.addEventListener('click', function (e) {
                  e.stopPropagation();
                  menu.classList.toggle('hidden');
              });
              document.addEventListener('click', function () {
                  menu.classList.add('hidden');
              });
          }
      });
    </script>
</body>
</html>