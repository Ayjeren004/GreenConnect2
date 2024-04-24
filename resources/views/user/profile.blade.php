@extends('layouts.app')

@section('content')
<div class="container mt-6">
    <h1 class="text-center">Post List</h1>
    <div class="row justify-content-center">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Show user's first and last name on top of the post image -->
                    <div class="user-info d-flex justify-content-between align-items-center p-3 bg-light">
                        <p class="mb-0">{{ $post->user->first_name }} {{ $post->user->last_name }}</p>
                        <!-- Follow/unfollow button -->
                        @auth
                                            @auth
                        @if (auth()->user()->id !== $post->user_id)
                            @if (auth()->user()->following && auth()->user()->following->contains($post->user))
                                <form action="{{ route('user.unfollow', $post->user) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Unfollow</button>
                                </form>
                            @else
                                <form action="{{ route('user.follow', $post->user) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Follow</button>
                                </form>
                          
                        @endif
                    @endauth

                                @if (auth()->user()->following && auth()->user()->following->contains($post->user))
                                    <form action="{{ route('user.unfollow', $post->user) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Unfollow</button>
                                    </form>
                                @else
                                    <form action="{{ route('user.follow', $post->user) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Follow</button>
                                    </form>
                                @endif
                            @endif
                        @endauth
                    </div>
                    <!-- Display post image -->
                    <img src="{{ asset('/storage/'.$post->post_image)}}" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->name }}</h5>
                    </div>
                    <div class="card-footer">
                        <!-- Like button -->
                        <form action="{{ route('post.like', $post) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary mr-2"><i class="fas fa-thumbs-up"></i> Like</button>
                        </form>
                        <!-- Comment form -->
                        <form action="{{ route('post.comment', $post) }}" method="POST" class="d-inline">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="content" class="form-control" placeholder="Write a comment">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
