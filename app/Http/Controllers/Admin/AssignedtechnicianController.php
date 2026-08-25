<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignedtechnician;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignedtechnicianController extends Controller
{

    public function TechnicianAssigned()
    {
        $servicerequests = ServiceRequest::with(['assignedTechnician.technician'])->get();
        $technicians = User::where('role', 'technician')->orderBy('name')->get();

        return view(
            'Admin.Technicianassigned',
            compact(
                'servicerequests',
                'technicians'
            )
        );
    }


    public function assignTechnician(Request $request, $id)
    {
        $request->validate([
            'technician_id' => ['required', 'exists:users,id',],
            'assigned_date' => ['required', 'date',],
            'assigned_time' => ['required',],
        ]);

        $servicerequest = ServiceRequest::findOrFail($id);

        if ($servicerequest->assignedTechnician) {

            return redirect()
                ->route('Admin.TechnicianAssigned')
                ->with(
                    'error',
                    'Technician is already assigned to this request.'
                );
        }


        $technician = User::where('id', $request->technician_id)->where('role', 'technician')->first();

        if (!$technician) {
            return redirect()->back()->with('error', 'Selected user is not a technician.');
        }



        Assignedtechnician::create([
            'service_request_id' => $servicerequest->id,
            'technician_id' => $technician->id,
            'assigned_date' => $request->assigned_date,
            'assigned_time' => $request->assigned_time,
            'status' => 'Scheduled',
        ]);

        return redirect()
            ->route('Admin.TechnicianAssigned')
            ->with(
                'success',
                'Technician assigned successfully.'
            );
    }




    public function removeTechnician($id)
    {

        $assignedtechnician = Assignedtechnician::findOrFail($id);

        if ($assignedtechnician->status === 'Completed') {

            return redirect()
                ->route('Admin.TechnicianAssigned')
                ->with(
                    'error',
                    'Completed service technician cannot be changed.'
                );
        }


        if ($assignedtechnician->image_1) {

            if (
                Storage::disk('public')->exists(
                    $assignedtechnician->image_1
                )
            ) {

                Storage::disk('public')->delete(
                    $assignedtechnician->image_1
                );
            }
        }



        if ($assignedtechnician->image_2) {

            if (
                Storage::disk('public')->exists(
                    $assignedtechnician->image_2
                )
            ) {

                Storage::disk('public')->delete(
                    $assignedtechnician->image_2
                );
            }
        }


        $assignedtechnician->delete();

        return redirect()
            ->route('Admin.TechnicianAssigned')
            ->with(
                'success',
                'Technician removed successfully.'
            );
    }


    public function updateStatus(Request $request, $id)
    {

        $request->validate([
            'status' => [
                'required',
                'in:Scheduled,Completed',
            ],
        ]);


        $assignedtechnician =
            Assignedtechnician::findOrFail($id);

        if ($request->status === 'Completed') {



            if (
                !$assignedtechnician->image_1 ||
                !$assignedtechnician->image_2
            ) {

                return redirect()
                    ->route('Admin.TechnicianAssigned')
                    ->with(
                        'error',
                        'The technician must upload both work proof images.'
                    );
            }
        }


        $assignedtechnician->update([
            'status' => $request->status,
        ]);


        return redirect()
            ->route('Admin.TechnicianAssigned')
            ->with(
                'success',
                'Service status updated successfully.'
            );
    }
}
