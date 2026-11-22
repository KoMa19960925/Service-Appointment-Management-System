@extends('layouts.Technicianapp')

@section('content')
    <x-portal-dashboard
        role="Technician"
        hero-image="images/technician-dashboard.webp"
        banner-image="images/technician-service-team.webp"
        banner-alt="Two service technicians reviewing a maintenance plan beside industrial equipment"
        description="Review your assigned jobs, upload completed work and check your service history."
        action="View assigned work"
        action-route="Technician.Assignedwork"
        :metrics="[
            ['Assigned services', $assignedServices, 'bi-clipboard-check', 'Technician.Assignedwork'],
            ['Completed services', $completedServices, 'bi-check-circle', 'Technician.Servicehistory'],
            ['Customer feedback', $totalCustomerFeedback, 'bi-star', 'Technician.Customerfeedback'],
        ]"
    />
@endsection
