<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unimate - Verify Email</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-b from-white to-[#4DB1E2] dark:bg-[#4DB1E2] dark:text-white">
    <!-- Navbar Section -->
    <header class="bg-white dark:bg-white w-full shadow-md">
        <div class="container mx-auto px-2 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="mr-3" style="max-width: 50px;">
                <span class="text-xl font-semibold" style="color: #211d70;">Unimate</span>
            </div>

            <!-- Navigation -->
            <nav class="flex space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="px-4 py-2 bg-[#211d70] text-white rounded-md transition hover:bg-[#1a1b4d]">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-[#211d70] text-white rounded-md transition hover:bg-[#1a1b4d]">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-300 text-black rounded-md transition hover:bg-gray-400">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center px-4 lg:px-0">
        <!-- Card Section -->
        <div class="card w-full max-w-md bg-white shadow-lg rounded-xl p-8 transform transition hover:scale-105 duration-300 ease-in-out">
            <!-- Card Header -->
            <div class="card-header text-center mb-6">
                <h2 class="text-3xl font-bold text-[#211d70]">{{ __('Email Verification') }}</h2>
            </div>

            <!-- Form Section -->
            <form method="POST" action="{{ route('verification.verify') }}">
                @csrf

                <div class="mb-5">
                    <label for="verification_code" class="block text-sm font-semibold text-gray-700 dark:text-gray-700 mb-2">Verification Code:</label>
                    <input type="text" id="verification_code" name="verification_code" class="form-control w-full px-4 py-3 rounded-lg border-gray-300 dark:bg-gray-100 dark:border-gray-300 text-black" required pattern="\d{6}" title="Please enter a 6-digit code" maxlength="6">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full px-6 py-3 mt-4 bg-[#211d70] text-white rounded-md transition transform hover:scale-105 duration-300 hover:bg-[#4DB1E2] font-semibold">
                    Verify Email
                </button>
            </form>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mt-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-white dark:bg-white w-full shadow-md mt-8">
        <div class="container mx-auto px-2 py-8 flex justify-between items-start">
            <!-- Resources, Help, Company Columns -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Resources Column -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-800 mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="https://library.uitm.edu.my/" class="text-gray-600 hover:text-[#211d70]" target="_blank">UiTM Library</a></li>
                        <li><a href="https://online.uitm.edu.my/" class="text-gray-600 hover:text-[#211d70]" target="_blank">Online Learning Portal</a></li>
                        <li><a href="https://student.uitm.edu.my/" class="text-gray-600 hover:text-[#211d70]" target="_blank">Student Portal</a></li>
                        <li><a href="https://uitm.edu.my/" class="text-gray-600 hover:text-[#211d70]" target="_blank">Official UiTM Website</a></li>
                    </ul>
                </div>

                <!-- Help Column -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-800 mb-4">Help</h3>
                    <ul class="space-y-2">
                        <li><a href="https://uitm.edu.my/index.php/en/contact-us" class="text-gray-600 hover:text-[#211d70]" target="_blank">Contact Us</a></li>
                        <li><a href="https://online.uitm.edu.my/support/" class="text-gray-600 hover:text-[#211d70]" target="_blank">Get Help</a></li>
                        <li><a href="https://student.uitm.edu.my/status/" class="text-gray-600 hover:text-[#211d70]" target="_blank">Order Status</a></li>
                        <li><a href="https://uitm.edu.my/index.php/en/delivery" class="text-gray-600 hover:text-[#211d70]" target="_blank">Delivery</a></li>
                        <li><a href="https://uitm.edu.my/index.php/en/payment-options" class="text-gray-600 hover:text-[#211d70]" target="_blank">Payment Options</a></li>
                    </ul>
                </div>

                <!-- Company Column -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-800 mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="https://uitm.edu.my/index.php/en/about-uitm" class="text-gray-600 hover:text-[#211d70]" target="_blank">About UiTM</a></li>
                        <li><a href="https://news.uitm.edu.my/" class="text-gray-600 hover:text-[#211d70]" target="_blank">News</a></li>
                        <li><a href="https://uitm.edu.my/index.php/en/careers" class="text-gray-600 hover:text-[#211d70]" target="_blank">Careers</a></li>
                        <li><a href="https://uitm.edu.my/index.php/en/investors" class="text-gray-600 hover:text-[#211d70]" target="_blank">Investors</a></li>
                        <li><a href="https://uitm.edu.my/index.php/en/sustainability" class="text-gray-600 hover:text-[#211d70]" target="_blank">Sustainability</a></li>
                    </ul>
                </div>
            </div>
            <!-- Logo and All Rights Reserved -->
            <div class="flex flex-col items-end justify-start">
                <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="mb-4" style="max-width: 100px;">
                <p class="text-sm text-gray-600 dark:text-gray-800">&copy; 2024 UiTM. All rights reserved.</p>
                <p class="text-sm text-gray-600 dark:text-gray-800 mt-2">
                    For more information, visit the
                    <a href="https://uitm.edu.my/" class="text-[#211d70] hover:underline" target="_blank">Official UiTM Website</a>.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
