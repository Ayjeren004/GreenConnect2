<?php
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Actor;

class MovieSeeder extends Seeder
{
    public function run()
    {
        // Create 10 movies
        $movies = Movie::factory(10)->create();

        // For each movie, attach some actors
        $movies->each(function ($movie) {
            $actors = Actor::factory(rand(1, 5))->create();
            $movie->actors()->attach($actors);
        });
    }
}
