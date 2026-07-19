@extends('layouts.app')

@section('content')
<div class="container mt-4 animate-fade-up">
    <!-- Header -->
    <div class="glass-card p-4 p-md-5 mb-5 text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.05) 100%);">
        <h1 class="display-4 fw-bold text-dark font-weight-bold mb-3" style="letter-spacing: -1px;">Eco-Gift Store</h1>
        <p class="fs-5 text-muted mx-auto" style="max-width: 600px; line-height: 1.6;">Support environmental initiatives by acquiring Eco-Gifts. Each gift you claim increases your Eco-Impact Score and helps our planet.</p>
    </div>

    <!-- Store Grid -->
    <div class="row">
        <!-- Gift 1 -->
        <div class="col-md-4 mb-4 animate-fade-up stagger-1">
            <div class="glass-card h-100 position-relative">
                <div style="height: 160px; background: linear-gradient(135deg, #10b981 0%, #34d399 100%);" class="d-flex align-items-center justify-content-center text-white">
                    <i class="fas fa-tree fa-4x"></i>
                </div>
                <div class="card-body p-4 text-center">
                    <h4 class="font-weight-bold mb-2">Plant a Tree</h4>
                    <p class="text-muted small mb-4">Contribute to global reforestation efforts. This gift plants one tree in an endangered ecosystem.</p>
                    <form action="{{ route('gifts.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="description" value="Planted a Tree 🌳">
                        <button type="submit" class="btn btn-eco btn-block shadow-sm">
                            Claim Gift <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Gift 2 -->
        <div class="col-md-4 mb-4 animate-fade-up stagger-2">
            <div class="glass-card h-100 position-relative">
                <div style="height: 160px; background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);" class="d-flex align-items-center justify-content-center text-white">
                    <i class="fas fa-water fa-4x"></i>
                </div>
                <div class="card-body p-4 text-center">
                    <h4 class="font-weight-bold mb-2">Ocean Cleanup</h4>
                    <p class="text-muted small mb-4">Fund the removal of 1kg of plastic from the ocean. Help protect marine wildlife.</p>
                    <form action="{{ route('gifts.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="description" value="Ocean Cleanup Token 🌊">
                        <button type="submit" class="btn btn-eco btn-block shadow-sm">
                            Claim Gift <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Gift 3 -->
        <div class="col-md-4 mb-4 animate-fade-up stagger-3">
            <div class="glass-card h-100 position-relative">
                <div style="height: 160px; background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);" class="d-flex align-items-center justify-content-center text-white">
                    <i class="fas fa-solar-panel fa-4x"></i>
                </div>
                <div class="card-body p-4 text-center">
                    <h4 class="font-weight-bold mb-2">Solar Credit</h4>
                    <p class="text-muted small mb-4">Offset your carbon footprint by supporting community solar energy projects.</p>
                    <form action="{{ route('gifts.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="description" value="Solar Energy Credit ☀️">
                        <button type="submit" class="btn btn-eco btn-block shadow-sm">
                            Claim Gift <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- User's Inventory -->
    <div class="mt-5 pt-4 animate-fade-up stagger-4">
        <h3 class="font-weight-bold mb-4">Your Eco-Gifts</h3>
        @if(count($gifts) > 0)
            <div class="glass-card p-0 overflow-hidden">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-4 py-3">Gift Description</th>
                            <th class="border-0 px-4 py-3">Acquired On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gifts as $gift)
                        <tr>
                            <td class="px-4 py-3 font-weight-500">{{ $gift->description }}</td>
                            <td class="px-4 py-3 text-muted">{{ $gift->created_at ? $gift->created_at->format('M d, Y') : 'Recently' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="glass-card p-5 text-center">
                <div class="text-muted mb-3"><i class="fas fa-box-open fa-3x"></i></div>
                <h5 class="text-dark font-weight-bold">No gifts yet!</h5>
                <p class="text-muted mb-0">Claim a gift above to start building your eco-impact.</p>
            </div>
        @endif
    </div>
</div>
@endsection
