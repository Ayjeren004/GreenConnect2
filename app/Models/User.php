<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function posts():HasMany{
        return $this->hasMany(Post::class);
    }
    public function followers()
{
    return $this->belongsToMany(User::class, 'user_followers', 'followed_user_id', 'follower_id')->withTimestamps();
}

public function following()
{
    return $this->belongsToMany(User::class, 'user_followers', 'follower_id', 'followed_user_id')->withTimestamps();
}

public function likes():BelongsToMany
{
    return $this->belongstoMany(Post::class,'post_likes', 'user_id','post_id' );
}

public function comments()
{
    return $this->hasMany(Comment::class);
}
 public function sentGifts()
    {
        return $this->hasMany(Gift::class, 'sender_id');
    }

    public function receivedGifts()
    {
        return $this->hasMany(Gift::class, 'receiver_id');
    }
}
