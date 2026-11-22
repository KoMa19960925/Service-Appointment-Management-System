<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Assignedtechnician;
use App\Models\CustomerFeedback;
use App\Models\TechnicianPayment;
use App\Models\TechnicianPurchaseImage;
use App\Models\TechnicianPurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechniciandashboardController extends Controller
{
    public function dashboard()
    {
        $assignedServices = Assignedtechnician::where(
            'technician_id',
            auth()->id()
        )->count();

        $completedServices = Assignedtechnician::where(
            'technician_id',
            auth()->id()
        )
            ->where('status', 'Completed')
            ->count();

        $totalCustomerFeedback = CustomerFeedback::where(
            'technician_id',
            auth()->id()
        )->count();

        return view(
            'Technician.Dashboard',
            compact(
                'assignedServices',
                'completedServices',
                'totalCustomerFeedback'
            )
        );
    }


    public function Assignedwork()
    {
        $assignedtechnicians = Assignedtechnician::with([
            'serviceRequest',
            'technician'
        ])
            ->where('technician_id', auth()->id())
            ->get();

        return view(
            'Technician.Assignedwork',
            compact('assignedtechnicians')
        );
    }


    public function uploadWorkProof(Request $request, $id)
    {
        $request->validate([
            'image_1' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'image_2' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $assignedtechnician = Assignedtechnician::where(
            'technician_id',
            auth()->id()
        )->findOrFail($id);


        if ($assignedtechnician->image_1) {
            Storage::disk('public')->delete(
                $assignedtechnician->image_1
            );
        }


        if ($assignedtechnician->image_2) {
            Storage::disk('public')->delete(
                $assignedtechnician->image_2
            );
        }


        $image1 = $request->file('image_1')
            ->store('work-proofs', 'public');

        $image2 = $request->file('image_2')
            ->store('work-proofs', 'public');


        $assignedtechnician->image_1 = $image1;
        $assignedtechnician->image_2 = $image2;

        /*
        |--------------------------------------------------------------------------
        | Work completed by technician
        | Payment is now waiting for technician details
        |--------------------------------------------------------------------------
        */

        $assignedtechnician->status = 'Payment Pending';

        $assignedtechnician->save();


        return redirect()
            ->route('Technician.Assignedwork')
            ->with(
                'success',
                'Work proof uploaded successfully. Payment details can now be submitted.'
            );
    }


    public function deleteWorkProof($id)
    {
        $assignedtechnician = Assignedtechnician::where(
            'technician_id',
            auth()->id()
        )->findOrFail($id);


        if ($assignedtechnician->image_1) {
            Storage::disk('public')->delete(
                $assignedtechnician->image_1
            );
        }


        if ($assignedtechnician->image_2) {
            Storage::disk('public')->delete(
                $assignedtechnician->image_2
            );
        }


        $assignedtechnician->image_1 = null;
        $assignedtechnician->image_2 = null;

        $assignedtechnician->status = 'Scheduled';
        

        $assignedtechnician->save();


        return redirect()
            ->route('Technician.Assignedwork')
            ->with(
                'success',
                'Work proof deleted successfully.'
            );
    }


    public function Servicehistory()
    {
        $servicehistories = Assignedtechnician::with([
            'serviceRequest',
            'technician'
        ])
            ->where('technician_id', auth()->id())
            ->where('status', 'Completed')
            ->get();

        return view(
            'Technician.Servicehistory',
            compact('servicehistories')
        );
    }


    public function Payment()
    {
        $payments = Assignedtechnician::with([
            'serviceRequest',
            'payment'
        ])
            ->where('technician_id', auth()->id())
            ->whereIn('status', [
                'Payment Pending',
                'Completed'
            ])
            ->get();

        return view(
            'Technician.Payment',
            compact('payments')
        );
    }


    public function paymentDetails($id)
    {
        $assignedtechnician = Assignedtechnician::with([
            'serviceRequest',
            'technician',
            'payment.purchaseItems',
            'payment.purchaseImages',
        ])
            ->where('technician_id', auth()->id())
            ->findOrFail($id);


        return view(
            'Technician.paymentdetails',
            compact('assignedtechnician')
        );
    }


    public function paymentDetailsStore(Request $request, $id)
    {
        $request->validate([

            'work_start_time' => [
                'required',
                'date_format:H:i',
            ],

            'work_end_time' => [
                'required',
                'date_format:H:i',
                'after_or_equal:work_start_time',
            ],

            'work_description' => [
                'required',
                'string',
                'max:2000',
            ],

            /*
            |--------------------------------------------------------------------------
            | Purchased Items - Optional
            |--------------------------------------------------------------------------
            */

            'item_name' => [
                'nullable',
                'array',
            ],

            'item_name.*' => [
                'nullable',
                'string',
                'max:255',
            ],

            'quantity' => [
                'nullable',
                'array',
            ],

            'quantity.*' => [
                'nullable',
                'integer',
                'min:1',
            ],

            'item_description' => [
                'nullable',
                'array',
            ],

            'item_description.*' => [
                'nullable',
                'string',
                'max:1000',
            ],

            /*
            |--------------------------------------------------------------------------
            | Bill Images - Optional / Multiple
            |--------------------------------------------------------------------------
            */

            'bill_images' => [
                'nullable',
                'array',
            ],

            'bill_images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);


        $assignedtechnician = Assignedtechnician::with([
            'serviceRequest',
            'technician',
            'payment'
        ])
            ->where('technician_id', auth()->id())
            ->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Only Payment Pending services can submit details
        |--------------------------------------------------------------------------
        */

        if ($assignedtechnician->status !== 'Payment Pending') {

            return redirect()
                ->route('Technician.Payment')
                ->with(
                    'error',
                    'Work details can be submitted only after the work proof is uploaded.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Prevent duplicate submission
        |--------------------------------------------------------------------------
        */

        if ($assignedtechnician->payment) {

            return redirect()
                ->route(
                    'Technician.paymentdetails',
                    $assignedtechnician->id
                )
                ->with(
                    'error',
                    'Work details have already been submitted for this service.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Create Technician Payment Request
        |--------------------------------------------------------------------------
        |
        | Technician does NOT enter:
        | - Amount
        | - Payment Method
        |
        | Admin will enter these when paying.
        |
        */

        $payment = TechnicianPayment::create([

            'assigned_technician_id' =>
                $assignedtechnician->id,

            'technician_id' =>
                auth()->id(),

            'service_request_id' =>
                $assignedtechnician->service_request_id,

            'amount' =>
                null,

            'work_start_time' =>
                $request->work_start_time,

            'work_end_time' =>
                $request->work_end_time,

            'work_description' =>
                $request->work_description,

            'payment_method' =>
                null,

            'payment_status' =>
                'Pending',

            'paid_at' =>
                null,

            'payment_reference' =>
                null,

            'notes' =>
                null,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Save Purchased Items
        |--------------------------------------------------------------------------
        */

        $itemNames = $request->item_name ?? [];

        $quantities = $request->quantity ?? [];

        $itemDescriptions =
            $request->item_description ?? [];


        foreach ($itemNames as $index => $itemName) {

            if (empty($itemName)) {
                continue;
            }


            TechnicianPurchaseItem::create([

                'technician_payment_id' =>
                    $payment->id,

                'item_name' =>
                    $itemName,

                'quantity' =>
                    $quantities[$index] ?? 1,

                'item_description' =>
                    $itemDescriptions[$index] ?? null,
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Save Multiple Bill Images
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('bill_images')) {

            $uploadPath = public_path(
                'uploads/payment-bills'
            );


            /*
            | Create directory if it does not exist
            */

            if (!file_exists($uploadPath)) {
                mkdir(
                    $uploadPath,
                    0755,
                    true
                );
            }


            foreach (
                $request->file('bill_images')
                as $image
            ) {

                $imageName =
                    time()
                    . '_'
                    . uniqid()
                    . '.'
                    . $image->getClientOriginalExtension();


                $image->move(
                    $uploadPath,
                    $imageName
                );


                TechnicianPurchaseImage::create([

                    'technician_payment_id' =>
                        $payment->id,

                    'image' =>
                        $imageName,
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Return to View Details
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'Technician.paymentdetails',
                $assignedtechnician->id
            )
            ->with(
                'success',
                'Work details submitted successfully. Waiting for administrator payment.'
            );
    }


    public function feedback()
    {
        $feedbacks = CustomerFeedback::with([
            'customer',
            'serviceRequest',
            'technician'
        ])
            ->where('technician_id', auth()->id())
            ->get();

        return view(
            'Technician.customerfeedback',
            compact('feedbacks')
        );
    }
}
