@extends('layouts.Adminapp')

@section('content')
    <x-portal-dashboard
        role="Admin"
        description="Review incoming requests, coordinate technician assignments and track completed services."
        action="Review customer requests"
        action-route="Admin.Customerservicerequests"
        :metrics="[
            ['Customer requests', $totalCustomerRequests, 'bi-clipboard-check', 'Admin.Customerservicerequests'],
            ['Completed services', $completedServices, 'bi-check-circle', 'Admin.Servicehistory'],
            ['Customer feedback', $totalCustomerFeedback, 'bi-star', 'Admin.Customerfeedback'],
        ]"
    />
@endsection
