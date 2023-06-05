<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{


    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate(['email' => 'required|string|email', 'password' => 'required|string',]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            if ($user->role_id == 1) {
                // Redirect to the dashboard for users with role_id = 1
                Session::put('role', 'admin');
                return redirect()->intended('/dashboard');
            } elseif ($user->role_id == 2) {
                // Redirect to the hello page for users with role_id = 2
                Session::put('id', $user->id);
                Session::put('role', 'renter');
                return redirect()->intended('/home-page');
            } elseif ($user->role_id == 3) {
                // Handle other role IDs as needed
                Session::put('role', 'lessor');
                return redirect()->intended('/farm');
            }
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
        }
    }
}
