<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterlessorController extends Controller
{
    public function showRegistrationlessorForm()
    {
        return view('registerlessor');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'phone' => 'required'
        ]);

        $user = new User();
        $user->fname = $validatedData['fname'];
        $user->lname = $validatedData['lname'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role_id = 3;

        // Set a default value for the profile image
        $user->img = 'imgd.png'; // Replace 'imgd.png' with the desired default image filename

        $user->save();
        Auth::login($user);
        session()->put('user_id', $user->id);

        return redirect('/welcome')->with('success', 'Registered successfully');
    }
}
