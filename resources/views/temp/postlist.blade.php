 <div class="container mt-6">
        <h1 class="text-center">Post List</h1>
        <div class="row justify-content-center">
            @foreach ($posts as $post)
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <!-- Make the post title clickable -->
                            <h5 class="card-title"><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->name }}</a></h5>
                            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                            </form>
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary form-btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>