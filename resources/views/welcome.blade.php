@extends('layouts.app')

@section('content')
<style>
    .brand-hero {
        padding: 100px 0;
        text-align: center;
        position: relative;
    }
    
    .hero-bg-orb {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        z-index: -1;
        animation: pulse 4s ease-in-out infinite alternate;
    }

    @keyframes pulse {
        0% { transform: translate(-50%, -50%) scale(0.95); opacity: 0.8; }
        100% { transform: translate(-50%, -50%) scale(1.05); opacity: 1; }
    }

    .brand-name {
        font-size: 72px;
        font-weight: 800;
        letter-spacing: -2px;
        background: linear-gradient(135deg, var(--primary-eco) 0%, var(--primary-eco-dark) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 24px;
        text-shadow: 0 10px 30px rgba(16, 185, 129, 0.15);
    }

    .hero-subtitle {
        font-size: 22px;
        color: #4b5563;
        max-width: 650px;
        margin: 0 auto 40px auto;
        line-height: 1.7;
        font-weight: 400;
    }
    
    .feature-icon-wrapper {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(5, 150, 105, 0.05) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px auto;
        color: var(--primary-eco);
        font-size: 28px;
        transition: transform 0.3s ease;
    }
    
    .glass-card:hover .feature-icon-wrapper {
        transform: scale(1.1) rotate(5deg);
        background: linear-gradient(135deg, var(--primary-eco) 0%, var(--primary-eco-dark) 100%);
        color: white;
    }
</style>

<div class="container animate-fade-up">
    <div class="brand-hero">
        <div class="hero-bg-orb"></div>
        <h1 class="brand-name">GreenConnect</h1>
        <p class="hero-subtitle">A modern, secure social network built to connect eco-conscious advocates, exchange digital gifts, and share sustainability ideas seamlessly.</p>
        
        <div class="mt-4">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 mr-3 shadow-lg">
                    Get Started
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg px-5 bg-white" style="border-radius: 14px; border-color: var(--primary-eco); color: var(--primary-eco); font-weight: 600;">
                        Register
                    </a>
                @endif
            @else
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-5 shadow-lg">
                    Go to Dashboard
                </a>
            @endguest
        </div>
    </div>

    <!-- Feature Grid -->
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4 mb-4 animate-fade-up stagger-1">
            <div class="glass-card p-4 h-100 text-center">
                <div class="card-body">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mb-3" style="font-size: 22px;">Eco-Conscious Network</h5>
                    <p class="text-secondary mb-0" style="font-size: 16px; line-height: 1.6;">Follow other green advocates, share ideas, and expand your sustainability community circles.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 animate-fade-up stagger-2">
            <div class="glass-card p-4 h-100 text-center">
                <div class="card-body">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-images"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mb-3" style="font-size: 22px;">Interactive Feeds</h5>
                    <p class="text-secondary mb-0" style="font-size: 16px; line-height: 1.6;">Publish posts, attach images, and discuss topics with built-in commenting and liking.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 animate-fade-up stagger-3">
            <div class="glass-card p-4 h-100 text-center">
                <div class="card-body">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mb-3" style="font-size: 22px;">Eco-Friendly Gifts</h5>
                    <p class="text-secondary mb-0" style="font-size: 16px; line-height: 1.6;">Send and receive digital gift certificates and track exchanges in real-time.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
