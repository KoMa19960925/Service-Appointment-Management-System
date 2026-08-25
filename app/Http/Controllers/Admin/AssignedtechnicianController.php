<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignedtechnician;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AssignedtechnicianController extends Controller
{
    public function TechnicianAssigned()
    {
        $servicerequests = ServiceRequest::with([
            'assignedTechnician.technician'
        ])
        ->latest()
        ->get();

        $technicians = User::where('role', 'technician')
            ->orderBy('name')
            ->get();

        return view(
            'Admin.Technicianassigned',
            compact('servicerequests', 'technicians')
        );
    }


    public function assignTechnician(Request $request, $id)
    {
        $request->validate([
            'technician_id' => 'required|exists:users,id',
        ]);

        $servicerequest = ServiceRequest::findOrFail($id);

        Assignedtechnician::create([
            'service_request_id' => $servicerequest->id,
            'technician_id' => $request->technician_id,
            'status' => 'Scheduled',
        ]);

        return redirect()
            ->route('Admin.TechnicianAssigned')
            ->with('success', 'Technician assigned successfully.');
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Scheduled,Completed',
        ]);

        $assignedtechnician = Assignedtechnician::findOrFail($id);

        $assignedtechnician->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('Admin.TechnicianAssigned')
            ->with('success', 'Status updated successfully.');
    }
}