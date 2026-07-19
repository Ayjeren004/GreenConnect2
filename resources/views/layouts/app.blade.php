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
        body {
            background-color: #0b111e;
            color: #f3f4f6;
            font-family: 'Outfit', sans-serif;
            background-image: radial-gradient(circle at 10% 20%, rgba(6, 100, 79, 0.08) 0%, transparent 40%), radial-gradient(circle at 90% 80%, rgba(16, 185, 129, 0.05) 0%, transparent 40%);
            background-attachment: fixed;
        }

        .navbar {
            background: rgba(11, 17, 30, 0.8) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(16, 185, 129, 0.15) !important;
            padding: 16px 0;
        }

        .navbar .navbar-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 24px;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar .navbar-nav .nav-link {
            color: #9ca3af !important;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: #10b981 !important;
        }

        .nav-profile-img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #10b981;
            margin-left: 8px;
        }

        .card {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(16, 185, 129, 0.15);
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            border-color: rgba(16, 185, 129, 0.35);
            box-shadow: 0 12px 30px rgba(16, 185, 129, 0.08);
        }

        .btn-primary {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
            border: none !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
            padding: 10px 20px !important;
            transition: all 0.2s ease !important;
            color: white !important;
        }

        .btn-primary:hover:not(:disabled) {
            background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2) !important;
        }

        .btn-primary:disabled {
            background: rgba(16, 185, 129, 0.2) !important;
            color: rgba(255, 255, 255, 0.4) !important;
            cursor: not-allowed;
        }

        .form-control {
            background-color: rgba(31, 41, 55, 0.5) !important;
            border: 1px solid rgba(16, 185, 129, 0.2) !important;
            color: #f3f4f6 !important;
            border-radius: 10px !important;
            padding: 12px 16px !important;
            transition: all 0.2s ease !important;
        }

        .form-control:focus {
            background-color: rgba(31, 41, 55, 0.8) !important;
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15) !important;
        }

        .user-info {
            padding: 14px 20px;
            background: rgba(31, 41, 55, 0.4);
            border-bottom: 1px solid rgba(16, 185, 129, 0.1);
        }

        .user-info p {
            font-weight: 600;
            color: #e5e7eb;
        }
    </style>





    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
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
