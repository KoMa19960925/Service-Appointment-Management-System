@extends('layouts.app')

@section('content')
<section class="py-5 bg-white">

        <div class="container">

            <div class="text-center mb-5">

                <span class="text-secondary fw-semibold">
                    OUR FEATURES
                </span>

                <h1 class="fw-bold mt-2">
                    Everything You Need
                </h1>

                <p class="text-muted mx-auto"
                    style="max-width: 650px;">

                    SAMS provides a simple and organized way
                    to manage service requests and appointments.

                </p>

            </div>


            <div class="row g-4">

                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-clipboard-plus fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Service Requests
                            </h5>

                            <p class="text-muted mb-0">

                                Customers can submit service
                                requests with required service
                                details and preferred schedules.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-person-workspace fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Technician Assignment
                            </h5>

                            <p class="text-muted mb-0">

                                Administrators can assign suitable
                                technicians to customer service requests.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-calendar-check fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Appointment Management
                            </h5>

                            <p class="text-muted mb-0">

                                Manage assigned service dates,
                                times and service schedules efficiently.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-camera fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Work Proof
                            </h5>

                            <p class="text-muted mb-0">

                                Technicians can upload work proof
                                images after completing assigned services.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-credit-card fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Technician Payments
                            </h5>

                            <p class="text-muted mb-0">

                                Administrators can record technician
                                payments for completed services.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-chat-square-text fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Customer Feedback
                            </h5>

                            <p class="text-muted mb-0">

                                Customers can rate completed services
                                and provide valuable feedback.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
