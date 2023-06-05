<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the input
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'img' => 'nullable|image|max:2048', // Assuming 'img' is the name of the input field for the image
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|numeric',
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Update user information
        $userData = [
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
        ];

        if ($request->hasFile('img')) {
            // Handle image upload
            $imagePath = $request->file('img')->store('profile_images', 'public');
            $userData['img'] = $imagePath;
        }

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($userData);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
