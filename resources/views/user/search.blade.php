<!-- search.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search Results</h1>
    @if ($users->isEmpty())
        <p>No users found.</p>
    @else
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('user.profile', $user->id) }}">
                        {{ $user->first_name }} {{ $user->last_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
