@extends('layouts.Adminapp')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-md-7">
                <div class="card border-0 shadow">
                    <div class="card-header bg-dark text-white p-3">
                        <h4 class="mb-0">
                            <i class="bi bi-cash-coin me-2"></i>
                            Pay Technician
                        </h4>
                    </div>


                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Technician</label>
                            <input type="text" class="form-control" value="{{ $assignment->technician->name }}"readonly>
                        </div>


                        <div class="mb-3">
                            <label class="form-label fw-semibold">Customer</label>
                            <input type="text"class="form-control" value="{{ $assignment->serviceRequest->name }}"
                                readonly>
                        </div>



                        <div class="mb-3">
                            <label class="form-label fw-semibold">Service</label>
                            <input type="text"class="form-control"
                                value="{{ $assignment->serviceRequest->service_name }}" readonly>
                        </div>



                        <form action="{{ route('Admin.StoreTechnicianPayment', $assignment->id) }}" method="POST">
                            @csrf


                            <div class="mb-3">
                                <label class="form-label fw-semibold">Payment Amount</label>
                                <input type="number"name="amount" class="form-control" min="0.01" step="0.01"
                                    placeholder="Enter payment amount" value="{{ old('amount') }}"required>

                                @error('amount')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label class="form-label fw-semibold">Payment Method</label>
                                <select name="payment_method" class="form-select" required>
                                    <option value="">Select Payment Method</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="Online">Online</option>
                                </select>

                                @error('payment_method')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label class="form-label fw-semibold">Payment Reference</label>
                                <input type="text" name="payment_reference" class="form-control"
                                    placeholder="Transaction / reference number" value="{{ old('payment_reference') }}">
                            </div>



                            <div class="mb-3">
                                <label class="form-label fw-semibold">Notes</label>
                                <textarea name="notes" class="form-control" rows="3" placeholder="Payment notes...">{{ old('notes') }}</textarea>
                            </div>



                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('Admin.TechnicianPayment') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i> Cancel
                                </a>


                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-cash-coin me-2"></i>Pay Technician
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
