<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\Assignedtechnician;
use Illuminate\Http\Request;

class ServicerequController extends Controller
{
    public function createRequest(Request $request)
    {
        $service = $request->service;
        return view(
            'Customer.ServiceRequest',
            compact('service')
        );
    }


    public function storeRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'service_name' => 'required',
            'description' => 'required',
            'request_date' => 'required|date',
            'request_time' => 'required',
        ]);

        ServiceRequest::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'service_name' => $request->service_name,
            'description' => $request->description,
            'request_date' => $request->request_date,
            'request_time' => $request->request_time,
        ]);

        return redirect()->route('Customer.requests')->with('success', 'Service Request Submitted Successfully.');
    }


    public function requests()
    {
        $servicerequests = ServiceRequest::where('user_id', auth()->id())->get();
        return view(
            'Customer.Myrequests',
            compact('servicerequests')
        );
    }




    public function Technicianassigned()
    {
        $assignedtechnicians = Assignedtechnician::whereHas(
            'serviceRequest',
            function ($query) {
                $query->where('user_id', auth()->id());
            }
        )->with(['serviceRequest', 'technician'])->get();

        return view(
            'Customer.Assignedtechnician',
            compact('assignedtechnicians')
        );
    }


    public function editRequest($id)
    {
        $servicerequest = ServiceRequest::where('user_id', auth()->id())->findOrFail($id);

        return view(
            'Customer.EditRequest',
            compact('servicerequest')
        );
    }


    public function updateRequest(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'request_date' => 'required|date',
            'request_time' => 'required',
        ]);

        $servicerequest = ServiceRequest::where('user_id', auth()->id())->findOrFail($id);

        $servicerequest->update([
            'description' => $request->description,
            'request_date' => $request->request_date,
            'request_time' => $request->request_time,
        ]);

        return redirect()
            ->route('Customer.requests')
            ->with('success', 'Service Request Updated Successfully.');
    }


    public function deleteRequest($id)
    {
        $servicerequest = ServiceRequest::where('user_id', auth()->id())->findOrFail($id);
        $servicerequest->delete();
        return redirect()->route('Customer.requests')->with('success', 'Service Request Deleted Successfully.');
    }
}
