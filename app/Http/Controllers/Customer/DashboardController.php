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
        return view('Customer.requests');
    }


    public function appointments()
    {
        return view('Customer.appointments');
    }


    public function history()
    {
        return view('Customer.history');
    }

    
    public function feedback()
    {
        return view('Customer.feedback');
    }
}