<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unimate</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/unimatelogo.png') }}" type="image/png">

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
                            View Colleges
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

    <!-- Main Hero Section -->
    <section class="bg-[#4DB1E2] text-white py-20">
        <div class="container mx-auto text-center">
            <!-- Logo -->
            <img
                src="{{ asset('images/unimatelogo.png') }}"
                alt="Unimate Logo"
                class="mx-auto mb-6"
                style="max-width: 200px; width: 100%; height: auto;"
            >

            <!-- Heading -->
            <h1 class="text-5xl font-bold mb-6">Welcome to Unimate</h1>

            <!-- Subtext -->
            <p class="text-lg mb-10">
                Your one-stop platform for connecting with students, exploring colleges, and experiencing campus life like never before!
            </p>

            <!-- Call to Action Button -->
            <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-[#211d70] font-semibold rounded-lg shadow-md transition hover:bg-gray-100">
                Join Us Today
            </a>
        </div>
    </section>


    <!-- Features Section -->
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-12">Why Choose Unimate?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Feature 1 -->
                <div class="p-8 bg-[#4DB1E2] rounded-lg shadow-lg">
                    <div class="mb-4">
                        <i class="fas fa-graduation-cap text-4xl text-[#4DB1E2]"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Explore Colleges</h3>
                    <p>Get detailed insights about various colleges, their programs, and student life, and make informed decisions about your future.</p>
                </div>
                <!-- Feature 2 -->
                <div class="p-8 bg-[#4DB1E2] rounded-lg shadow-lg">
                    <div class="mb-4">
                        <i class="fas fa-users text-4xl text-[#4DB1E2]"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Connect with Students</h3>
                    <p>Meet and connect with fellow students, share experiences, and build lasting friendships that go beyond the classroom.</p>
                </div>
                <!-- Feature 3 -->
                <div class="p-8 bg-[#4DB1E2] rounded-lg shadow-lg">
                    <div class="mb-4">
                        <i class="fas fa-book text-4xl text-[#4DB1E2]"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Learning Resources</h3>
                    <p>Access exclusive learning resources, study guides, and tips that help you excel in your studies and campus life.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-[#211d70] text-white py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to be a part of Unimate?</h2>
            <p class="text-lg mb-10">Sign up now and start exploring opportunities, meeting students, and making your college experience memorable.</p>
            <a href="{{ route('register') }}" class="px-8 py-4 bg-[#4DB1E2] text-white font-semibold rounded-lg transition hover:bg-[#3798c1]">
                Get Started Today
            </a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-12">What Our Users Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Testimonial 1 -->
                <div class="p-8 bg-[#4DB1E2] rounded-lg shadow-lg">
                    <p class="italic mb-4">"Unimate made my college selection process so easy. I could explore and connect with other students to get genuine insights!"</p>
                    <p class="font-bold">- Emily, Student at UiTM</p>
                </div>
                <!-- Testimonial 2 -->
                <div class="p-8 bg-[#4DB1E2] rounded-lg shadow-lg">
                    <p class="italic mb-4">"I found my best friends through Unimate! It’s an amazing platform to meet like-minded people and create unforgettable memories."</p>
                    <p class="font-bold">- John, Student at UiTM</p>
                </div>
                <!-- Testimonial 3 -->
                <div class="p-8 bg-[#4DB1E2] rounded-lg shadow-lg">
                    <p class="italic mb-4">"The resources provided by Unimate are fantastic! It helped me manage my studies and focus better during my college years."</p>
                    <p class="font-bold">- Sarah, Graduate</p>
                </div>
            </div>
        </div>
    </section>

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
