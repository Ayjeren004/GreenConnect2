<?php
namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Auth::user()->gifts()->latest()->get();
        return view('gifts.index', compact('gifts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        Auth::user()->gifts()->create([
            'description' => $request->description,
        ]);

        return redirect()->route('gifts.index')->with('success', 'Gift claimed successfully! Your impact score has increased.');
    }
}
