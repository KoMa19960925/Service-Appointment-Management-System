@extends('layouts.Adminapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold mb-1">Edit Technician</h2>
                <p class="text-muted mb-0">Update technician information</p>
            </div>


            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <form action="{{ route('Admin.technician.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')


                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Technician Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name', $user->name) }}" placeholder="Enter technician name" required>

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>



                                <div class="mb-3">
                                    <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ old('phone', $user->phone) }}" placeholder="Enter phone number" required>

                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label for="service_category" class="form-label fw-semibold">Service Category</label>
                                    <select name="service_category" id="service_category" class="form-select" required>

                                        <option value="">
                                            Select Service Category
                                        </option>

                                        <option value="Electrical"
                                            {{ old('service_category', $user->service_category) == 'Electrical' ? 'selected' : '' }}>
                                            Electrical
                                        </option>

                                        <option value="Plumbing"
                                            {{ old('service_category', $user->service_category) == 'Plumbing' ? 'selected' : '' }}>
                                            Plumbing
                                        </option>

                                        <option value="Cleaning & Maintenance"
                                            {{ old('service_category', $user->service_category) == 'Cleaning & Maintenance' ? 'selected' : '' }}>
                                            Cleaning & Maintenance
                                        </option>

                                        <option value="Air Conditioning"
                                            {{ old('service_category', $user->service_category) == 'Air Conditioning' ? 'selected' : '' }}>
                                            Air Conditioning
                                        </option>

                                        <option value="Appliance Repair"
                                            {{ old('service_category', $user->service_category) == 'Appliance Repair' ? 'selected' : '' }}>
                                            Appliance Repair
                                        </option>

                                        <option value="Other"
                                            {{ old('service_category', $user->service_category) == 'Other' ? 'selected' : '' }}>
                                            Other
                                        </option>

                                    </select>

                                    @error('service_category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="work_experience" class="form-label fw-semibold">
                                        Work Experience
                                    </label>

                                    <input type="text" name="work_experience" id="work_experience" class="form-control"
                                        value="{{ old('work_experience', $user->work_experience) }}"
                                        placeholder="Example: 5 Years" required>

                                    @error('work_experience')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">
                                        Email Address
                                    </label>

                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email', $user->email) }}"
                                        required>

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold">
                                        Password
                                    </label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control"
                                         value="{{ old('email', $user->password) }}">

                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="togglePassword('password', 'passwordIcon')">

                                            <i class="bi bi-eye" id="passwordIcon"></i>
                                        </button>

                                    </div>

                                    @error('password')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-semibold">
                                        Confirm Password
                                    </label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" value="{{ old('email', $user->password) }}">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="togglePassword('password_confirmation', 'confirmPasswordIcon')">
                                            <i class="bi bi-eye" id="confirmPasswordIcon"></i>
                                        </button>
                                    </div>
                                </div>


                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Update Technician
                                    </button>
                                    <a href="{{ route('Admin.Techniciandetails') }}" class="btn btn-secondary">

                                        <i class="bi bi-arrow-left me-1"></i>
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
