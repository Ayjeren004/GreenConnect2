@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Welcome Hero Header -->
            <div class="p-5 mb-4 rounded-3 card border-0" style="background: linear-gradient(135deg, rgba(25, 135, 84, 0.95) 0%, rgba(15, 81, 50, 0.95) 100%); box-shadow: 0 10px 30px rgba(25, 135, 84, 0.15);">
                <div class="container-fluid py-2">
                    <h1 class="display-5 fw-bold text-white font-weight-bold">Welcome back, {{ auth()->user()->first_name }}!</h1>
                    <p class="col-md-8 fs-4 text-white-50 mt-2">Manage your eco-friendly posts, connect with fellow green advocates, trade digital gift certificates, and track community milestones.</p>
                    <div class="mt-4">
                        <a href="{{ route('post.index') }}" class="btn btn-light btn-lg px-4 me-md-2 mr-3 font-weight-bold text-success" style="border-radius: 12px; color: #198754 !important;">
                            <i class="fas fa-newspaper mr-2"></i> View Feed
                        </a>
                        <a href="{{ route('posts.create') }}" class="btn btn-outline-light btn-lg px-4 font-weight-bold" style="border-radius: 12px;">
                            <i class="fas fa-plus mr-2"></i> Create Post
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="row mt-4">
                <!-- Posts -->
                <div class="col-md-3 mb-4">
                    <div class="card text-center p-4">
                        <div class="card-body">
                            <div class="text-success mb-3">
                                <i class="fas fa-paper-plane fa-2x"></i>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-1">{{ auth()->user()->posts()->count() }}</h3>
                            <p class="text-muted mb-0">Total Posts</p>
                        </div>
                    </div>
                </div>

                <!-- Followers -->
                <div class="col-md-3 mb-4">
                    <div class="card text-center p-4">
                        <div class="card-body">
                            <div class="text-success mb-3">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-1">{{ auth()->user()->followers()->count() }}</h3>
                            <p class="text-muted mb-0">Followers</p>
                        </div>
                    </div>
                </div>

                <!-- Following -->
                <div class="col-md-3 mb-4">
                    <div class="card text-center p-4">
                        <div class="card-body">
                            <div class="text-success mb-3">
                                <i class="fas fa-user-friends fa-2x"></i>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-1">{{ auth()->user()->following()->count() }}</h3>
                            <p class="text-muted mb-0">Following</p>
                        </div>
                    </div>
                </div>

                <!-- Gifts -->
                <div class="col-md-3 mb-4">
                    <div class="card text-center p-4">
                        <div class="card-body">
                            <div class="text-success mb-3">
                                <i class="fas fa-gift fa-2x"></i>
                            </div>
                            <h3 class="font-weight-bold text-dark mb-1">{{ auth()->user()->receivedGifts()->count() + auth()->user()->sentGifts()->count() }}</h3>
                            <p class="text-muted mb-0">Gifts Traded</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Info Settings -->
            <div class="card mt-2">
                <div class="card-header bg-transparent border-0 font-weight-bold pt-4 px-4 text-dark" style="font-size: 20px;">
                    Account Operations
                </div>
                <div class="card-body px-4 pb-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p class="text-muted mb-0">Review or update your personal account details, change passwords, and personalize your public profile card.</p>
                        </div>
                        <div class="col-md-4 text-md-right mt-3 mt-md-0">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
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
