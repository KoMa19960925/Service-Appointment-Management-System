@extends('layouts.Customerapp')

@section('content')
    <x-portal-dashboard
        role="Customer"
        hero-image="images/customer-dashboard.webp"
        banner-image="images/customer-home-service-v2.webp"
        banner-alt="Home service technician greeting a customer at her doorstep"
        description="Browse available services, submit a request and follow the progress of your appointments."
        action="Browse services"
        action-route="Customer.services"
        :metrics="[
            ['My requests', $totalMyRequests, 'bi-clipboard-check', 'Customer.requests'],
            ['Completed requests', $completedRequests, 'bi-check-circle', 'Customer.Servicehistory'],
        ]"
    />
@endsection
