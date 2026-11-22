@extends('layouts.Customerapp')
@section('content')



    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">Feedback</h2>
                <p class="text-muted">Share your experience about our completed services.</p>
            </div>



            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <strong>Success!</strong>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif



            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    <strong>Error!</strong>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif



            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">

                            <h5 class="fw-bold mb-4">
                                Submit Your Feedback
                            </h5>

                            <form action="{{ route('Customer.feedback.store') }}"method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Select Service
                                    </label>

                                    <select class="form-select" name="assigned_technician_id" id="serviceSelect" required>
                                        <option value="">
                                            Select a completed service
                                        </option>


                                        @foreach ($completedServices as $service)
                                            <option value="{{ $service->id }}"
                                                data-technician-id="{{ $service->technician->id }}"
                                                data-technician-name="{{ $service->technician->name }}">
                                                {{ $service->serviceRequest->service_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Technician Name
                                    </label>

                                    <select class="form-select" name="technician_id" id="technicianSelect" required>
                                        <option value="">
                                            Select Service First
                                        </option>
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Rating
                                    </label>


                                    <select class="form-select" name="rating" required>

                                        <option value="">Select Rating</option>
                                        <option value="5">Excellent</option>
                                        <option value="4">Very Good</option>
                                        <option value="3">Good</option>
                                        <option value="2">Average</option>
                                        <option value="1">Poor</option>
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Your Feedback
                                    </label>

                                    <textarea name="comment" class="form-control" rows="5" placeholder="Write your feedback here..." required></textarea>
                                </div>



                                <button type="submit" class="btn btn-dark">
                                    <i class="bi bi-send me-2"></i>
                                    Submit Feedback
                                </button>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <i class="bi bi-star-fill text-warning" style="font-size: 60px;">
                                </i>
                                <h5 class="fw-bold mt-3">
                                    Your Feedback Matters
                                </h5>

                                <p class="text-muted">
                                    Your feedback helps us improve our
                                    service quality and customer experience.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection
