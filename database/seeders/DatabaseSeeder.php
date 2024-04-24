<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\Gift;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeders\MovieSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Ayjeren',
            'last_name' => 'Kossekova', // Added comma here
            'email' => "test@example.com",
            'email_verified_at' => now(), // Added comma here, and changed the concatenation '.' to ','
            'password' => Hash::make('password'), // Fixed the '::' to '->'
            'remember_token' => Str::random(10), // Fixed the '::' to '->'
        ]);
        User::factory(20)->create();

         Movie::factory(5)->create();
Gift::factory(5)->create();
        Actor::factory(5)->create();
    }
    
}
