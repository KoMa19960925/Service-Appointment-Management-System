@extends('layouts.Adminapp')

@section('content')
    <div class="container-fluid py-4">
        <h2 class="fw-bold mb-4">Services</h2>

        @if (session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 mb-3">Create Service</h3>
                        <form action="{{ route('Admin.services.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="service-name" class="form-label">Service Name</label>
                                <input id="service-name" name="name" type="text" maxlength="255"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="service-description" class="form-label">Description</label>
                                <textarea id="service-description" name="description" rows="4" maxlength="2000"
                                    class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create Service</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 mb-3">Available Services</h3>
                        <ul class="list-group list-group-flush">
                            @forelse ($services as $service)
                                <li class="list-group-item px-0 text-break">
                                    <strong>{{ $service->name }}</strong>
                                    <p class="text-muted mb-0">{{ $service->description }}</p>
                                </li>
                            @empty
                                <li class="list-group-item px-0 text-muted">No services available yet.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
