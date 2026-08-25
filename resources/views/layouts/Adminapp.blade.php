<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service & Appointment Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-secondary">



    <div class="d-flex" style="min-height: 100vh;">
        <nav class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 250px;" data-bs-theme="dark">
            <ul class="nav nav-pills flex-column gap-2 mb-auto">

                <li class="nav-item">
                    <a href="{{ route('Admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('Admin.dashboard') ? 'active' : 'text-white' }}">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Dashboard
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('Admin.Techniciandetails') }}"
                        class="nav-link {{ request()->routeIs('Admin.Techniciandetails') ? 'active' : 'text-white' }}">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        All Technician Details
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('Admin.Customerservicerequests') }}"
                        class="nav-link {{ request()->routeIs('Admin.Customerservicerequests') ? 'active' : 'text-white' }}">
                        <i class="bi bi-clipboard-check me-2"></i>
                        Customer Requests
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('Admin.TechnicianAssigned') }}"
                        class="nav-link {{ request()->routeIs('Admin.TechnicianAssigned') ? 'active' : 'text-white' }}">
                        <i class="bi bi-calendar-check me-2"></i>
                        Technician Assigned
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('Admin.TechnicianPayment') }}"
                        class="nav-link {{ request()->routeIs('Admin.TechnicianPayment') ? 'active' : 'text-white' }}">
                        <i class="bi bi-cash-coin me-2"></i>
                        Technician Payments
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('Admin.Servicehistory') }}"
                        class="nav-link {{ request()->routeIs('Admin.Servicehistory') ? 'active' : 'text-white' }}">
                        <i class="bi bi-clock-history me-2"></i>
                        All Service History
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('Admin.Customerfeedback') }}"
                        class="nav-link {{ request()->routeIs('Admin.Customerfeedback') ? 'active' : 'text-white' }}">
                        <i class="bi bi-star me-2"></i>
                        Customer Feedback
                    </a>
                </li>

            </ul>


            <hr class="text-secondary">
            <div class="text-white mb-3">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <div>
                        <strong>{{ Auth::user()->name }}</strong>
                        <small class="d-block text-secondary">Admin</small>
                    </div>
                </div>
            </div>



            <form action="{{ route('logoutpage') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout
                </button>
            </form>
        </nav>




        <div class="container my-5">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
        </script>


        <style>
            @media print {

                body * {
                    visibility: hidden !important;
                }

                #serviceHistoryPrintArea,
                #serviceHistoryPrintArea * {
                    visibility: visible !important;
                }

                #serviceHistoryPrintArea {

                    position: absolute !important;
                    left: 0 !important;
                    top: 0 !important;
                    width: 100% !important;
                    margin: 0 !important;
                    border: 1px solid #000 !important;
                    box-shadow: none !important;

                }

                #serviceHistoryPrintArea .table {

                    width: 100% !important;
                    font-size: 9px !important;

                }


                #serviceHistoryPrintArea th,
                #serviceHistoryPrintArea td {

                    padding: 5px !important;
                    border: 1px solid #000 !important;

                }



                #serviceHistoryPrintArea tr {

                    page-break-inside: avoid !important;

                }



                @page {

                    size: landscape;
                    margin: 8mm;

                }

            }
        </style>


        <script>
            function printServiceHistory() {
                window.print();
            }
        </script>

        <script>
            function togglePassword(inputId, iconId) {
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


</body>

</html>
