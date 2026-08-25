<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Assignedtechnician;
use App\Models\CustomerFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechniciandashboardController extends Controller
{



    public function dashboard()
    {
        $assignedServices = Assignedtechnician::where('technician_id', auth()->id())->count();
        $completedServices = Assignedtechnician::where('technician_id', auth()->id())->where('status', 'Completed')->count();
        $totalCustomerFeedback = CustomerFeedback::where('technician_id', auth()->id())->count();

        return view(
            'Technician.dashboard',
            compact('assignedServices', 'completedServices', 'totalCustomerFeedback')
        );
    }



    public function Assignedwork()
    {
        $assignedtechnicians = Assignedtechnician::with(['serviceRequest', 'technician'])->where('technician_id', auth()->id())->get();

        return view(
            'Technician.Assignedwork',
            compact('assignedtechnicians')
        );
    }


    public function uploadWorkProof(Request $request, $id)
    {
        $request->validate([
            'image_1' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120',],
            'image_2' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120',],
        ]);

        $assignedtechnician = Assignedtechnician::where('technician_id', auth()->id())->findOrFail($id);

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


        $image1 = $request->file('image_1')->store('work-proofs', 'public');
        $image2 = $request->file('image_2')->store('work-proofs', 'public');


        $assignedtechnician->image_1 = $image1;
        $assignedtechnician->image_2 = $image2;

        $assignedtechnician->status = 'Completed';
        $assignedtechnician->save();


        return redirect()
            ->route('Technician.Assignedwork')->with('success', 'Work proof uploaded successfully.');
    }



    public function deleteWorkProof($id)
    {

        $assignedtechnician = Assignedtechnician::where(
            'technician_id',auth()->id())->findOrFail($id);


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
            ->route('Technician.Assignedwork')->with('success', 'Work proof deleted successfully.');
    }



    public function Servicehistory()
    {
        $servicehistories = Assignedtechnician::with([
            'serviceRequest',
            'technician'
        ])->where('technician_id', auth()->id())->where('status', 'Completed')->get();

        return view('Technician.Servicehistory', compact('servicehistories'));
    }




    public function Payment()
    {
        $payments = Assignedtechnician::with([
            'serviceRequest',
            'payment'
        ])
            ->where('technician_id', auth()->id())
            ->where('status', 'Completed')
            ->get();

        return view('Technician.Payment', compact('payments'));
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
