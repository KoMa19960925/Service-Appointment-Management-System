<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TechnicianCreateMail;
use App\Models\Assignedtechnician;
use App\Models\CustomerFeedback;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdmindashboardController extends Controller
{

    public function AdminDashboard()
    {
        $totalCustomerRequests = ServiceRequest::count();
        $completedServices = Assignedtechnician::where('status','Completed')->count();
        $totalCustomerFeedback = CustomerFeedback::count();
        return view('Admin.Dashboard',compact('totalCustomerRequests','completedServices','totalCustomerFeedback'));
    }


  

    public function Techniciandetails()
    {
        $technicians = User::where('role','technician')->get();
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
            'service_category' => 'required|string',
            'work_experience' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'service_category' => $request->service_category,
            'work_experience' => $request->work_experience,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'technician',
        ]);


       Mail::to($user->email)->send(new TechnicianCreateMail($user));

       return redirect()->route('Admin.Techniciandetails')->with('success','Technician created successfully.');
    }



public function editTechnician(User $user)
{
    return view('Admin.edittechnician',compact('user'));
}

public function updateTechnician(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'service_category' => 'required|string',
        'work_experience' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'service_category' => $request->service_category,
        'work_experience' => $request->work_experience,
        'email' => $request->email,
    ]);

    if ($request->filled('password')) {
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    }

    return redirect()->route('Admin.Techniciandetails')->with('success','Technician updated successfully.');
}


  

    public function deleteTechnician($id)
    {
        $technician = User::where('id',$id)->where('role','technician');
        $technician->delete();
        return redirect()->route('Admin.Techniciandetails')->with('success','Technician deleted successfully.');
    }


  

    public function Customerservicerequests()
    {
        $servicerequests = ServiceRequest::get();
        return view('Admin.Customerservicerequests', compact('servicerequests'));
    }



    // public function Technicianassigned()
    // {
    //     return view('Admin.Technicianassigned');
    // }


    public function Servicehistory()
    {
        $servicehistories = Assignedtechnician::with(['serviceRequest','technician','payment',])->get();
        return view('Admin.Allserviceshistory',compact('servicehistories'));
    }


    public function Customerfeedback()
    {
        $feedbacks = CustomerFeedback::with(['customer','technician','serviceRequest',])->get();
        return view('Admin.Customerfeedback',compact('feedbacks'));
    }
}