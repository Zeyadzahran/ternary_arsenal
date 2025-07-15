<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
 
    public function index()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Admins only');
        }

        $admin = auth()->user();
        $users = User::where('country_id', $admin->country_id)->get();

        return view('user.index', compact('users'));
    }
    public function updateRole(User $user)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Admins only');
        }

        if ($user->country_id !== auth()->user()->country_id) {
            abort(403, 'Unauthorized user');
        }

        $user->role = $user->role === 'admin' ? 'general' : 'admin';
        $user->save();

        return redirect()->back()->with('success', 'Role updated successfully.');
    }



}
