<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  ['required' , 'max:255 , string'],
            'email' => ['required' , 'email' , 'unique:users'],
            'password' => ['required', 'string' , 'min:8' , 'confirmed'],
            'country' => ['required','int', 'between:1,20'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_id' => $request->country,
            'role' => 'general'
        ]);

        Auth::login($user);
        dd($user);
        // return redirect('/home')->with('success', 'Registration successful!');
    }
}
