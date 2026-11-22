<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Assignedtechnician;
use Illuminate\Http\Request;

class ServicerequController extends Controller
{
    public function createRequest(Request $request)
    {
        return view('Customer.ServiceRequest', [
            'services' => Service::orderBy('name')->get(),
            'selectedService' => $request->integer('service'),
        ]);
    }


    public function storeRequest(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'service_id' => ['required', 'integer', 'exists:services,id'],
            'description' => 'required',
            'request_date' => 'required|date',
            'request_time' => 'required',
        ]);

        $service = Service::findOrFail($validated['service_id']);

        ServiceRequest::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'service_name' => $service->name,
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
