<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDonation;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    // Show the donation form
    public function showDonationForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('donation', compact('user'));
        }
        return redirect('/login')->with('error', 'You must be logged in to access the donation.');
        // return view('donation'); // Renders the donation form
    }

    // Store donation data
    
    public function store(Request $request)
    {
        $request->validate([
            'food_type' => 'required|string|max:50',
            'food_qty' => 'required|integer|min:1',
            'location' => 'required|string|max:50',
        ]);
    
        // Ensure user is logged in
        // if (!Auth::check()) {
        //     return redirect('/login')->with('error', 'You must be logged in to donate.');
        // }
    
        // Insert donation into database
        UserDonation::create([
            'donor_id' => Auth::id(), // ✅ Automatically store logged-in user's ID
            'name' => Auth::user()->name, // ✅ Automatically fetch logged-in user's name
            'food_type' => $request->food_type,
            'food_qty' => $request->food_qty,
            'location' => $request->location,
            'status' => 'pending', // Default status
        ]);
    
        return redirect()->back()->with('success', 'Donation submitted successfully!');
    }
    

    // Show all donations
    public function showProfile()
    {
        $user = Auth::user(); // Get logged-in user
        $donations = UserDonation::where('donor_id', $user->id)->get(); // Fetch user's donations

        return view('profile', compact('user', 'donations'));
    }
}
