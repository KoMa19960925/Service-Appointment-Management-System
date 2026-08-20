<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechniciandashboardController extends Controller
{
     public function technicianDashboard()
    {
        return view('Technician.Dashboard');
    }
}
