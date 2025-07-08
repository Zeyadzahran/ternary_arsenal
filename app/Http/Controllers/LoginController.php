<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
     public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required' , 'email'],
            'password' => ['required', 'string' , 'min:8'],
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user)
        {
            return back()->withErrors([
                'email' => "Email Not Found",
            ])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => "Wrong Pasword"
            ])->withInput();
        }
        Auth::login($user);
        $request->session()->regenerate();

      return redirect()->intended('/home')->with('success', 'Login successful');
    }
}
