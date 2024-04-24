<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
       $movies = Movie::with('actors')->get();

     
         return view('movies.index', ['movies' => $movies]);
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            // Add validation for other movie attributes...
        ]);

        // Create a new movie instance
        $movie = new Movie();
        $movie->title = $request->input('title');
        // Set other movie attributes...
        $movie->save();

        // Associate actors with the movie
        $actors = $request->input('actors'); // Assuming 'actors' is an array of actor IDs from the form
        $movie->actors()->attach($actors);

        return redirect()->route('movies.index')->with('success', 'Movie created successfully!');
    }
}
