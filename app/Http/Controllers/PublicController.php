<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\View; // Import the View facade

class PublicController extends Controller
{
    /**
     * Display a listing of all posts.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Retrieve all posts
        $posts = Post::all();

        // Return a view with posts data
        return view('post.index', ['posts' => $posts]);
    }
}
