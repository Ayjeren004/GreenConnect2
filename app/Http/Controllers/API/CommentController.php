<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{

     public function index(Post $post)
    {
        $comments = $post->comments; 
        return CommentResource::collection($comments);
    }
    /**
     * Store a newly created comment.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post->id;
        $comment->save();

        return response()->json([
            'message' => 'Comment created',
            'comment' => new CommentResource($comment),
        ], 201);
    }

    /**
     * Display the specified comment.
     */
    public function show(Post $post, Comment $comment)
    {
        if ($comment->post_id == $post->id) {
            return new CommentResource($comment);
        }

        abort(404);
    }

    /**
     * Update the specified comment.
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        if ($comment->user_id == Auth::user()->id) {
            $request->validate([
                'content' => 'required|string',
            ]);

            $comment->content = $request->content;
            $comment->save();

            return response()->json([
                'message' => 'Comment updated',
                'comment' => new CommentResource($comment),
            ], 200);
        }

        abort(403);
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        if ($comment->user_id == Auth::user()->id) {
            $comment->delete();

            return response()->json([
                'message' => 'Comment deleted',
            ], 200);
        }

        abort(403);
    }
}
