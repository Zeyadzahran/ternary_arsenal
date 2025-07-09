<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Country;

class RegisterController extends Controller
{

    public function create()
    {
        $countries = Country::all();
        return view('auth.register', compact('countries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' =>  ['required', 'max:255 , string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', 'int', 'between:1,20'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_id' => $request->country,
            'role' => 'general'
        ]);


        return redirect('/login')->with('success', 'Registration successful please Login!');
    }
}
