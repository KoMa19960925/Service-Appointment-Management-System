<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function customerDashboard()
    {
        return view('Customer.Dashboard');
    }
}
