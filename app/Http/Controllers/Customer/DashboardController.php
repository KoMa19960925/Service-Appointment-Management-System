<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function customerDashboard()
    {
        return view('Customer.dashboard');
    }


    public function services()
    {
        return view('Customer.services');
    }

    
    public function requests()
    {
        return view('Customer.Myrequests');
    }


    public function Technicianassigned()
    {
        return view('Customer.Assignedtechnician');
    }


    public function Servicehistory()
    {
        return view('Customer.Serviceshistory');
    }

    
    public function feedback()
    {
        return view('Customer.Feedback');
    }
}