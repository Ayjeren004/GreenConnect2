<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class,'post');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Fetch all posts ordered by created_at timestamp in descending order
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('post.index', ['posts' => $posts]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Create a new post
        $post = new Post($request->all());
        $post->user_id = Auth::id();

        if ($request->hasFile('post_image')) {
            $path = $request->file('post_image')->store('public/images');
            $post->post_image = str_replace("public/", "", $path);
        }
        
        $post->save();

        return redirect(route('post.index'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        // Update the post
        $post->update($request->all());

        if ($request->hasFile('post_image')) {
            $path = $request->file('post_image')->store('public/images');
            $post->post_image = str_replace("public/", "", $path);
            
        }

       

        return redirect(route('post.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
    public function like(Post $post)
{
    if (auth()->check()) {
        // Attach the authenticated user's ID to the post's likes
        $post->likes()->attach(auth()->id());
        
        return redirect()->back()->with('success', 'You liked the post');
    } else {
        return redirect()->back()->with('error', 'You need to be logged in to like the post');
    }
}



public function comment(Post $post, Request $request)
{
    $request->validate([
        'content' => 'required|string|max:255',
    ]);

    // Create a new comment using the relationship
    $post->comments()->create([
        'user_id' => auth()->id(),
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'Your comment has been added');
}


   
}