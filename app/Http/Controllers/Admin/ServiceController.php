<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('Admin.Services', ['services' => Service::orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        Service::create($request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:services,name'],
            'description' => ['required', 'string', 'max:2000'],
        ]));

        return redirect()->route('Admin.services.index')->with('success', 'Service created successfully.');
    }
}
