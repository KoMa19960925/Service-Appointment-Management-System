<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SAMS - Service & Appointment Management System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">

    <div class="container">

        <a
            class="navbar-brand fw-bold d-flex align-items-center"
            href="{{ route('home') }}">

            <span
                class="bg-white text-dark rounded-2 d-flex align-items-center justify-content-center me-2"
                style="width: 38px; height: 38px;">

                <i class="bi bi-tools"></i>

            </span>

            SAMS

        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div
            class="collapse navbar-collapse"
            id="mainNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}"
                        href="{{ route('home') }}">

                        Home

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('about') ? 'active fw-bold' : '' }}"
                        href="{{ route('about') }}">

                        About

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('loginpage') && request()->get('role') === 'admin' ? 'active fw-bold' : '' }}"
                        href="{{ route('loginpage', ['role' => 'admin']) }}">

                        Admin

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('loginpage') && request()->get('role') === 'technician' ? 'active fw-bold' : '' }}"
                        href="{{ route('loginpage', ['role' => 'technician']) }}">

                        Technician

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('loginpage') && request()->get('role') === 'customer' ? 'active fw-bold' : '' }}"
                        href="{{ route('loginpage', ['role' => 'customer']) }}">

                        Customer

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>


    <section class="py-5 bg-white">

        <div class="container">

            <div class="text-center mb-5">

                <span class="text-secondary fw-semibold">
                    OUR FEATURES
                </span>

                <h2 class="fw-bold mt-2">
                    Everything You Need
                </h2>

                <p class="text-muted mx-auto"
                    style="max-width: 650px;">

                    SAMS provides a simple and organized way
                    to manage service requests and appointments.

                </p>

            </div>


            <div class="row g-4">

                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-clipboard-plus fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Service Requests
                            </h5>

                            <p class="text-muted mb-0">

                                Customers can submit service
                                requests with required service
                                details and preferred schedules.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-person-workspace fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Technician Assignment
                            </h5>

                            <p class="text-muted mb-0">

                                Administrators can assign suitable
                                technicians to customer service requests.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-calendar-check fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Appointment Management
                            </h5>

                            <p class="text-muted mb-0">

                                Manage assigned service dates,
                                times and service schedules efficiently.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-camera fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Work Proof
                            </h5>

                            <p class="text-muted mb-0">

                                Technicians can upload work proof
                                images after completing assigned services.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-credit-card fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Technician Payments
                            </h5>

                            <p class="text-muted mb-0">

                                Administrators can record technician
                                payments for completed services.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div
                                class="bg-dark text-white rounded-3 d-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">

                                <i class="bi bi-chat-square-text fs-3"></i>

                            </div>

                            <h5 class="fw-bold">
                                Customer Feedback
                            </h5>

                            <p class="text-muted mb-0">

                                Customers can rate completed services
                                and provide valuable feedback.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@include('components.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>