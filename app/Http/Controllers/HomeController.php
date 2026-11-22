<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index()
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

        return view('Main.home',compact('home'));
    }



    

}