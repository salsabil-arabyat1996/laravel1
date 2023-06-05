<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class LessorDashboardController extends Controller
{
    public function index(Request $request)
{
    $role = Role::find(3);
    $users = User::where('role_id', $role->id)->paginate(9);

    return view('Admin.lessordashboard.index', compact('users'));
}


    public function show($id)
    {
        $user = User::find($id);
        return view('Admin.lessordashboard.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.lessordashboard.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->img = $request->input('img');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('lessordashboard.show', $user->id)
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('lessordashboard.index')
            ->with('success', 'User deleted successfully');
    }
}
