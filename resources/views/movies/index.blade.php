@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movies and Actors</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Movie Title</th>
                <th>Actors</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>
                    <ul>
                        @foreach($movie->actors as $actor)
                        <li>{{ $actor->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
