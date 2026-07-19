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
            background-color: #f6faf8;
            color: #2b303a;
            font-family: 'Outfit', sans-serif;
            background-image: radial-gradient(circle at 10% 20%, rgba(25, 135, 84, 0.05) 0%, transparent 45%), radial-gradient(circle at 90% 80%, rgba(25, 135, 84, 0.03) 0%, transparent 45%);
            background-attachment: fixed;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(25, 135, 84, 0.12) !important;
            padding: 16px 0;
        }

        .navbar .navbar-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 24px;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #198754 0%, #0f5132 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar .navbar-nav .nav-link {
            color: #495057 !important;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: #198754 !important;
        }

        .nav-profile-img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #198754;
            margin-left: 8px;
        }

        .card {
            background: #ffffff;
            border: 1px solid rgba(25, 135, 84, 0.12);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(25, 135, 84, 0.02);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(25, 135, 84, 0.25);
            box-shadow: 0 12px 30px rgba(25, 135, 84, 0.06);
        }

        .btn-primary {
            background: linear-gradient(135deg, #198754 0%, #0f5132 100%) !important;
            border: none !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            padding: 10px 22px !important;
            transition: all 0.2s ease !important;
            color: white !important;
        }

        .btn-primary:hover:not(:disabled) {
            background: linear-gradient(135deg, #157347 0%, #0f5132 100%) !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 14px rgba(25, 135, 84, 0.15) !important;
        }

        .btn-primary:disabled {
            background: rgba(25, 135, 84, 0.2) !important;
            color: rgba(0, 0, 0, 0.3) !important;
            cursor: not-allowed;
        }

        .form-control {
            background-color: #ffffff !important;
            border: 1px solid rgba(25, 135, 84, 0.2) !important;
            color: #2b303a !important;
            border-radius: 10px !important;
            padding: 12px 16px !important;
            transition: all 0.2s ease !important;
        }

        .form-control:focus {
            background-color: #ffffff !important;
            border-color: #198754 !important;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.12) !important;
        }

        .user-info {
            padding: 14px 20px;
            background: rgba(25, 135, 84, 0.03);
            border-bottom: 1px solid rgba(25, 135, 84, 0.08);
        }

        .user-info p {
            font-weight: 600;
            color: #2b303a;
        }

        .dropdown-menu {
            border-radius: 12px !important;
            border: 1px solid rgba(25, 135, 84, 0.12) !important;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05) !important;
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
