<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMS - Service & Appointment Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">




    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container">

            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">

                <span class="bg-white text-dark rounded-2 d-flex align-items-center justify-content-center me-2"
                    style="width: 38px; height: 38px;">
                    <i class="bi bi-tools"></i>
                </span>SAMS

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">

                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">


                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}"
                            href="{{ route('home') }}">Home
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active fw-bold' : '' }}"
                            href="{{ route('about') }}">About
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('loginpage') && request()->get('role') === 'admin' ? 'active fw-bold' : '' }}"
                            href="{{ route('loginpage', ['role' => 'admin']) }}">
                            Admin
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('loginpage') && request()->get('role') === 'technician' ? 'active fw-bold' : '' }}"
                            href="{{ route('loginpage', ['role' => 'technician']) }}">Technician
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('loginpage') && request()->get('role') === 'customer' ? 'active fw-bold' : '' }}"
                            href="{{ route('loginpage', ['role' => 'customer']) }}">Customer
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="text-white d-flex align-items-center"
        style="
        min-height: 620px;
        background:
        linear-gradient(rgba(16, 60, 73, 0.88)),
        url('https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1800&q=85')
        center/cover;">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">

                    <span class="badge bg-light text-dark px-3 py-2 mb-3">
                        <i class="bi bi-tools me-1"></i>
                        {{ $home->badge }}
                    </span>




                    <h1 class="display-3 fw-bold mb-4">
                        {{ $home->hero_title }}
                        <span class="text-white-50">
                            {{ $home->hero_subtitle }}
                        </span>
                    </h1>



                    <p class="lead text-white-50 mb-4">
                        {{ $home->hero_description }}
                    </p>



                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('loginpage') }}" class="btn btn-light btn-lg px-4">
                            <i class="bi bi-calendar-check me-2"></i>Request a Service
                        </a>



                        <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg px-4">
                            Learn More
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                    </div>
                </div>



                <div class="col-lg-5 mt-5 mt-lg-0">
                    <div class="bg-white bg-opacity-10 border border-light border-opacity-25 rounded-4 p-4">
                        <div class="row g-3">



                            <div class="col-6">
                                <div class="bg-dark bg-opacity-75 rounded-3 p-4 text-center">
                                    <i class="bi bi-person-workspace fs-1"></i>
                                    <h6 class="mt-3 mb-0">
                                        {{ $home->feature_1_title }}
                                    </h6>
                                </div>
                            </div>





                            <div class="col-6">
                                <div class="bg-dark bg-opacity-75 rounded-3 p-4 text-center">
                                    <i class="bi bi-calendar2-check fs-1"></i>
                                    <h6 class="mt-3 mb-0">
                                        {{ $home->feature_2_title }}
                                    </h6>
                                </div>
                            </div>




                            <div class="col-6">
                                <div class="bg-dark bg-opacity-75 rounded-3 p-4 text-center">
                                    <i class="bi bi-clipboard-check fs-1"></i>
                                    <h6 class="mt-3 mb-0">
                                        {{ $home->feature_3_title }}
                                    </h6>
                                </div>
                            </div>




                            <div class="col-6">
                                <div class="bg-dark bg-opacity-75 rounded-3 p-4 text-center">
                                    <i class="bi bi-star-fill fs-1"></i>
                                    <h6 class="mt-3 mb-0">
                                        {{ $home->feature_4_title }}
                                    </h6>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="py-5 bg-light">
        <div class="container">



            <div class="text-center mb-5">
                <span class="text-secondary fw-semibold">
                    HOW IT WORKS
                </span>


                <h2 class="fw-bold mt-2">
                    {{ $home->process_title }}
                </h2>
            </div>



            <div class="row g-4">
                <div class="col-md-3">
                    <div class="text-center">

                        <div class="bg-dark text-white rounded-circle mx-auto d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <span class="fs-4 fw-bold">1</span>
                        </div>


                        <h5 class="fw-bold mt-3">
                            {{ $home->process_1_title }}
                        </h5>


                        <p class="text-muted">
                            {{ $home->process_1_description }}
                        </p>
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="text-center">

                        <div class="bg-dark text-white rounded-circle mx-auto d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <span class="fs-4 fw-bold">2</span>
                        </div>


                        <h5 class="fw-bold mt-3">
                            {{ $home->process_2_title }}
                        </h5>


                        <p class="text-muted">
                            {{ $home->process_2_description }}
                        </p>

                    </div>
                </div>




                <div class="col-md-3">
                    <div class="text-center">

                        <div class="bg-dark text-white rounded-circle mx-auto d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <span class="fs-4 fw-bold">3
                            </span>
                        </div>


                        <h5 class="fw-bold mt-3">
                            {{ $home->process_3_title }}
                        </h5>


                        <p class="text-muted">
                            {{ $home->process_3_description }}
                        </p>

                    </div>
                </div>





                <div class="col-md-3">
                    <div class="text-center">

                        <div class="bg-dark text-white rounded-circle mx-auto d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <span class="fs-4 fw-bold">4</span>
                        </div>


                        <h5 class="fw-bold mt-3">
                            {{ $home->process_4_title }}
                        </h5>


                        <p class="text-muted">
                            {{ $home->process_4_description }}
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </section>


    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>


