<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function register()
    {
        if (Auth::check()) {

            $role = Auth::user()->role;

            if ($role === 'customer') {
                return redirect()->route('Customer.dashboard');
            }
        }

        return view('Auth.Register');
    }


    public function registerstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contactnumber' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'contactnumber' => $request->contactnumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        return redirect()->route('loginpage')->with('success', 'Registration Successful!');
    }



    public function login()
    {
        if (Auth::check()) {

            $role = Auth::user()->role;

            if ($role === 'customer') {
                return redirect()->route('Customer.dashboard');
            }
        }

        return view('Auth.Login');
    }



    public function loginstore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            $request->session()->regenerate();
            $user = Auth::user();


            if ($user->role === 'customer') {
                return redirect()->route('Customer.dashboard')->with('success', 'Login Successful!');
            } else {
                Auth::logout();
                return redirect()->route('loginpage')->with('error', 'Invalid User Role.');
            }
        }
        return back()->with('error', 'Invalid Email or Password.')->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginpage')->with('success', 'Logged out successfully.');
    }
}
