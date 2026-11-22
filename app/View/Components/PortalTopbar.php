<?php

namespace App\View\Components;

use App\Models\Assignedtechnician;
use App\Models\ServiceRequest;
use Illuminate\View\Component;
use Illuminate\View\View;

class PortalTopbar extends Component
{
    public function __construct(public string $role) {}

    public function render(): View
    {
        $userId = auth()->id();
        [$count, $label, $route] = match ($this->role) {
            'Admin' => [
                ServiceRequest::doesntHave('assignedTechnician')->count(),
                'Unassigned customer requests',
                'Admin.Customerservicerequests',
            ],
            'Customer' => [
                Assignedtechnician::whereHas('serviceRequest', fn ($query) => $query->where('user_id', $userId))
                    ->where('status', 'Scheduled')->count(),
                'Scheduled appointments',
                'Customer.Technicianassigned',
            ],
            'Technician' => [
                Assignedtechnician::where('technician_id', $userId)->where('status', 'Scheduled')->count(),
                'Scheduled jobs',
                'Technician.Assignedwork',
            ],
        };

        return view('components.portal-topbar', compact('count', 'label', 'route'));
    }
}
