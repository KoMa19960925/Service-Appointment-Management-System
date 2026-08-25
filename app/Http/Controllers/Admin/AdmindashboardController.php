<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TechnicianCreateMail;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdmindashboardController extends Controller
{
    public function AdminDashboard()
    {
        return view('Admin.dashboard');
    }


    public function Techniciandetails()
    {
        $technicians = User::where('role', 'technician')->latest()->get();
        return view('Admin.Techniciandetails',compact('technicians'));
    }


    public function createtechnician()
    {
        return view('Admin.Createtechnician');
    }


    public function storeTechnician(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'work_experience' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);


       $user= User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'work_experience' => $request->work_experience,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'technician',
        ]);

        Mail::to($user->email)->send(new TechnicianCreateMail($user));
        return redirect()->route('Admin.Techniciandetails')->with('success', 'Technician created successfully.');
    }


    public function Customerservicerequests()
    {
        $servicerequests = ServiceRequest::latest()->get();

        return view(
            'Admin.Customerservicerequests',
            compact('servicerequests')
        );
    }


    public function Technicianassigned()
    {
        return view('Admin.Technicianassigned');
    }


    public function Servicehistory()
    {
        return view('Admin.Serviceshistory');
    }


    public function Customerfeedback()
    {
        return view('Admin.Feedback');
    }
}
