@extends('layouts.Adminapp')

@section('content')

    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">Create Technician</h2>
            </div>



            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif



            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-dark text-white p-3">
                            <h5 class="mb-0">
                                <i class="bi bi-person-plus me-2"></i>Technician Details
                            </h5>
                        </div>


                        <div class="card-body p-4">
                            <form action="{{ route('Admin.technician.store') }}" method="POST">
                                @csrf


                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Technician Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        placeholder="Enter technician name">

                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                        placeholder="Enter phone number"required>

                                    @error('phone')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Service Category</label>
                                    <select name="service_category" class="form-select" required>
                                        <option value="" disabled {{ old('service_category') ? '' : 'selected' }}>
                                            Select Service Category
                                        </option>


                                        <option value="Computer & IT Support Service"
                                            {{ old('service_category') == 'Computer & IT Support Service' ? 'selected' : '' }}>
                                            Computer & IT Support Service
                                        </option>


                                        <option value="Electrical Service"
                                            {{ old('service_category') == 'Electrical Service' ? 'selected' : '' }}>
                                            Electrical Service
                                        </option>


                                        <option value="Plumbing Service"
                                            {{ old('service_category') == 'Plumbing Service' ? 'selected' : '' }}>
                                            Plumbing Service
                                        </option>


                                        <option value="Construction & Technical Support"
                                            {{ old('service_category') == 'Construction & Technical Support' ? 'selected' : '' }}>
                                            Construction & Technical Support
                                        </option>


                                        <option value="Cleaning & Maintenance Service"
                                            {{ old('service_category') == 'Cleaning & Maintenance Service' ? 'selected' : '' }}>
                                            Cleaning & Maintenance Service
                                        </option>


                                        <option value="Security Service"
                                            {{ old('service_category') == 'Security Service' ? 'selected' : '' }}>
                                            Security Service
                                        </option>

                                    </select>

                                    @error('service_category')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>




                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Work Experience</label>
                                    <input type="text" name="work_experience" class="form-control"
                                        value="{{ old('work_experience') }}" placeholder="Example: 5 Years"required>

                                    @error('work_experience')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="Enter technician email" required>

                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Enter password" required>
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="togglePassword('password', 'passwordIcon')">
                                            <i class="bi bi-eye" id="passwordIcon"></i>
                                        </button>
                                    </div>

                                    @error('password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="Confirm password" required>
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="togglePassword('password_confirmation','confirmPasswordIcon')">
                                            <i class="bi bi-eye" id="confirmPasswordIcon"></i>
                                        </button>
                                    </div>
                                </div>



                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('Admin.Techniciandetails') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left me-1"></i>Cancel
                                    </a>

                                    <button type="submit"class="btn btn-primary">
                                        <i class="bi bi-person-plus me-1"></i>
                                        Create Technician
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>

@endsection
