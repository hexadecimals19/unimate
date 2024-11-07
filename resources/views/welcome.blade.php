<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unimate</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-b from-white to-gray-200 dark:bg-black dark:text-white">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <!-- Logo Section -->
        <div class="mb-10">
            <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="mx-auto" style="max-width: 150px;">
        </div>

        <!-- Navigation Section -->
        @if (Route::has('login'))
            <nav class="flex space-x-4">
                @auth
                    <a href="{{ url('/home') }}" class="px-4 py-2 bg-[#FF2D20] text-white rounded-md transition hover:bg-[#e3261b]">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-[#FF2D20] text-white rounded-md transition hover:bg-[#e3261b]">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-300 text-black rounded-md transition hover:bg-gray-400">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</body>
</html>
