<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Unimate') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background: linear-gradient(to bottom, white, #4DB1E2);
            min-height: 100%;
        }

        #app {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            width: 100%;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: white;">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}" style="font-size: 1.5rem; color: #211d70;">
                    <div class="flex items-center">
                        <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="mr-3" style="max-width: 50px;">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ url('/') }}" style="color: #211d70;">Unimate</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: #00796b;">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: #00796b;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #00796b;">
                                    <i class="fas fa-user-circle"></i> <!-- User Icon -->
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <!-- View Profile Button -->
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        <i class="fas fa-user"></i> View My Profile
                                    </a>

                                    <!-- View My Roommate Applications -->
                                    <a class="dropdown-item" href="{{ route('roommate.history') }}">
                                        <i class="fas fa-paper-plane"></i> View My Roommate Applications
                                    </a>

                                    <!-- View Confirmed Roommates -->
                                    <a class="dropdown-item" href="{{ route('roommate.confirmed') }}">
                                        <i class="fas fa-user-friends"></i> View Confirmed Roommates
                                    </a>

                                    <!-- View Received Roommate Applications -->
                                    <a class="dropdown-item" href="{{ route('roommate.received') }}">
                                        <i class="fas fa-inbox"></i> View Received Roommate Applications
                                    </a>

                                    <!-- Logout Button -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <!-- Logout Form -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-auto py-4">
            <div class="container d-flex flex-wrap justify-content-start align-items-start">
                <!-- Resources Section -->
                <div class="d-flex flex-column me-5">
                    <div class="fw-bold mb-2">Resources</div>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">UiTM Library</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Online Learning Portal</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Student Portal</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Official UiTM Website</a></li>
                    </ul>
                </div>

                <!-- Help Section -->
                <div class="d-flex flex-column me-5">
                    <div class="fw-bold mb-2">Help</div>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">Contact Us</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Get Help</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Order Status</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Delivery</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Payment Options</a></li>
                    </ul>
                </div>

                <!-- Company Section -->
                <div class="d-flex flex-column me-5">
                    <div class="fw-bold mb-2">Company</div>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">About UiTM</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">News</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Careers</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Investors</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Sustainability</a></li>
                    </ul>
                </div>

                <!-- Branding and Copyright -->
                <div class="ms-auto text-end">
                    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" style="max-width: 100px;">
                    <div class="text-muted mt-3">&copy; 2024 UiTM. All rights reserved.<br>
                        For more information, visit the <a href="#" class="text-muted text-decoration-none">Official UiTM Website</a>.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
