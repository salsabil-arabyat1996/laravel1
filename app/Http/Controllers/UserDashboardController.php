<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {



        // $users = User::all();
        $users = User::paginate(9); // Change 10 to the desired number of users per page

        return view('Admin.userdashboard.index', compact('users'));
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('Admin.userdashboard.show', compact('user'));
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'fname' => 'required',
    //         'lnmae' => 'required',
    //         'email' => 'required',
    //         'phone' => 'required',
    //         'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $office = new User;
    //     $office->fname = $request->fname;
    //     $office->lname = $request->lname;
    //     $office->email = $request->email;
    //     $office->phone = $request->phone;

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time().'.'.$image->getClientOriginalExtension();
    //         $image->move('image', $imageName);
    //         $office->image = $imageName;
    //     }

    //     $office->save();

    //     return redirect()->route('office.index')->with('success', 'Office created successfully.');
    // }
    public function edit($id)
    {
        $user = User::find($id);

        return view('Admin.userdashboard.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        // $user->img = $request->input('img');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = $request->input('password');
        if($request->hasFile('img')){
            $destination_path = 'images'.$user->img;
            if(File::exists($destination_path)){
                File::delete($destination_path);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images', $filename);
            $user->img = $filename;
        }
        $user->update();

        return redirect()->route('userdashboard.show', $user->id)
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('userdashboard.index')
            ->with('success', 'User deleted successfully');
    }
}

