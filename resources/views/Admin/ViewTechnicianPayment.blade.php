@extends('layouts.Adminapp')

@section('content')

<main class="flex-grow-1 p-4 bg-light">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-1">
                    Technician Payment Details
                </h2>

                <p class="text-muted mb-0">
                    Review technician work details before making payment.
                </p>
            </div>

            <a href="{{ route('Admin.TechnicianPayment') }}"
                class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Back
            </a>

        </div>


        @if (session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        @if (session('error'))

            <div class="alert alert-danger alert-dismissible fade show">

                <i class="bi bi-exclamation-triangle me-2"></i>

                {{ session('error') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        @if ($errors->any())

            <div class="alert alert-danger">

                <strong>
                    Please correct the following errors:
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-dark text-white p-3">

                <h5 class="mb-0">
                    <i class="bi bi-person-workspace me-2"></i>
                    Service & Technician Information
                </h5>

            </div>


            <div class="card-body p-4">

                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="text-muted small">
                            Technician Name
                        </label>

                        <h5 class="fw-bold">
                            {{ $payment->technician?->name ?? '-' }}
                        </h5>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Customer Name
                        </label>

                        <h5 class="fw-bold">
                            {{ $payment->serviceRequest?->name ?? '-' }}
                        </h5>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Customer Address
                        </label>

                        <h5 class="fw-bold">
                            {{ $payment->serviceRequest?->address ?? '-' }}
                        </h5>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Customer Phone
                        </label>

                        <h5 class="fw-bold">
                            {{ $payment->serviceRequest?->phone ?? '-' }}
                        </h5>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Service Name
                        </label>

                        <h5 class="fw-bold">
                            {{ $payment->serviceRequest?->service_name ?? '-' }}
                        </h5>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Work Status
                        </label>

                        <div>

                            <span class="badge bg-success fs-6">

                                <i class="bi bi-check-circle me-1"></i>

                                Completed

                            </span>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Payment Status
                        </label>

                        <div>

                            @if ($payment->payment_status === 'Paid')

                                <span class="badge bg-success fs-6">

                                    <i class="bi bi-check-circle me-1"></i>

                                    Paid

                                </span>

                            @else

                                <span class="badge bg-warning text-dark fs-6">

                                    <i class="bi bi-hourglass-split me-1"></i>

                                    Pending

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-dark text-white p-3">

                <h5 class="mb-0">

                    <i class="bi bi-clock me-2"></i>

                    Work Details

                </h5>

            </div>


            <div class="card-body p-4">

                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="text-muted small">
                            Work Start Time
                        </label>

                        <h5 class="fw-bold">

                            @if ($payment->work_start_time)

                                {{ \Carbon\Carbon::parse($payment->work_start_time)->format('h:i A') }}

                            @else

                                -

                            @endif

                        </h5>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Work End Time
                        </label>

                        <h5 class="fw-bold">

                            @if ($payment->work_end_time)

                                {{ \Carbon\Carbon::parse($payment->work_end_time)->format('h:i A') }}

                            @else

                                -

                            @endif

                        </h5>

                    </div>


                    <div class="col-12">

                        <label class="text-muted small">
                            Work Description
                        </label>

                        <div class="bg-light border rounded p-3">

                            {{ $payment->work_description ?? 'No work description provided.' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-dark text-white p-3">

                <h5 class="mb-0">

                    <i class="bi bi-cart-check me-2"></i>

                    Purchased Items

                </h5>

            </div>


            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>No</th>

                                <th>Item Name</th>

                                <th>Quantity</th>

                                <th>Description</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($payment->purchaseItems as $item)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>

                                        <strong>
                                            {{ $item->item_name }}
                                        </strong>

                                    </td>

                                    <td>
                                        {{ $item->quantity }}
                                    </td>

                                    <td>
                                        {{ $item->item_description ?? '-' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center py-4 text-muted">

                                        <i class="bi bi-cart-x fs-3 d-block mb-2"></i>

                                        No purchased items were added.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-dark text-white p-3">

                <h5 class="mb-0">

                    <i class="bi bi-images me-2"></i>

                    Bill Images

                </h5>

            </div>


            <div class="card-body p-4">

                <div class="row g-3">

                    @forelse ($payment->purchaseImages as $image)

                        <div class="col-md-4 col-lg-3">

                            <div class="card border shadow-sm h-100">

                                <a
                                    href="{{ asset('uploads/payment-bills/' . $image->image) }}"
                                    target="_blank">

                                    <img
                                        src="{{ asset('uploads/payment-bills/' . $image->image) }}"
                                        class="card-img-top"
                                        style="height: 180px; object-fit: cover;"
                                        alt="Bill Image">

                                </a>

                                <div class="card-body p-2 text-center">

                                    <a
                                        href="{{ asset('uploads/payment-bills/' . $image->image) }}"
                                        target="_blank"
                                        class="btn btn-outline-primary btn-sm">

                                        <i class="bi bi-eye me-1"></i>

                                        View Image

                                    </a>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="text-center text-muted py-4">

                                <i class="bi bi-image fs-1"></i>

                                <p class="mt-2 mb-0">

                                    No bill images uploaded.

                                </p>

                            </div>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>


        @if ($payment->payment_status !== 'Paid')

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-dark text-white p-3">

                    <h5 class="mb-0">

                        <i class="bi bi-cash-coin me-2"></i>

                        Make Technician Payment

                    </h5>

                </div>


                <div class="card-body p-4">

                    <form
                        action="{{ route('Admin.PayTechnician', $payment->id) }}"
                        method="POST">

                        @csrf

                        @method('PUT')


                        <div class="row g-4">

                            <div class="col-md-6">

                                <label
                                    for="amount"
                                    class="form-label fw-semibold">

                                    Payment Amount

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        Rs.
                                    </span>

                                    <input
                                        type="number"
                                        name="amount"
                                        id="amount"
                                        class="form-control"
                                        step="0.01"
                                        min="0.01"
                                        value="{{ old('amount') }}"
                                        placeholder="Enter payment amount"
                                        required>

                                </div>

                                @error('amount')

                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <div class="col-md-6">

                                <label
                                    for="payment_method"
                                    class="form-label fw-semibold">

                                    Payment Method

                                </label>

                                <select
                                    name="payment_method"
                                    id="payment_method"
                                    class="form-select"
                                    required>

                                    <option value="">
                                        Select Payment Method
                                    </option>

                                    <option
                                        value="Cash"
                                        {{ old('payment_method') == 'Cash' ? 'selected' : '' }}>

                                        Cash

                                    </option>

                                    <option
                                        value="Bank Transfer"
                                        {{ old('payment_method') == 'Bank Transfer' ? 'selected' : '' }}>

                                        Bank Transfer

                                    </option>

                                    <option
                                        value="Online"
                                        {{ old('payment_method') == 'Online' ? 'selected' : '' }}>

                                        Online

                                    </option>

                                </select>

                                @error('payment_method')

                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <div class="col-md-6">

                                <label
                                    for="payment_reference"
                                    class="form-label fw-semibold">

                                    Payment Reference

                                    <span class="text-muted fw-normal">
                                        (Optional)
                                    </span>

                                </label>

                                <input
                                    type="text"
                                    name="payment_reference"
                                    id="payment_reference"
                                    class="form-control"
                                    value="{{ old('payment_reference') }}"
                                    placeholder="Transaction / reference number">

                                @error('payment_reference')

                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <div class="col-12">

                                <label
                                    for="notes"
                                    class="form-label fw-semibold">

                                    Payment Notes

                                    <span class="text-muted fw-normal">
                                        (Optional)
                                    </span>

                                </label>

                                <textarea
                                    name="notes"
                                    id="notes"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Add any payment notes...">{{ old('notes') }}</textarea>

                                @error('notes')

                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>

                        </div>


                        <div class="d-flex justify-content-end mt-4">

                            <button
                                type="submit"
                                class="btn btn-success btn-lg px-4"
                                onclick="return confirm('Are you sure you want to pay this technician?')">

                                <i class="bi bi-cash-coin me-2"></i>

                                Pay Technician

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        @else

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-success text-white p-3">

                    <h5 class="mb-0">

                        <i class="bi bi-check-circle me-2"></i>

                        Payment Completed

                    </h5>

                </div>


                <div class="card-body p-4">

                    <div class="row g-4">

                        <div class="col-md-4">

                            <p class="text-muted mb-1">
                                Paid Amount
                            </p>

                            <h4 class="fw-bold text-success">

                                Rs.{{ number_format($payment->amount, 2) }}

                            </h4>

                        </div>


                        <div class="col-md-4">

                            <p class="text-muted mb-1">
                                Payment Method
                            </p>

                            <h5 class="fw-bold">

                                {{ $payment->payment_method ?? '-' }}

                            </h5>

                        </div>


                        <div class="col-md-4">

                            <p class="text-muted mb-1">
                                Paid At
                            </p>

                            <h5 class="fw-bold">

                                @if ($payment->paid_at)

                                    {{ $payment->paid_at->format('d M Y h:i A') }}

                                @else

                                    -

                                @endif

                            </h5>

                        </div>


                        @if ($payment->payment_reference)

                            <div class="col-md-6">

                                <p class="text-muted mb-1">
                                    Payment Reference
                                </p>

                                <h6 class="fw-bold">

                                    {{ $payment->payment_reference }}

                                </h6>

                            </div>

                        @endif


                        @if ($payment->notes)

                            <div class="col-12">

                                <hr>

                                <p class="text-muted mb-1">
                                    Payment Notes
                                </p>

                                <p class="mb-0">
                                    {{ $payment->notes }}
                                </p>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        @endif

    </div>

</main>

@endsection