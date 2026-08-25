@extends('layouts.Customerapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">Available Services</h2>
                <p class="text-muted">Choose a service you need and submit a service request.</p>
            </div>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="bi bi-pc-display fs-1 text-success"></i>
                            </div>
                            <h5 class="fw-bold">Computer & IT Support Service</h5>
                            <p class="text-muted">
                                Computer troubleshooting, repair and
                                maintenance services.
                            </p>
                            <a href="{{ route('Customer.request.create', ['service' => 'Computer & IT Support Service']) }}"
                                class="btn btn-secondary">Request Service
                            </a>
                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="bi bi-lightning-charge fs-1 text-warning"></i>
                            </div>
                            <h5 class="fw-bold">Electrical Service</h5>
                            <p class="text-muted">Electrical inspection, repair and maintenance services.</p>
                            <a href="{{ route('Customer.request.create', ['service' => 'Electrical Service']) }}"
                                class="btn btn-secondary">Request Service
                            </a>
                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="bi bi-droplet fs-1 text-info"></i>
                            </div>
                            <h5 class="fw-bold">Plumbing Service</h5>
                            <p class="text-muted">Plumbing installation, repair and maintenance services.</p>
                            <a href="{{ route('Customer.request.create', ['service' => 'Plumbing Service']) }}"
                                class="btn btn-secondary">
                                Request Service
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="bi bi-gear fs-1 text-secondary"></i>
                            </div>
                            <h5 class="fw-bold">Construction & Technical Support</h5>
                            <p class="text-muted">Professional Construction & Technical support and troubleshooting
                                services.</p>
                            <a href="{{ route('Customer.request.create', ['service' => 'Construction & Technical Support']) }}"
                                class="btn btn-secondary">
                                Request Service
                            </a>
                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="bi bi-house-gear fs-1 text-danger"></i>
                            </div>
                            <h5 class="fw-bold">Cleaning & Maintenance Service</h5>
                            <p class="text-muted">Regular Cleaning & Maintenance and inspection services.</p>
                            <a href="{{ route('Customer.request.create', ['service' => 'Cleaning & Maintenance Service']) }}"
                                class="btn btn-secondary">
                                Request Service
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="bi-person-badge fs-1 text-success"></i>
                            </div>
                            <h5 class="fw-bold">Security Service</h5>
                            <p class="text-muted">Security services, inspection and maintenance services.</p>
                            <a href="{{ route('Customer.request.create', ['service' => 'Security Service']) }}"
                                class="btn btn-secondary">
                                Request Service
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
@endsection
