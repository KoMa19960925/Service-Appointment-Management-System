@extends('layouts.app')

@section('content')

<div class="d-flex" style="min-height: 100vh">

    <nav class="d-flex flex-column flex-shrink-0 p-3 bg-dark"
         style="width: 260px">
        <ul class="nav nav-pills flex-column gap-2 mb-auto">

 
            <li class="nav-item">
                <a href="{{ route('Customer.dashboard') }}"
                   class="nav-link {{ request()->routeIs('Customer.dashboard') ? 'active' : 'text-white' }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>

      
            <li class="nav-item">
                <a href="{{ route('Customer.services') }}"
                   class="nav-link {{ request()->routeIs('Customer.services') ? 'active' : 'text-white' }}">
                    <i class="bi bi-wrench-adjustable me-2"></i>
                    Services
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('Customer.requests') }}"
                   class="nav-link {{ request()->routeIs('Customer.requests') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clipboard-check me-2"></i>
                    My Requests
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('Customer.Technicianassigned') }}"
                   class="nav-link {{ request()->routeIs('Customer.Technicianassigned') ? 'active' : 'text-white' }}">
                    <i class="bi bi-calendar-check me-2"></i>
                  Assigned Technician
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('Customer.Servicehistory') }}"
                   class="nav-link {{ request()->routeIs('Customer.Servicehistory') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clock-history me-2"></i>
                    Service History
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('Customer.feedback') }}"
                   class="nav-link {{ request()->routeIs('Customer.feedback') ? 'active' : 'text-white' }}">
                    <i class="bi bi-star me-2"></i>
                    Feedback
                </a>
            </li>

        </ul>

        <hr class="text-white">


        <div class="text-white mb-3">
            <div class="d-flex align-items-center">
                <i class="bi bi-person-circle fs-4 me-2"></i>
                <div>
                    <strong>
                        {{ Auth::user()->name }}
                    </strong>

                    <small class="d-block text-secondary">
                        Customer
                    </small>
                </div>
            </div>
        </div>


        <form action="{{ route('logoutpage') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </form>
    </nav>



    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
    
            <div class="mb-4">
                <h2 class="fw-bold">
                    Feedback
                </h2>

                <p class="text-muted">
                    Share your experience about our completed services.
                </p>

            </div>


   
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">
                                Submit Your Feedback
                            </h5>

                            <form action="#" method="POST">
                                @csrf

                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Select Service
                                    </label>

                                    <select class="form-select" name="service">

                                        <option value="">
                                            Select a completed service
                                        </option>

                                        <option value="Electrical Service">
                                            Electrical Service
                                        </option>

                                        <option value="Computer Service">
                                            Computer Service
                                        </option>

                                        <option value="Plumbing Service">
                                            Plumbing Service
                                        </option>

                                    </select>

                                </div>


                          
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Rating
                                    </label>

                                    <select class="form-select" name="rating">

                                        <option value="">
                                            Select Rating
                                        </option>

                                        <option value="5">
                                         Excellent
                                        </option>

                                        <option value="4">
                                            Very Good
                                        </option>

                                        <option value="3">
                                          Good
                                        </option>

                                        <option value="1">
                                           Poor
                                        </option>

                                    </select>

                                </div>


                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Your Feedback
                                    </label>

                                    <textarea name="comment"
                                              class="form-control"
                                              rows="5"
                                              placeholder="Write your feedback here..."></textarea>

                                </div>


                                <button type="submit"
                                        class="btn btn-primary">

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

                                <i class="bi bi-star-fill text-warning"
                                   style="font-size: 60px;"></i>

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

</div>

@endsection