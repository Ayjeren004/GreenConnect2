<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gift extends Model
{  use HasFactory;
    protected $fillable = ['description']; // Assuming 'description' is the field to store the gift description

  

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
