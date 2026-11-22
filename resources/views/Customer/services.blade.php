@extends('layouts.Customerapp')

@section('content')
    <div class="container-fluid p-3 p-md-4 bg-light">
        <div class="mb-4">
            <h2 class="fw-bold">Available Services</h2>
            <p class="text-muted">Choose a service and submit a service request.</p>
        </div>

        <div class="row g-4">
            @forelse ($services as $service)
                <div class="col-md-6 col-xl-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body d-flex flex-column align-items-start p-4">
                            <span class="sams-metric-icon px-3 mb-3" aria-hidden="true">
                                <i class="bi bi-tools"></i>
                            </span>
                            <h3 class="h5 fw-bold text-break">{{ $service->name }}</h3>
                            <p class="text-muted text-break">{{ $service->description }}</p>
                            <a href="{{ route('Customer.request.create', ['service' => $service->id]) }}"
                                class="btn btn-primary mt-auto">Request Service</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p class="text-muted mb-0">No services are available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
