<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Service & Appointment Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

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

        <div class="container my-5">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>


<style>

    @media print {

        /* Hide everything */
        body * {
            visibility: hidden !important;
        }


        /* Show only service history card */
        #serviceHistoryPrintArea,
        #serviceHistoryPrintArea * {
            visibility: visible !important;
        }


        /* Move printed card to top */
        #serviceHistoryPrintArea {

            position: absolute !important;

            left: 0 !important;

            top: 0 !important;

            width: 100% !important;

            margin: 0 !important;

            border: 1px solid #000 !important;

            box-shadow: none !important;

        }


        /* Table */
        #serviceHistoryPrintArea .table {

            width: 100% !important;

            font-size: 9px !important;

        }


        #serviceHistoryPrintArea th,
        #serviceHistoryPrintArea td {

            padding: 5px !important;

            border: 1px solid #000 !important;

        }


        /* Keep table rows together */
        #serviceHistoryPrintArea tr {

            page-break-inside: avoid !important;

        }


        /* Landscape */
        @page {

            size: landscape;

            margin: 8mm;

        }

    }

</style>


<script>

function printServiceHistory()
{
    window.print();
}

</script>

<script>

function togglePassword(inputId, iconId)
{
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === "password") {

        input.type = "text";

        icon.classList.remove("bi-eye");

        icon.classList.add("bi-eye-slash");

    } else {

        input.type = "password";

        icon.classList.remove("bi-eye-slash");

        icon.classList.add("bi-eye");

    }
}

</script>

@include('components.footer')
    </body>
</html>