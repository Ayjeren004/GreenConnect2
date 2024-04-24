@extends('layouts.app')

@section('content')
<div class="container mt-6">
    @if(session('success'))
    <div class="alert alert-primary" role="alert">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-primary" role="alert">{{ session('error') }}</div>
    @endif
    <h1 class="text-center"></h1>
    <div class="row justify-content-center">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Show user's first and last name on top of the post image -->
                    <div class="user-info d-flex justify-content-between align-items-center" id="{{ $post->id }}">
                        <p class="mb-0">{{ $post->user->first_name }} {{ $post->user->last_name }}</p>
                        <!-- Follow/unfollow button -->
                        @if (auth()->id() !== $post->user_id)
                            @if (auth()->user()->following->contains($post->user))
                                <form action="{{ route('user.unfollow', $post->user) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-primary">Unfollow</button>
                                </form>
                            @else
                                <form action="{{ route('user.follow', $post->user) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-primary">Follow</button>
                                </form>
                            @endif
                        @endif
                        <!-- Delete and Edit buttons (only visible for the post owner) -->
                        @if(auth()->id() === $post->user_id)
                            <div class="d-flex">
                                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-link text-primary ml-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                    <!-- Display post image -->
                    <img src="{{ asset('/storage/'.$post->post_image)}}" class="card-img-top" alt="Post Image" style="width: 414px; height: 246px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->name }}</h5>
                    </div>
                    <!-- Like button -->
                                    <form action="{{ route('post.like', $post) }}" method="POST">
                    @csrf
                    @if(auth()->user()->likes->contains($post))
                    <button type="submit" class="btn btn-primary" disabled>
                        <i class="fas fa-thumbs-up"></i>
                        <span class="badge badge-primary">{{ $post->likes_count }}</span>
                    </button>
                    @else
                    <button type="submit" class="btn btn-primary">
                        <i class="far fa-thumbs-up"></i>
                        <span class="badge badge-primary">{{ $post->likes_count }}</span>
                    </button>
                    @endif
                </form>
                    <!-- Comment form -->
                    <form action="{{ route('post.comment', $post) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="content" class="form-control" placeholder="Write a comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                    <!-- Most recent comment -->
                    @if($post->comments->isNotEmpty())
                        <div class="comments mt-3">
                           
                            <p><strong>{{ $post->comments->last()->user->first_name }} {{ $post->comments->last()->user->last_name }}:</strong> {{ $post->comments->last()->content }}</p>
                        </div>
                        <!-- View all comments link -->
                        @if($post->comments->count() > 1)
<a href="#" class="view-comments" data-toggle="modal" data-target="#postCommentsModal{{ $post->id }}" data-post-id="{{ $post->id }}">View all {{ $post->comments->count() }} comments</a>

                            <!-- Modal -->
                            <div class="modal fade" id="postCommentsModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="postCommentsModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="postCommentsModalLabel">All Comments</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach($post->comments as $comment)
                                                <p><strong>{{ $comment->user->first_name }} {{ $comment->user->last_name }}:</strong> {{ $comment->content }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.view-comments').on('click', function() {
            // Get the ID of the post associated with the clicked link
            var postId = $(this).data('post-id');
            
            // Construct the ID of the modal corresponding to the post
            var modalId = '#postCommentsModal' + postId;
            
            // Show the modal
            $(modalId).modal('show');
        });
    });
</script>
@endpush


