<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
{
    return view('profile.edit',['user'=>Auth::user()]);
}

public function update(Request $request)
{
    $user = $request->user();

    $user->first_name = $request->input('first_name');
    $user->last_name = $request->input('last_name');
    $user->email = $request->input('email');

    // handle file upload
    if ($request->hasFile('profile_image')) {
        $path = $request->file('profile_image')->store('public/images');
        $user->profile_image = str_replace("public/", "", $path);
    }

    $user->save();

    return redirect(route('home'))->with('status', 'Profile updated!');
}




}
