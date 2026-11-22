@extends('layouts.Adminapp')

@section('content')

<main class="flex-grow-1 p-4 bg-light">

    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="mb-4">

            <h2 class="fw-bold">
                Technician Payments
            </h2>

            <p class="text-muted">
                Review technician work details and process payments.
            </p>

        </div>


        {{-- Success Message --}}
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


        {{-- Error Message --}}
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


        {{-- Payment Table --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-dark">

                            <tr>

                                <th>No</th>

                                <th>Customer</th>

                                <th>Service</th>

                                <th>Technician</th>

                                <th>Work Status</th>

                                <th>Payment Status</th>

                                <th>Amount</th>

                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($payments as $payment)

                                <tr>

                                    {{-- # --}}
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- Customer --}}
                                    <td>

                                        @if ($payment->serviceRequest)

                                            <strong>
                                                {{ $payment->serviceRequest->name }}
                                            </strong>

                                        @else

                                            <span class="text-muted">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Service --}}
                                    <td>

                                        @if ($payment->serviceRequest)

                                            {{ $payment->serviceRequest->service_name }}

                                        @else

                                            <span class="text-muted">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Technician --}}
                                    <td>

                                        @if ($payment->technician)

                                            <strong>
                                                {{ $payment->technician->name }}
                                            </strong>

                                        @else

                                            <span class="text-muted">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Work Status --}}
                                    <td>

                                        @if ($payment->payment_status === 'Paid')

                                            <span class="badge bg-success">

                                                <i class="bi bi-check-circle me-1"></i>

                                                Completed

                                            </span>

                                        @else

                                            <span class="badge bg-warning text-dark">

                                                <i class="bi bi-hourglass-split me-1"></i>

                                                Payment Pending

                                            </span>

                                        @endif

                                    </td>


                                    {{-- Payment Status --}}
                                    <td>

                                        @if ($payment->payment_status === 'Paid')

                                            <span class="badge bg-success">

                                                <i class="bi bi-check-circle me-1"></i>

                                                Paid

                                            </span>

                                        @else

                                            <span class="badge bg-warning text-dark">

                                                <i class="bi bi-hourglass-split me-1"></i>

                                                Pending

                                            </span>

                                        @endif

                                    </td>


                                    {{-- Amount --}}
                                    <td>

                                        @if ($payment->payment_status === 'Paid')

                                            <strong class="text-success">

                                                Rs.
                                                {{ number_format($payment->amount, 2) }}

                                            </strong>

                                        @else

                                            <span class="text-muted">

                                                Not Paid

                                            </span>

                                        @endif

                                    </td>


                                    {{-- Action --}}
                                    <td>

                                        <a
                                            href="{{ route('Admin.ViewTechnicianPayment', $payment->id) }}"
                                            class="btn btn-primary btn-sm">

                                            <i class="bi bi-eye me-1"></i>

                                            View Details

                                        </a>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="8"
                                        class="text-center py-5">

                                        <div class="text-muted">

                                            <i
                                                class="bi bi-wallet2"
                                                style="font-size: 45px;">
                                            </i>

                                            <h5 class="mt-3">

                                                No technician payment requests found.

                                            </h5>

                                            <p class="mb-0">

                                                Technician work details submitted for payment will appear here.

                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</main>

@endsection