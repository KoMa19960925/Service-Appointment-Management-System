@extends('layouts.Technicianapp')

@section('content')


    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">
                    Customer Feedback
                </h2>
                <p class="text-muted">
                    View feedback submitted by customers for your completed services.
                </p>
            </div>


            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif




            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif



            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-1"></h5>
                    </div>

                    <span class="badge bg-primary"> 
                        {{ $feedbacks->count() }}
                        {{ $feedbacks->count() == 1 ? 'Feedback' : 'Feedbacks' }}
                    </span>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Rating</th>
                                <th>Feedback</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <strong>
                                                {{ $feedback->customer->name ?? 'Unknown Customer' }}
                                            </strong>
                                        </div>
                                    </td>


                                    <td>
                                        {{ $feedback->serviceRequest->service_name ?? 'N/A' }}
                                    </td>


                                    <td>
                                        @if ($feedback->created_at)
                                            {{ $feedback->created_at->format('Y-m-d') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>


                                    <td>
                                        <div class="mb-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $feedback->rating)
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @else
                                                    <i class="bi bi-star text-muted"></i>
                                                @endif
                                            @endfor
                                        </div>


                                        @if ($feedback->rating == 5)
                                            <span class="badge bg-success">Excellent</span>
                                        @elseif($feedback->rating == 4)
                                            <span class="badge bg-primary">Very Good</span>
                                        @elseif($feedback->rating == 3)
                                            <span class="badge bg-info text-dark">Good</span>
                                        @elseif($feedback->rating == 2)
                                            <span class="badge bg-warning text-dark">Average</span>
                                        @elseif($feedback->rating == 1)
                                            <span class="badge bg-danger">Poor </span>
                                        @else
                                            <span class="badge bg-secondary">Not Rated</span>
                                        @endif
                                    </td>


                                    <td>
                                        @if ($feedback->comment)
                                            <div style="max-width: 350px;">
                                                {{ $feedback->comment }}
                                            </div>
                                        @else
                                            <span class="text-muted">
                                                No comment
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <h5 class="text-muted mt-3">
                                            No Customer Feedback Yet
                                        </h5>
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
