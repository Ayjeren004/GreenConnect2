@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url("/images/greenconnect.jpg"); 
        background-size: cover; 
        background-position: center top; 
       
    }

    .brand-name {
        font-size: 48px;
        font-weight: bold;
        font-family: 'Pacifico', cursive; 
        color: #06644f;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        animation: fadeInDown 2s ease-in-out;
    }

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-50px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container mt-4 text-center">
    <h1 class="brand-name">GreenConnect</h1>
</div>
@endsection
