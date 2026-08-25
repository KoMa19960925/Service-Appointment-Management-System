<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechnicianPayment;
use App\Models\Assignedtechnician;
use Illuminate\Http\Request;

class TechnicianPaymentController extends Controller
{
    public function index()
    {
        $assignments = Assignedtechnician::with([
            'technician',
            'serviceRequest',
            'payment'
        ])->where('status', 'Completed')->get();

        return view(
            'Admin.TechnicianPayment',
            compact('assignments')
        );
    }

    public function create($id)
    {
        $assignment = Assignedtechnician::with([
            'technician',
            'serviceRequest',
            'payment'
        ])->findOrFail($id);

        if ($assignment->status !== 'Completed') {
            return redirect()
                ->route('Admin.TechnicianPayment')
                ->with(
                    'error',
                    'Payment is available only after the work is completed.'
                );
        }

        if ($assignment->payment) {
            return redirect()
                ->route('Admin.TechnicianPayment')
                ->with(
                    'error',
                    'Payment has already been created for this work.'
                );
        }

        return view(
            'Admin.CreateTechnicianPayment',
            compact('assignment')
        );
    }

    public function store(Request $request, $id)
    {
        $assignment = Assignedtechnician::with([
            'technician',
            'serviceRequest',
            'payment'
        ])->findOrFail($id);

        if ($assignment->status !== 'Completed') {
            return redirect()
                ->route('Admin.TechnicianPayment')
                ->with(
                    'error',
                    'You can pay the technician only after completing the work.'
                );
        }

        if ($assignment->payment) {
            return redirect()
                ->route('Admin.TechnicianPayment')
                ->with(
                    'error',
                    'This technician has already been paid for this work.'
                );
        }

        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|in:Cash,Bank Transfer,Online',
            'payment_reference' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ]);

        TechnicianPayment::create([
            'assigned_technician_id' => $assignment->id,
            'technician_id' => $assignment->technician_id,
            'service_request_id' => $assignment->service_request_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_status' => 'Paid',
            'paid_at' => now(),
            'payment_reference' => $request->payment_reference,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('Admin.TechnicianPayment')
            ->with(
                'success',
                'Technician payment recorded successfully.'
            );
    }
}
