<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechnicianPayment;
use Illuminate\Http\Request;

class TechnicianPaymentController extends Controller
{
    /**
     * Admin - Technician Payments
     */
    public function index()
    {
        $payments = TechnicianPayment::with([
            'technician',
            'serviceRequest',
            'assignedTechnician',
            'purchaseItems',
            'purchaseImages',
        ])
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'Admin.TechnicianPayment',
            compact('payments')
        );
    }


    /**
     * Admin - View Technician Submitted Details
     */
    public function viewTechnicianPayment($id)
    {
        $payment = TechnicianPayment::with([
            'technician',
            'serviceRequest',
            'assignedTechnician',
            'purchaseItems',
            'purchaseImages',
        ])->findOrFail($id);

        return view(
            'Admin.ViewTechnicianPayment',
            compact('payment')
        );
    }


    /**
     * Admin - Pay Technician
     */
    public function payTechnician(Request $request, $id)
    {
        $payment = TechnicianPayment::with([
            'assignedTechnician'
        ])->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Already Paid Check
        |--------------------------------------------------------------------------
        */

        if ($payment->payment_status === 'Paid') {

            return redirect()
                ->route(
                    'Admin.ViewTechnicianPayment',
                    $payment->id
                )
                ->with(
                    'error',
                    'This technician payment has already been paid.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Validate Admin Payment Details
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'amount' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'payment_method' => [
                'required',
                'in:Cash,Bank Transfer,Online',
            ],

            'payment_reference' => [
                'nullable',
                'string',
                'max:255',
            ],

            'notes' => [
                'nullable',
                'string',
                'max:1000',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Update Technician Payment
        |--------------------------------------------------------------------------
        */

        $payment->update([

            'amount' => $request->amount,

            'payment_method' =>
                $request->payment_method,

            'payment_status' =>
                'Paid',

            'paid_at' =>
                now(),

            'payment_reference' =>
                $request->payment_reference,

            'notes' =>
                $request->notes,

        ]);


        /*
        |--------------------------------------------------------------------------
        | After Admin Pays
        | Assignment Status = Completed
        |--------------------------------------------------------------------------
        */

        if ($payment->assignedTechnician) {

            $payment->assignedTechnician->update([
                'status' => 'Completed',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'Admin.ViewTechnicianPayment',
                $payment->id
            )
            ->with(
                'success',
                'Technician payment completed successfully.'
            );
    }
}