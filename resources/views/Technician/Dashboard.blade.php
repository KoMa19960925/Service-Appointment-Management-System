@extends('layouts.Technicianapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">
                    Technician Dashboard
                </h2>
                <p class="text-muted mb-0">
                    Welcome back, {{ Auth::user()->name }}
                </p>
            </div>


            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <h4 class="fw-bold mb-2">
                                Welcome to Service & Appointment Management System
                            </h4>
                            <p class="text-muted mb-0">
                                View your assigned services, manage your work,
                                complete service requests, upload work proof,
                                and view customer feedback and payment details.
                            </p>
                        </div>
                        <div class="col-lg-5 text-center mt-4 mt-lg-0">
                            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1200&q=85"
                                alt="Technician Service Management" class="img-fluid rounded-3"
                                style="height: 220px; width: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-1">
                                        Assigned Services
                                    </p>

                                    <h3 class="fw-bold mb-0">
                                        {{ $assignedServices }}
                                    </h3>
                                </div>


                                <div class="bg-primary bg-opacity-10 rounded-3
                                        d-flex align-items-center
                                        justify-content-center"
                                    style="width: 65px; height: 65px;">
                                    <i class="bi bi-clipboard-check-fill text-primary fs-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-1">
                                        Completed Services
                                    </p>

                                    <h3 class="fw-bold mb-0">
                                        {{ $completedServices }}
                                    </h3>
                                </div>
                                <div class="bg-success bg-opacity-10 rounded-3
                                        d-flex align-items-center
                                        justify-content-center"
                                    style="width: 65px; height: 65px;">
                                    <i class="bi bi-check-circle-fill text-success fs-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-1">
                                        Customer Feedback
                                    </p>

                                    <h3 class="fw-bold mb-0">
                                        {{ $totalCustomerFeedback }}
                                    </h3>
                                </div>
                                <div class="bg-warning bg-opacity-10 rounded-3
                                        d-flex align-items-center
                                        justify-content-center"
                                    style="width: 65px; height: 65px;">

                                    <i class="bi bi-star-fill text-warning fs-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body p-0">
                    <img src="https://www.oriontalent.com/military-job-seekers/construction/images/banner-1.jpg"
                        alt="Professional Construction Workers" class="img-fluid w-100 rounded-3"
                        style="height: 350px; object-fit: cover;">
                </div>
            </div>
        </div>
    </main>
@endsection
