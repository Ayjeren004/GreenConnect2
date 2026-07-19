@extends('layouts.app')

@section('content')
<style>
    .brand-hero {
        padding: 80px 0;
        text-align: center;
    }

    .brand-name {
        font-size: 64px;
        font-weight: 800;
        letter-spacing: -1.5px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 16px;
        animation: fadeInUp 1s ease-out;
    }

    .hero-subtitle {
        font-size: 20px;
        color: #9ca3af;
        max-width: 600px;
        margin: 0 auto 32px auto;
        line-height: 1.6;
        animation: fadeInUp 1.2s ease-out;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container">
    <div class="brand-hero">
        <h1 class="brand-name">GreenConnect</h1>
        <p class="hero-subtitle">A modern, secure social network built to connect eco-conscious advocates, exchange digital gifts, and share sustainability ideas seamlessly.</p>
        
        <div class="mt-4">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 mr-3">
                    Get Started
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg px-5" style="border-radius: 10px; border-color: #10b981; color: #10b981; background: transparent;">
                        Register
                    </a>
                @endif
            @else
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-5">
                    Go to Dashboard
                </a>
            @endguest
        </div>
    </div>

    <!-- Feature Grid -->
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card p-4 h-100 text-center">
                <div class="card-body">
                    <div class="text-success mb-3" style="font-size: 32px;">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h5 class="font-weight-bold text-white mb-2">Eco-Conscious Network</h5>
                    <p class="text-secondary small mb-0">Follow other green advocates, share ideas, and expand your sustainability community circles.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4 h-100 text-center">
                <div class="card-body">
                    <div class="text-success mb-3" style="font-size: 32px;">
                        <i class="fas fa-images"></i>
                    </div>
                    <h5 class="font-weight-bold text-white mb-2">Interactive Feeds</h5>
                    <p class="text-secondary small mb-0">Publish posts, attach images, and discuss topics with built-in commenting and liking.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4 h-100 text-center">
                <div class="card-body">
                    <div class="text-success mb-3" style="font-size: 32px;">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h5 class="font-weight-bold text-white mb-2">Eco-Friendly Gifts</h5>
                    <p class="text-secondary small mb-0">Send and receive digital gift certificates and track exchanges in real-time.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
