@extends('layouts.Technicianapp')

@section('content')

    <main class="flex-grow-1 p-4 bg-light">

        <div class="container-fluid">

            <div class="mb-4">

                <h2 class="fw-bold">
                    Work Details
                </h2>

                <p class="text-muted mb-0">
                    @if ($assignedtechnician->payment)
                        View the work details submitted to the administrator.
                    @else
                        Submit the completed service work details to the administrator.
                    @endif
                </p>

            </div>


            @if (session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <i class="bi bi-check-circle me-2"></i>

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            @if (session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    <i class="bi bi-exclamation-triangle me-2"></i>

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Please check the following errors:
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


            {{-- ========================================================= --}}
            {{-- ALREADY SUBMITTED - VIEW ONLY --}}
            {{-- ========================================================= --}}

            @if ($assignedtechnician->payment)

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-dark text-white p-3">

                        <h5 class="mb-0">

                            <i class="bi bi-file-earmark-check me-2"></i>

                            Submitted Work Details

                            <span class="badge bg-warning text-dark float-end">
                                <i class="bi bi-hourglass-split me-1"></i>
                                Waiting for Administrator Payment
                            </span>

                        </h5>

                    </div>


                    <div class="card-body p-4">


                        {{-- SERVICE INFORMATION --}}

                        <h6 class="fw-bold border-bottom pb-2 mb-3">

                            <i class="bi bi-person-vcard me-2"></i>

                            Service Information

                        </h6>


                        <div class="row g-4">


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Technician Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $assignedtechnician->technician->name ?? '-' }}"
                                    readonly>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Customer Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $assignedtechnician->serviceRequest->name ?? '-' }}"
                                    readonly>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Customer Address
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $assignedtechnician->serviceRequest->address ?? '-' }}"
                                    readonly>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Customer Phone
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $assignedtechnician->serviceRequest->phone ?? '-' }}"
                                    readonly>

                            </div>


                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Service Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $assignedtechnician->serviceRequest->service_name ?? '-' }}"
                                    readonly>

                            </div>

                        </div>


                        <hr class="my-4">


                        {{-- WORK DETAILS --}}

                        <h6 class="fw-bold border-bottom pb-2 mb-3">

                            <i class="bi bi-clock-history me-2"></i>

                            Work Details

                        </h6>


                        <div class="row g-4">


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Work Start Time
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $assignedtechnician->payment->work_start_time ?? '-' }}"
                                    readonly>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Work End Time
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $assignedtechnician->payment->work_end_time ?? '-' }}"
                                    readonly>

                            </div>


                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Work Description
                                </label>

                                <textarea
                                    class="form-control"
                                    rows="5"
                                    readonly>{{ $assignedtechnician->payment->work_description ?? '-' }}</textarea>

                            </div>

                        </div>


                        <hr class="my-4">


                        {{-- PURCHASED ITEMS --}}

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h6 class="fw-bold mb-0">

                                <i class="bi bi-cart-check me-2"></i>

                                Purchased Items

                            </h6>

                            <span class="badge bg-secondary">
                                Optional
                            </span>

                        </div>


                        @forelse ($assignedtechnician->payment->purchaseItems as $item)

                            <div class="border rounded-3 p-3 mb-3">

                                <div class="row g-3">


                                    <div class="col-md-4">

                                        <label class="form-label fw-semibold">
                                            Item Name
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            value="{{ $item->item_name }}"
                                            readonly>

                                    </div>


                                    <div class="col-md-2">

                                        <label class="form-label fw-semibold">
                                            Quantity
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            value="{{ $item->quantity }}"
                                            readonly>

                                    </div>


                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Item Description
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            value="{{ $item->item_description ?? '-' }}"
                                            readonly>

                                    </div>


                                </div>

                            </div>

                        @empty

                            <div class="alert alert-light border text-muted">

                                <i class="bi bi-info-circle me-2"></i>

                                No purchased items were added.

                            </div>

                        @endforelse


                        <hr class="my-4">


                        {{-- BILL IMAGES --}}

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h6 class="fw-bold mb-0">

                                <i class="bi bi-images me-2"></i>

                                Bill / Purchase Images

                            </h6>

                            <span class="badge bg-secondary">
                                Optional
                            </span>

                        </div>


                        @if ($assignedtechnician->payment->purchaseImages->count() > 0)

                            <div class="row g-3">

                                @foreach ($assignedtechnician->payment->purchaseImages as $image)

                                    <div class="col-md-3">

                                        <div class="card border shadow-sm">

                                            <a
                                                href="{{ asset('uploads/payment-bills/' . $image->image) }}"
                                                target="_blank">

                                                <img
                                                    src="{{ asset('uploads/payment-bills/' . $image->image) }}"
                                                    class="card-img-top"
                                                    style="height: 180px; object-fit: cover;"
                                                    alt="Bill Image">

                                            </a>


                                            <div class="card-body text-center p-2">

                                                <a
                                                    href="{{ asset('uploads/payment-bills/' . $image->image) }}"
                                                    target="_blank"
                                                    class="btn btn-primary btn-sm">

                                                    <i class="bi bi-eye me-1"></i>

                                                    View Image

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div class="alert alert-light border text-muted">

                                <i class="bi bi-image me-2"></i>

                                No bill images were uploaded.

                            </div>

                        @endif


                        <hr class="my-4">


                        {{-- PAYMENT STATUS --}}

                        <div class="card border">

                            <div class="card-body">

                                <div class="row align-items-center">


                                    <div class="col-md-6">

                                        <h6 class="fw-bold mb-1">
                                            Payment Status
                                        </h6>

                                        <small class="text-muted">
                                            The administrator will review your submitted work details and process the payment.
                                        </small>

                                    </div>


                                    <div class="col-md-6 text-md-end">

                                        @if ($assignedtechnician->payment->payment_status === 'Paid')

                                            <span class="badge bg-success fs-6">

                                                <i class="bi bi-check-circle me-1"></i>

                                                Paid

                                            </span>

                                            @if ($assignedtechnician->payment->amount !== null)

                                                <div class="mt-2 fw-bold text-success">

                                                    Rs.{{ number_format($assignedtechnician->payment->amount, 2) }}

                                                </div>

                                            @endif

                                        @else

                                            <span class="badge bg-warning text-dark fs-6">

                                                <i class="bi bi-hourglass-split me-1"></i>

                                                Payment Pending

                                            </span>

                                        @endif

                                    </div>


                                </div>

                            </div>

                        </div>


                        <div class="d-flex justify-content-between mt-4">

                            <a
                                href="{{ route('Technician.Payment') }}"
                                class="btn btn-secondary">

                                <i class="bi bi-arrow-left me-1"></i>

                                Back to Payments

                            </a>

                        </div>


                    </div>

                </div>


            {{-- ========================================================= --}}
            {{-- NOT SUBMITTED - SHOW FORM --}}
            {{-- ========================================================= --}}

            @else


                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-dark text-white p-3">

                        <h5 class="mb-0">

                            <i class="bi bi-file-earmark-text me-2"></i>

                            Completed Service Details

                        </h5>

                    </div>


                    <div class="card-body p-4">

                        <form
                            action="{{ route('Technician.paymentdetails.store', $assignedtechnician->id) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf


                            <div class="row g-4">


                                {{-- TECHNICIAN --}}

                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Technician Name
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $assignedtechnician->technician->name ?? '-' }}"
                                        readonly>

                                </div>


                                {{-- CUSTOMER --}}

                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Customer Name
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $assignedtechnician->serviceRequest->name ?? '-' }}"
                                        readonly>

                                </div>


                                {{-- ADDRESS --}}

                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Customer Address
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $assignedtechnician->serviceRequest->address ?? '-' }}"
                                        readonly>

                                </div>


                                {{-- PHONE --}}

                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Customer Phone
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $assignedtechnician->serviceRequest->phone ?? '-' }}"
                                        readonly>

                                </div>


                                {{-- SERVICE --}}

                                <div class="col-12">

                                    <label class="form-label fw-semibold">
                                        Service Name
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $assignedtechnician->serviceRequest->service_name ?? '-' }}"
                                        readonly>

                                </div>


                                {{-- START TIME --}}

                                <div class="col-md-6">

                                    <label
                                        for="work_start_time"
                                        class="form-label fw-semibold">

                                        Work Start Time

                                    </label>

                                    <input
                                        type="time"
                                        name="work_start_time"
                                        id="work_start_time"
                                        class="form-control"
                                        value="{{ old('work_start_time') }}"
                                        required>

                                </div>


                                {{-- END TIME --}}

                                <div class="col-md-6">

                                    <label
                                        for="work_end_time"
                                        class="form-label fw-semibold">

                                        Work End Time

                                    </label>

                                    <input
                                        type="time"
                                        name="work_end_time"
                                        id="work_end_time"
                                        class="form-control"
                                        value="{{ old('work_end_time') }}"
                                        required>

                                </div>


                                {{-- DESCRIPTION --}}

                                <div class="col-12">

                                    <label
                                        for="work_description"
                                        class="form-label fw-semibold">

                                        Work Description

                                    </label>

                                    <textarea
                                        name="work_description"
                                        id="work_description"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Describe the work completed by the technician..."
                                        required>{{ old('work_description') }}</textarea>

                                </div>


                                {{-- PURCHASED ITEMS --}}

                                <div class="col-12">

                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-3">

                                        <h5 class="fw-bold mb-0">

                                            <i class="bi bi-cart-check me-2"></i>

                                            Purchased Items

                                            <span class="text-muted fw-normal fs-6">
                                                (Optional)
                                            </span>

                                        </h5>


                                        <button
                                            type="button"
                                            class="btn btn-outline-primary btn-sm"
                                            id="addItem">

                                            <i class="bi bi-plus-circle me-1"></i>

                                            Add Item

                                        </button>

                                    </div>


                                    <div id="itemsContainer">

                                        <div class="item-row border rounded-3 p-3 mb-3">

                                            <div class="row g-3">


                                                <div class="col-md-4">

                                                    <label class="form-label fw-semibold">
                                                        Item Name
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="item_name[]"
                                                        class="form-control"
                                                        placeholder="Example: Water Pipe">

                                                </div>


                                                <div class="col-md-2">

                                                    <label class="form-label fw-semibold">
                                                        Quantity
                                                    </label>

                                                    <input
                                                        type="number"
                                                        name="quantity[]"
                                                        class="form-control"
                                                        min="1"
                                                        placeholder="Qty">

                                                </div>


                                                <div class="col-md-5">

                                                    <label class="form-label fw-semibold">
                                                        Item Description
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="item_description[]"
                                                        class="form-control"
                                                        placeholder="Item details">

                                                </div>


                                                <div class="col-md-1 d-flex align-items-end">

                                                    <button
                                                        type="button"
                                                        class="btn btn-outline-danger remove-item w-100">

                                                        <i class="bi bi-trash"></i>

                                                    </button>

                                                </div>


                                            </div>

                                        </div>

                                    </div>


                                    <small class="text-muted">

                                        Add multiple items if the technician purchased more than one item.

                                    </small>

                                </div>


                                {{-- BILL IMAGES --}}

                                <div class="col-12">

                                    <hr>

                                    <label
                                        for="bill_images"
                                        class="form-label fw-semibold">

                                        <i class="bi bi-images me-2"></i>

                                        Bill / Purchase Images

                                        <span class="text-muted fw-normal">
                                            (Optional)
                                        </span>

                                    </label>


                                    <input
                                        type="file"
                                        name="bill_images[]"
                                        id="bill_images"
                                        class="form-control"
                                        accept="image/jpeg,image/png,image/jpg,image/webp"
                                        multiple>


                                    <small class="text-muted">

                                        You can upload multiple bill images.
                                        This is optional.

                                    </small>

                                </div>


                            </div>


                            {{-- BUTTONS --}}

                            <div class="d-flex justify-content-between mt-4">

                                <a
                                    href="{{ route('Technician.Payment') }}"
                                    class="btn btn-secondary">

                                    <i class="bi bi-arrow-left me-1"></i>

                                    Back

                                </a>


                                <button
                                    type="submit"
                                    class="btn btn-dark">

                                    <i class="bi bi-send me-2"></i>

                                    Submit Work Details

                                </button>

                            </div>


                        </form>

                    </div>

                </div>


            @endif

        </div>

    </main>


    {{-- ADD PURCHASE ITEM SCRIPT --}}

    @if (!$assignedtechnician->payment)

        <script>

            document.getElementById('addItem').addEventListener('click', function () {

                const container = document.getElementById('itemsContainer');

                const itemRow = document.createElement('div');

                itemRow.className = 'item-row border rounded-3 p-3 mb-3';

                itemRow.innerHTML = `

                    <div class="row g-3">

                        <div class="col-md-4">

                            <label class="form-label fw-semibold">
                                Item Name
                            </label>

                            <input
                                type="text"
                                name="item_name[]"
                                class="form-control"
                                placeholder="Example: Water Pipe">

                        </div>


                        <div class="col-md-2">

                            <label class="form-label fw-semibold">
                                Quantity
                            </label>

                            <input
                                type="number"
                                name="quantity[]"
                                class="form-control"
                                min="1"
                                placeholder="Qty">

                        </div>


                        <div class="col-md-5">

                            <label class="form-label fw-semibold">
                                Item Description
                            </label>

                            <input
                                type="text"
                                name="item_description[]"
                                class="form-control"
                                placeholder="Item details">

                        </div>


                        <div class="col-md-1 d-flex align-items-end">

                            <button
                                type="button"
                                class="btn btn-outline-danger remove-item w-100">

                                <i class="bi bi-trash"></i>

                            </button>

                        </div>

                    </div>

                `;

                container.appendChild(itemRow);

            });


            document.addEventListener('click', function (event) {

                const button = event.target.closest('.remove-item');

                if (!button) {
                    return;
                }

                const rows = document.querySelectorAll('.item-row');

                if (rows.length > 1) {

                    button.closest('.item-row').remove();

                }

            });

        </script>

    @endif

@endsection