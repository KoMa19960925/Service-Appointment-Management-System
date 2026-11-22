<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Assignedtechnician;
use App\Models\CustomerFeedback;
use App\Models\Service;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function CustomerDashboard()
    {
        $totalMyRequests = ServiceRequest::where('user_id', Auth::id())->count();

        $completedRequests = Assignedtechnician::whereHas(
            'serviceRequest',
            function ($query) {
                $query->where('user_id', Auth::id());
            }

        )->where('status', 'Completed')->count();

        return view(
            'Customer.Dashboard',
            compact(
                'totalMyRequests',
                'completedRequests'
            )
        );
    }



    public function services()
    {
        return view('Customer.services', ['services' => Service::orderBy('name')->get()]);
    }


    public function feedback()
    {

        $completedServices = Assignedtechnician::with(['serviceRequest', 'technician'])
            ->whereHas('serviceRequest', function ($query) {
                $query->where('user_id', auth()->id());
            })->where('status', 'Completed')->get();

        return view(
            'Customer.Feedback',
            compact('completedServices')
        );
    }


    public function storeFeedback(Request $request)
    {

        $request->validate([
            'assigned_technician_id' => ['required', 'exists:assignedtechnicians,id'],
            'technician_id' => ['required', 'exists:users,id'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'max:1000'],
        ]);



        $assignment = Assignedtechnician::with(['serviceRequest', 'technician'])
            ->where('id', $request->assigned_technician_id)
            ->where('technician_id', $request->technician_id)
            ->where('status', 'Completed')
            ->whereHas('serviceRequest', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->firstOrFail();



        CustomerFeedback::create([
            'customer_id' => auth()->id(),
            'technician_id' => $assignment->technician_id,
            'service_request_id' =>
            $assignment->service_request_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);


        return redirect()
            ->route('Customer.feedback')
            ->with('success','Feedback submitted successfully.'
            );
    }



    public function Servicehistory()
    {

        $servicehistories = Assignedtechnician::with([
            'serviceRequest',
            'technician'
        ])
            ->whereHas('serviceRequest', function ($query) {
                $query->where('user_id', auth()->id());
            })->get();

        return view(
            'Customer.Serviceshistory',
            compact('servicehistories')
        );
    }
}
