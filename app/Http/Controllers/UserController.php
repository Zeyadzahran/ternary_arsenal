<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $authUser = auth()->user();

        if (!$authUser || !$authUser->isRuler()) {
            abort(403, 'Just for world rulers — are you one?');
        }

        $users = User::with('country')
            ->get();

        return view('users.index', compact('users'));
    }

    public function updateRole(User $user)
    {
        $authUser = auth()->user();

        if (!$authUser || !$authUser->isRuler()) {
            abort(403, 'Only rulers can do that.');
        }

        if ($user->role === 'ruler') {
            return back()->with('error', 'You cannot modify another ruler.');
        }

        $user->role = $user->role === 'admin' ? 'general' : 'admin';
        $user->save();

        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    public function destroy(User $user)
    {
        $authUser = auth()->user();

        if (!$authUser || !$authUser->isRuler()) {
            abort(403, 'Only rulers can delete users.');
        }

        if ($user->role === 'ruler') {
            return back()->with('error', 'You cannot delete another ruler.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
