@extends('layouts.Adminapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold mb-1">Admin Dashboard</h2>

                <p class="text-muted mb-0">
                    Welcome back, {{ Auth::user()->name }}
                </p>
            </div>


            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">

                        <div class="col-lg-7">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 me-3"
                                    style="width: 65px; height: 65px;">
                                    <i class="bi bi-speedometer2 text-primary fs-2"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-2">Welcome to Service & Appointment Management System</h4>
                                    <p class="text-muted mb-0">Manage customer service requests,
                                        technician assignments, completed
                                        services, technician payments and
                                        customer feedback from the admin
                                        dashboard.
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-5 text-center mt-4 mt-lg-0">
                            <img src="https://aexsoftware.com/hubfs/AI-Generated%20Media/Images/photographic%20The%20image%20depicts%20a%20modern%20digital%20workspace%20filled%20with%20vibrant%20screens%20displaying%20various%20dashboards%20and%20analytics%20related%20to%20field%20ser-1.png"
                                alt="Service Management" class="img-fluid w-100 rounded-3"
                                style="height: 280px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded-3 d-flex
                                            align-items-center
                                            justify-content-center me-3"
                                    style="width: 65px; height: 65px;">
                                    <i class="bi bi-clipboard-check-fill text-primary fs-2"></i>
                                </div>


                                <div>
                                    <h6 class="text-muted mb-1">
                                        Total Customer Requests
                                    </h6>
                                    <h2 class="fw-bold mb-0">
                                        {{ $totalCustomerRequests }}
                                    </h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center me-3"
                                    style="width: 65px; height: 65px;">
                                    <i class="bi bi-check-circle-fill text-success fs-2"></i>
                                </div>



                                <div>
                                    <h6 class="text-muted mb-1">
                                        Completed Services
                                    </h6>
                                    <h2 class="fw-bold mb-0">
                                        {{ $completedServices }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center me-3"
                                    style="width: 65px; height: 65px;">
                                    <i class="bi bi-star-fill text-warning fs-2"></i>
                                </div>

                                <div>
                                    <h6 class="text-muted mb-1">Total Customer Feedback</h6>
                                    <h2 class="fw-bold mb-0">{{ $totalCustomerFeedback }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card border-0 shadow-sm mt-4 mb-4">
                <div class="card-body p-0">
                    <img src="{{ asset('images/Admin.jpg') }}" alt="Service Management" class="img-fluid w-100 rounded-3"
                        style="height: 500px; object-fit: cover;">
                </div>
            </div>
        </div>
    </main>
    </div>

    {{-- @include('components.footer') --}}
@endsection
