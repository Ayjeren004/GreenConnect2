<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->following()->syncWithoutDetaching($user->id);
        return redirect()->back()->with('success', 'You are now following ' . $user->name);
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return redirect()->back()->with('success', 'You have unfollowed ' . $user->name);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for users whose names match the query
        $users = User::where('first_name', 'like', "%$query%")
                     ->orWhere('last_name', 'like', "%$query%")
                     ->paginate(10); // Adjust the pagination limit as needed

        return view('user.search')->with('users', $users);
    }

    public function profile(User $user)
    {
        // Assuming you have defined a relationship between users and posts
        $posts = $user->posts()->latest()->paginate(10); // Adjust pagination as needed
        return view('user.profile', compact('user', 'posts'));
    }
}
