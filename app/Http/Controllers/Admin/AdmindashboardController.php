<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TechnicianCreateMail;
use App\Models\Assignedtechnician;
use App\Models\CustomerFeedback;
use App\Models\HomeContent;
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



    //  public function Adminhome()
    // {
    //     return view('Admin.homeedit');
    // }



    public function editHome()
{
    $home = HomeContent::first();

    if (!$home) {

        $home = HomeContent::create([

            'badge' => 'SERVICE & APPOINTMENT MANAGEMENT',

            'hero_title' => 'Professional Service',

            'hero_subtitle' => 'Made Simple',

            'hero_description' =>
                'A complete service management system for customers, technicians and administrators. Submit service requests, manage appointments, track service progress and manage completed work from one place.',

            'feature_1_title' => 'Technicians',

            'feature_2_title' => 'Appointments',

            'feature_3_title' => 'Service Requests',

            'feature_4_title' => 'Feedback',

            'process_title' => 'Simple Service Process',

            'process_1_title' => 'Submit Request',

            'process_1_description' =>
                'Customer submits a service request.',

            'process_2_title' => 'Assign Technician',

            'process_2_description' =>
                'Admin assigns a suitable technician.',

            'process_3_title' => 'Complete Service',

            'process_3_description' =>
                'Technician completes the assigned work.',

            'process_4_title' => 'Give Feedback',

            'process_4_description' =>
                'Customer provides service feedback.',
        ]);
    }

    return view('Admin.homeedit',compact('home')
    );
}

public function updateHome(Request $request)
{
    $request->validate([
        'badge' => 'required|string|max:255',
        'hero_title' => 'required|string|max:255',
        'hero_subtitle' => 'required|string|max:255',
        'hero_description' => 'required|string',

        'feature_1_title' => 'required|string|max:255',
        'feature_2_title' => 'required|string|max:255',
        'feature_3_title' => 'required|string|max:255',
        'feature_4_title' => 'required|string|max:255',

        'process_title' => 'required|string|max:255',

        'process_1_title' => 'required|string|max:255',
        'process_1_description' => 'required|string',

        'process_2_title' => 'required|string|max:255',
        'process_2_description' => 'required|string',

        'process_3_title' => 'required|string|max:255',
        'process_3_description' => 'required|string',

        'process_4_title' => 'required|string|max:255',
        'process_4_description' => 'required|string',
    ]);

    $home = HomeContent::first();

    $home->update([
        'badge' => $request->badge,
        'hero_title' => $request->hero_title,
        'hero_subtitle' => $request->hero_subtitle,
        'hero_description' => $request->hero_description,

        'feature_1_title' => $request->feature_1_title,
        'feature_2_title' => $request->feature_2_title,
        'feature_3_title' => $request->feature_3_title,
        'feature_4_title' => $request->feature_4_title,

        'process_title' => $request->process_title,

        'process_1_title' => $request->process_1_title,
        'process_1_description' => $request->process_1_description,

        'process_2_title' => $request->process_2_title,
        'process_2_description' => $request->process_2_description,

        'process_3_title' => $request->process_3_title,
        'process_3_description' => $request->process_3_description,

        'process_4_title' => $request->process_4_title,
        'process_4_description' => $request->process_4_description,
    ]);

    return redirect()->route('Admin.homeedit')->with(
            'success',
            'Home page updated successfully.'
        );
}





}