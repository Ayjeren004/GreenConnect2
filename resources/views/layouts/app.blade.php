<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GreenConnect</title>

    <!-- Fonts -->
    <link rel="icon" href="/images/greenconnect.jpg" type="image/jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(255, 255, 255, 0.4);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
            --primary-eco: #10b981;
            --primary-eco-dark: #059669;
        }

        body {
            background-color: #f0fdf4;
            color: #1f2937;
            font-family: 'Outfit', sans-serif;
            background-image: 
                radial-gradient(at 0% 0%, hsla(147,100%,76%,0.2) 0px, transparent 50%),
                radial-gradient(at 100% 100%, hsla(160,100%,76%,0.2) 0px, transparent 50%);
            background-attachment: fixed;
            min-height: 100vh;
        }

        /* Animations */
        @keyframes fadeUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-up {
            animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }

        .glass-nav {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--glass-border) !important;
            box-shadow: var(--glass-shadow);
            padding: 16px 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 24px;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, var(--primary-eco) 0%, var(--primary-eco-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: transform 0.3s ease;
        }
        
        .navbar-brand:hover {
            transform: scale(1.02);
        }

        .nav-link {
            color: #4b5563 !important;
            font-weight: 500;
            transition: all 0.2s ease;
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary-eco);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 80%;
        }

        .nav-link:hover {
            color: var(--primary-eco-dark) !important;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.65) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border) !important;
            border-radius: 20px !important;
            box-shadow: var(--glass-shadow) !important;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }

        .glass-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(16, 185, 129, 0.12) !important;
            border-color: rgba(16, 185, 129, 0.3) !important;
        }

        .btn-primary, .btn-eco {
            background: linear-gradient(135deg, var(--primary-eco) 0%, var(--primary-eco-dark) 100%) !important;
            border: none !important;
            border-radius: 14px !important;
            font-weight: 600 !important;
            padding: 12px 24px !important;
            color: white !important;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2) !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover, .btn-eco:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.35) !important;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: all 0.6s ease;
        }

        .btn-primary:hover::after {
            left: 100%;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(16, 185, 129, 0.2) !important;
            border-radius: 12px !important;
            padding: 14px 18px !important;
            transition: all 0.3s ease !important;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
        }

        .form-control:focus {
            background: #ffffff !important;
            border-color: var(--primary-eco) !important;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15) !important;
            transform: translateY(-1px);
        }

        .nav-profile-img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-eco);
            padding: 2px;
            margin-left: 8px;
            transition: transform 0.3s ease;
        }
        
        .nav-profile-img:hover {
            transform: scale(1.1) rotate(5deg);
        }

        .dropdown-menu {
            border-radius: 16px !important;
            border: 1px solid rgba(255,255,255,0.5) !important;
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08) !important;
            padding: 12px;
            animation: fadeUp 0.2s ease-out;
        }
        
        .dropdown-item {
            border-radius: 8px;
            transition: all 0.2s ease;
            padding: 8px 16px;
            margin-bottom: 2px;
        }
        
        .dropdown-item:hover {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--primary-eco-dark);
            transform: translateX(4px);
        }
        
        /* Smooth scrolling */
        html { scroll-behavior: smooth; }
    </style>





    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light glass-nav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   GreenConnect
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
<form class="d-flex" method="GET" action="{{ route('user.search') }}">
    <input class="form-control me-2" type="search" placeholder="Search users" aria-label="Search" name="query">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                               
                            @if(Auth::user()->profile_image)
                                <img src="{{ asset('/storage/' . Auth::user()->profile_image) }}" class="img-fluid nav-profile-img">
                            @else
                                <img src="/storage/images/default-user.png" class="img-fluid nav-profile-img">
                            @endif
                            </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('posts.create') }}">
                                        <i class="fas fa-plus"></i> Create Post
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                         Edit Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('post.index') }}">
                                        Posts
                                    </a>

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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>

</html>
