@extends('layouts.Customerapp')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card border-0 shadow">


                    <div class="card-header bg-dark text-light p-3">
                        <h4 class="mb-0">
                            Create Service Request
                        </h4>
                    </div>


                    <div class="card-body p-4">
                        <form action="{{ route('Customer.request.store') }}" method="POST">
                            @csrf


                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Customer Name
                                </label>

                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"
                                    readonly>

                                @error('name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>



                             <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Address
                                </label>

                                <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}"
                                    readonly>

                                @error('address')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>



                             <div class="mb-3">
                                <label class="form-label fw-semibold">
                                     Phone Number
                                </label>

                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone}}"
                                    readonly>

                                @error('phone')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>




                            <div class="mb-3">
                                <label for="service_id" class="form-label fw-semibold">
                                    Service Name
                                </label>
                                <select id="service_id" name="service_id" class="form-select" required>
                                    <option value="">Select a service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" @selected((string) old('service_id', $selectedService) === (string) $service->id)>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('service_id')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Service Description
                                </label>
                                <textarea name="description" class="form-control" rows="4"
                                    placeholder="Describe your problem or service requirement...">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Request Date
                                </label>
                                <input type="date" name="request_date" class="form-control"
                                    value="{{ old('request_date') }}" min="{{ date('Y-m-d') }}">

                                @error('request_date')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Request Time
                                </label>
                                <input type="time" name="request_time" class="form-control"
                                    value="{{ old('request_time') }}">
                                    
                                @error('request_time')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>



                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('Customer.services') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i>
                                    Cancel
                                </a>



                                <button type="submit" class="btn btn-dark">
                                    <i class="bi bi-send me-2"></i>
                                    Submit Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
