<!-- resources/views/gifts/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gifts</h1>
    <table class="table">
        <thead>
         
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Sender</th>
                
          
            </tr>
        </thead>
        <tbody>
            @foreach ($gifts as $gift)
            <tr>
                <td>{{ $gift->id }}</td>
                <td>{{ $gift->description }}</td>
                <td> {{ $gift->user->last_name }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
