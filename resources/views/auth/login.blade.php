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
<body class="font-sans antialiased bg-gradient-to-b from-white to-[#4DB1E2] dark:bg-[#4DB1E2] dark:text-white">
    <!-- Consent Card -->
    <div id="consent-card" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h3 class="text-lg font-semibold text-gray-800">Consent Notice</h3>

            <p class="text-sm text-gray-600 mt-2">
                By using this system, you acknowledge that your personal data, including your personal information, lifestyle, interests, and preferences, will be visible to other users. This is essential for the system to function effectively and match you with others.
            </p>
            <p class="text-sm text-gray-600 mt-2">
                The information you provide is used solely for the purpose of enhancing the matchmaking process and fostering compatibility among users. Your data will be stored securely, and we are committed to ensuring that it is handled in compliance with applicable privacy laws and regulations. This includes protecting your information from unauthorized access and misuse.
            </p>
            <p class="text-sm text-gray-600 mt-2">
                By proceeding, you consent to the collection, use, and sharing of your data as described. You have the right to update or delete your information at any time through your profile settings. If you have concerns or questions about how your data is used, please contact support for assistance.
            </p>

            <p class="text-sm text-gray-600 mt-2">
                If you encounter any issues or have specific concerns regarding your profile, data, or the functionality of the system, our support team is here to help. You can reach us at <a href="mailto:muhamadaiman1957@gmail.com" class="text-blue-600">muhamadaiman1957@gmail.com</a> or call us at <a href="tel:+60169361759" class="text-blue-600">+1 (60) 16-936-1759</a>. We are available Monday to Friday, 9 AM to 5 PM (UTC).
            </p>
            <br>
            <br>
            <p class="text-sm text-gray-600 mt-2 text-end">
                <strong>Unimate Support Team</strong>  &copy; {{ date('Y') }} Unimate. All rights reserved.
            </p>



            <div class="mt-4 flex justify-end">
                <button id="agree-btn" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Agree and Continue
                </button>
            </div>
        </div>
    </div>

    <!-- Navbar Section -->
    <header class="bg-white dark:bg-white w-full shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
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
        <div class="card w-full max-w-md bg-white shadow-xl rounded-xl p-8 transform transition hover:scale-105 duration-300 ease-in-out">
            <!-- Card Header -->
            <div class="card-header text-center mb-6">
                <h2 class="text-3xl font-bold text-[#211d70]">{{ __('Student Login') }}</h2>
            </div>

            <!-- Logo Section -->
            <div class="mb-6 text-center">
                <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid mx-auto" style="max-width: 100px;">
            </div>

            <!-- Form Section -->
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Field -->
                    <div class="mb-5">
                        <label for="studentemail" class="block text-sm font-semibold text-gray-700 dark:text-gray-700 mb-2">{{ __('Student Email Address') }}</label>
                        <input id="studentemail" type="email" class="form-control w-full px-4 py-3 rounded-lg border-gray-300 dark:bg-gray-100 dark:border-gray-300 text-black @error('studentemail') is-invalid @enderror" name="studentemail" value="{{ old('studentemail') }}" required autocomplete="studentemail" autofocus>

                        @error('studentemail')
                            <span class="invalid-feedback text-red-500 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-5">
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-700 mb-2">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control w-full px-4 py-3 rounded-lg border-gray-300 dark:bg-gray-100 dark:border-gray-300 text-black @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback text-red-500 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="mb-5 flex items-center">
                        <input class="form-check-input mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-sm text-gray-700 dark:text-gray-700" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <!-- Submit Button & Forgot Password Link -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="px-6 py-3 w-full bg-[#211d70] text-white rounded-md transition transform hover:scale-105 duration-300 hover:bg-[#4DB1E2] font-semibold">
                            {{ __('Login') }}
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="mt-4 text-center">
                            <a class="text-sm text-[#211d70] hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-white dark:bg-white w-full shadow-md mt-8">
        <div class="container mx-auto px-6 py-8 flex justify-between items-start">
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

    <!-- JavaScript for Consent Card -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
    const consentKey = 'consentAgreed';
    const consentExpiryKey = 'consentExpiry';
    const consentDuration = 1 * 60 * 1000; // 1 minute in milliseconds

    const now = Date.now();
    const consentExpiry = localStorage.getItem(consentExpiryKey);

    // Show the consent card if not agreed or expired
    if (!consentExpiry || now > parseInt(consentExpiry)) {
        document.getElementById('consent-card').classList.remove('hidden');
    }

    document.getElementById('agree-btn').addEventListener('click', () => {
        // Set the consent agreement and expiry in local storage
        localStorage.setItem(consentKey, true);
        localStorage.setItem(consentExpiryKey, now + consentDuration);

        // Hide the consent card
        document.getElementById('consent-card').classList.add('hidden');
    });
});
    </script>
</body>
</html>
