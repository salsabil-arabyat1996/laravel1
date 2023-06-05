<?php
 namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
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
        $user->role_id = 2;

        // Save the profile image
        $user->img = 'imgd.png';

        $user->save();
        Auth::login($user);
        session()->put('user_id', $user->id);


        return redirect('/welcome')->with('success', 'Registered successfully');
    }
}
