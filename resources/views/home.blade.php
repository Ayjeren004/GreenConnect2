@extends('layouts.app')

@section('content')
@php
    $postCount = auth()->user()->posts()->count();
    $giftCount = auth()->user()->gifts()->count();
    $ecoScore = ($postCount * 10) + ($giftCount * 25);
    
    $badge = "Seedling 🌱";
    if($ecoScore >= 100) $badge = "Tree Planter 🌳";
    if($ecoScore >= 500) $badge = "Forest Guardian 🌲";
    
    // Progress calculation for next tier
    $nextTier = 100;
    if($ecoScore >= 100) $nextTier = 500;
    if($ecoScore >= 500) $nextTier = 1000;
    
    $progressPercent = min(100, ($ecoScore / $nextTier) * 100);
@endphp

<div class="container mt-4 animate-fade-up">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <!-- Impact Dashboard Hero -->
            <div class="glass-card p-4 p-md-5 mb-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.95) 0%, rgba(5, 150, 105, 0.95) 100%);">
                <!-- Decorative background elements -->
                <div style="position: absolute; top: -50%; right: -10%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%); border-radius: 50%;"></div>
                <div style="position: absolute; bottom: -20%; left: 10%; width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%); border-radius: 50%;"></div>
                
                <div class="row align-items-center position-relative" style="z-index: 1;">
                    <div class="col-lg-7">
                        <h1 class="display-5 fw-bold text-white font-weight-bold mb-3" style="letter-spacing: -1px;">Welcome back, {{ auth()->user()->first_name }}!</h1>
                        <p class="fs-5 text-white-50 mb-4" style="line-height: 1.6;">Your eco-actions are making a difference. Keep sharing ideas and sending gifts to grow your impact.</p>
                        <div class="d-flex flex-wrap">
                            <a href="{{ route('post.index') }}" class="btn btn-light btn-lg px-4 font-weight-bold text-success mr-3 mb-2 shadow" style="border-radius: 12px; transition: transform 0.2s;">
                                <i class="fas fa-newspaper mr-2"></i> View Feed
                            </a>
                            <a href="{{ route('posts.create') }}" class="btn btn-outline-light btn-lg px-4 font-weight-bold mb-2" style="border-radius: 12px; transition: all 0.2s;">
                                <i class="fas fa-plus mr-2"></i> Create Post
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-5 mt-lg-0 text-center">
                        <div class="d-inline-block bg-white p-4 rounded-circle shadow-lg position-relative" style="width: 220px; height: 220px;">
                            <!-- Circular Progress -->
                            <svg class="position-absolute" style="top:0; left:0; width:100%; height:100%; transform: rotate(-90deg);" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="45" fill="none" stroke="#f0fdf4" stroke-width="8"></circle>
                                <circle cx="50" cy="50" r="45" fill="none" stroke="#10b981" stroke-width="8" stroke-dasharray="283" stroke-dashoffset="{{ 283 - (283 * $progressPercent / 100) }}" style="transition: stroke-dashoffset 1.5s ease-in-out; stroke-linecap: round;"></circle>
                            </svg>
                            <div class="position-absolute d-flex flex-column justify-content-center align-items-center" style="top:0; left:0; width:100%; height:100%;">
                                <span class="text-success font-weight-bold" style="font-size: 48px; line-height: 1; letter-spacing: -1px;">{{ $ecoScore }}</span>
                                <span class="text-muted small font-weight-bold text-uppercase mt-1" style="letter-spacing: 1px;">Impact Score</span>
                            </div>
                        </div>
                        <div class="mt-4 text-white">
                            <span class="badge bg-white px-4 py-2 text-success shadow-sm" style="font-size: 16px; border-radius: 20px; font-weight: 600;">{{ $badge }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="row mt-4">
                <!-- Posts -->
                <div class="col-md-3 mb-4 animate-fade-up stagger-1">
                    <div class="glass-card text-center p-4 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="feature-icon-wrapper mx-auto mb-3" style="width: 56px; height: 56px; font-size: 24px;">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-1" style="font-size: 32px;">{{ $postCount }}</h3>
                            <p class="text-muted mb-0 font-weight-500">Green Posts</p>
                        </div>
                    </div>
                </div>

                <!-- Followers -->
                <div class="col-md-3 mb-4 animate-fade-up stagger-2">
                    <div class="glass-card text-center p-4 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="feature-icon-wrapper mx-auto mb-3" style="width: 56px; height: 56px; font-size: 24px;">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-1" style="font-size: 32px;">{{ auth()->user()->followers()->count() }}</h3>
                            <p class="text-muted mb-0 font-weight-500">Followers</p>
                        </div>
                    </div>
                </div>

                <!-- Following -->
                <div class="col-md-3 mb-4 animate-fade-up stagger-3">
                    <div class="glass-card text-center p-4 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="feature-icon-wrapper mx-auto mb-3" style="width: 56px; height: 56px; font-size: 24px;">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-1" style="font-size: 32px;">{{ auth()->user()->following()->count() }}</h3>
                            <p class="text-muted mb-0 font-weight-500">Following</p>
                        </div>
                    </div>
                </div>

                <!-- Gifts -->
                <div class="col-md-3 mb-4 animate-fade-up stagger-4">
                    <div class="glass-card text-center p-4 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="feature-icon-wrapper mx-auto mb-3" style="width: 56px; height: 56px; font-size: 24px;">
                                <i class="fas fa-gift"></i>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-1" style="font-size: 32px;">{{ $giftCount }}</h3>
                            <p class="text-muted mb-0 font-weight-500">Eco Gifts Sent</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Info Settings -->
            <div class="glass-card mt-2 mb-5 animate-fade-up" style="animation-delay: 0.5s;">
                <div class="card-body p-4 p-md-5">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="font-weight-bold text-dark mb-2">Account Operations</h4>
                            <p class="text-muted mb-0" style="font-size: 16px;">Review or update your personal account details, change passwords, and personalize your public profile card to showcase your green journey.</p>
                        </div>
                        <div class="col-md-4 text-md-right mt-4 mt-md-0">
                            <a href="{{ route('profile.edit') }}" class="btn btn-eco btn-lg shadow w-100 d-md-inline-block w-md-auto">
                                <i class="fas fa-user-edit mr-2"></i> Account Settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
