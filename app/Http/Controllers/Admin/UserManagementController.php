<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'student')->get();
        return view('admin.users', compact('users'));
    }

    public function destroy($id)
    {
        if (auth()->id() == $id) {
            return back()->with('error', 'Huwezi kujifuta mwenyewe!');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted successfully');
    }
}
