@extends('layouts.Customerapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">


            <div class="mb-4">
                <h2 class="fw-bold">
                    Customer Dashboard
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
                                Browse available services, submit service requests,
                                manage your appointments, and view your service history.
                            </p>
                        </div>

                        <div class="col-lg-5 mt-3 mt-lg-0">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=85"
                                alt="Customer Service Management" class="img-fluid w-100 rounded-3"
                                style="height: 240px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center me-3"
                                    style="width: 65px; height: 65px;">
                                    <i class="bi bi-clipboard-check-fill text-primary fs-2"></i>
                                </div>
                                <div>

                                    <p class="text-muted mb-1">
                                        My Requests
                                    </p>

                                    <h2 class="fw-bold mb-0">
                                        {{ $totalMyRequests }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center me-3"
                                    style="width: 65px; height: 65px;">

                                    <i class="bi bi-check-circle-fill text-success fs-2"></i>

                                </div>
                                <div>

                                    <p class="text-muted mb-1">
                                        Completed Requests
                                    </p>

                                    <h2 class="fw-bold mb-0">
                                        {{ $completedRequests }}
                                    </h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body p-0">
                    <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&w=1600&q=85"
                        alt="Customer Service and Appointment Management" class="img-fluid w-100 rounded-3"
                        style="height: 350px; object-fit: cover;">
                </div>
            </div>
        </div>
    </main>
@endsection
