<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
  use HasFactory; 
public function actors()
{
    return $this->belongsToMany(Actor::class, 'actors_movies', 'movie_id', 'actor_id')->withPivot('role');
}
}