<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;



class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class,'post');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query=Auth::user()->posts();
        if($request->input('sort')){
        $columns=explode(',',$request->input('sort'));
    foreach($columns as $column){
        if(substr($column,0,1)=='-'){
            $query=$query->orderBy(ltrim($column,'-'),'desc');
        }else{
            $query=$query->orderBy($column,'asc');
        }
    }
        }

        
        if($request->input('page')){
  return new PostsResource($query->paginate(1));
    }
    return new PostsResource($query->get());
      
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $post = $request->user()->posts()->create($request->input('data.attributes'));
    
    return (new PostResource($post))->response()->header("Location",route('posts.show',
    ['post'=>$post->id]));
}

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
{
    if ($post->user_id == Auth::user()->id) {
        return new PostResource($post);
    }
    
    abort(403);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if($post->user_id==Auth::user()->id){
            $post->update($request->all());
            return response()->json([
            "message"=>"Post updated"
        ],200);
        }
        abort(403);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->user_id==Auth::user()->id){
            $post->delete();
            return response()->json([
            "message"=>"Post deleted"
        ],202);
        }
        abort(403);
    }
}
