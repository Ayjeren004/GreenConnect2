<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\PublicController;
 




Route::post('/login/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'error' => ['The provided credentials are incorrect.'],
        ]);
    }

    $tokenText = $user->createToken($request->device_name)->plainTextToken;
    return ['token' => $tokenText];
});

//making this public so tthat it can be tested without auth
Route::get('/allposts', [PublicController::class, 'index'])->name('posts.feed');
Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('v1')->group(function(){
        Route::apiResource('posts', PostController::class);
        Route::post('/posts/{post}/comments', [CommentController::class, 'store']);
        Route::get('/posts/{post}/comments', [CommentController::class, 'index']);
        Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy']);
    });

});

    Route::prefix('v2')->group(function(){
       
    });

