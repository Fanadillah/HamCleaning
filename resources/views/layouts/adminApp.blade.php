<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    <header class="bg-indigo-700 dark:bg-gray-800 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a href="{{ url('/') }}" class="font-extrabold text-2xl text-white tracking-wide">Admin Panel</a>
            <nav>
                <ul class="flex space-x-2 md:space-x-4 items-center">
                    @auth
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded hover:bg-indigo-600 hover:text-white transition {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-900 text-white' : 'text-indigo-100' }}">
                                <i data-feather="home" class="inline w-4 h-4 mr-1"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.services.index') }}" class="px-3 py-2 rounded hover:bg-indigo-600 hover:text-white transition {{ request()->routeIs('admin.services.*') ? 'bg-indigo-900 text-white' : 'text-indigo-100' }}">
                                <i data-feather="layers" class="inline w-4 h-4 mr-1"></i> Services
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.bookings.index') }}" class="px-3 py-2 rounded hover:bg-indigo-600 hover:text-white transition {{ request()->routeIs('admin.bookings.*') ? 'bg-indigo-900 text-white' : 'text-indigo-100' }}">
                                <i data-feather="calendar" class="inline w-4 h-4 mr-1"></i> Booking
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="px-3 py-2 rounded hover:bg-red-600 hover:text-white transition text-red-100 flex items-center">
                                    <i data-feather="log-out" class="inline w-4 h-4 mr-1"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="px-3 py-2 rounded hover:bg-indigo-600 hover:text-white transition text-indigo-100">Login</a></li>
                        <li><a href="{{ route('register') }}" class="px-3 py-2 rounded hover:bg-indigo-600 hover:text-white transition text-indigo-100">Register</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto p-6">
        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded shadow">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-indigo-700 dark:bg-gray-800 shadow-inner p-4 text-center text-sm text-indigo-100 dark:text-gray-400">
        &copy; {{ date('Y') }} Cleaning Service. All rights reserved.
    </footer>
    <script>
      feather.replace()
    </script>
</body>
</html>