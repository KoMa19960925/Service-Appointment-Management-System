@extends('layouts.Adminapp')

@section('content')


    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">Customer Feedback</h2>
            </div>


            @if (session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif


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
                                    <th>Date</th>
                                    <th>Rating</th>
                                    <th>Feedback</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($feedbacks as $feedback)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $feedback->customer->name }}</strong></td>
                                        <td>{{ $feedback->serviceRequest->service_name }}</td>
                                        <td>{{ $feedback->technician->name }}</td>
                                        <td>{{ $feedback->created_at->format('Y-m-d') }}</td>


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
                                                <span class="badge bg-warning text-dark">Averag</span>
                                            @elseif($feedback->rating == 1)
                                                <span class="badge bg-danger">Poor</span>
                                            @else
                                                <span class="badge bg-secondary">Not Rated</span>
                                            @endif
                                        </td>

                                        <td>{{ $feedback->comment }}</td>

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <h5 class="text-muted mt-3">No customer feedback yet</h5>
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
