<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Blog Sederhana') }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

<!-- Navbar -->
<nav class="bg-blue-600 text-white shadow-md">
    <div class="container mx-auto flex items-center justify-between px-6 py-4 lg:py-5">
        <!-- Logo -->
        <a href="{{ route('posts.index') }}" class="font-bold text-xl tracking-wide">
            {{ config('app.name', 'Blog Sederhana') }}
        </a>

        <!-- Tombol mobile -->
        <button class="lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Menu -->
        <ul class="hidden lg:flex space-x-8 text-lg">
            @auth
                @if(Auth::user()->role === 'admin')
                    <li><a href="{{ route('users.index') }}" class="hover:underline">Manajemen User</a></li>
                    <li><a href="{{ route('categories.index') }}" class="hover:underline">Manajemen Kategori</a></li>
                @endif

                @if(Auth::user()->role === 'author')
                    <li><a href="{{ route('posts.create') }}" class="hover:underline">Tambah Post</a></li>
                @endif

                <li><span class="font-medium">{{ Auth::user()->name }}</span></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>


    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 mt-auto border-t">
        <small>© {{ date('Y') }} Blog Sederhana · Dibuat dengan Laravel & TailwindCSS</small>
    </footer>
</body>
</html>
