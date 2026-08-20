<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
    public function register()
    {
        if (Auth::check()) {

            if (Auth::user()->role === 'admin') {
                return redirect()->route('Admin.dashboard');
            }

            if (Auth::user()->role === 'customer') {
                return redirect()->route('Customer.dashboard');
            }

            if (Auth::user()->role === 'technician') {
                return redirect()->route('Technician.dashboard');
            }

        }

        return view('Auth.Register');
    }



    public function registerstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        return redirect()->route('loginpage')->with('success', 'Registration Successful!');
    }

    public function login()
    {
        if (Auth::check()) {
            $user = Auth::user();


      
            if ($user->role === 'admin') {
                return redirect()->route('Admin.dashboard');
            }

   
            if ($user->role === 'customer') {
                return redirect()->route('Customer.dashboard');
            }

             if ($user->role === 'technician') {
                return redirect()->route('Technician.dashboard');
            }

            Auth::logout();
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

            if ($user->role === 'admin') {

                return redirect()->route('Admin.dashboard')->with('success', 'Admin Login Successful!');
            }


            if ($user->role === 'customer') {
                return redirect()->route('Customer.dashboard')->with('success', 'Customer Login Successful!');
            }

            
            if ($user->role === 'technician') {
                return redirect()->route('Technician.dashboard')->with('success', 'Customer Login Successful!');
            }



            Auth::logout();
            return redirect()->route('loginpage')->with('error', 'Invalid User Role.');
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