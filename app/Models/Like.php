<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
 public function likedPosts()
{
    return $this->belongsToMany(Post::class, 'post_likes', 'like_id', 'post_id');
}

public function likedByUsers()
{
    return $this->belongsToMany(Post::class, 'likes','user_id', 'post_id');
}


}
