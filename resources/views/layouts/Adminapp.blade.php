<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Service & Appointment Management System
    </title>



    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">



    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('portal-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('sams.css') }}">
</head>


<body class="sams sams-admin">


<div class="admin-layout">
    <nav class="portal-sidebar portal-sidebar--admin" aria-label="Admin navigation">


        <div class="sidebar-logo">
            <div class="logo-icon" aria-hidden="true">
                <i class="bi bi-tools"></i>

            </div>
            <span>SAMS</span>
        </div>



        <ul class="nav nav-pills flex-column sidebar-menu">
            <li class="nav-item">

                <a
                    href="{{ route('Admin.dashboard') }}"
                    class="nav-link
                    {{ request()->routeIs('Admin.dashboard') ? 'active' : '' }}" @if (request()->routeIs('Admin.dashboard')) aria-current="page" @endif>
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>

                </a>
            </li>




            <li class="nav-item">
                <a
                    href="{{ route('Admin.services.index') }}"
                    class="nav-link {{ request()->routeIs('Admin.services.*') ? 'active' : '' }}" @if (request()->routeIs('Admin.services.*')) aria-current="page" @endif>
                    <i class="bi bi-tools" aria-hidden="true"></i>
                    <span>Services</span>
                </a>
            </li>

            <li class="nav-item">
                <a
                    href="{{ route('Admin.Techniciandetails') }}"
                    class="nav-link
                    {{ request()->routeIs('Admin.Techniciandetails') ? 'active' : '' }}" @if (request()->routeIs('Admin.Techniciandetails')) aria-current="page" @endif>

                    <i class="bi bi-person-lines-fill"></i>
                    <span>
                        All Technician Details
                    </span>
                </a>
            </li>




            <li class="nav-item">
                <a
                    href="{{ route('Admin.Customerservicerequests') }}"
                    class="nav-link
                    {{ request()->routeIs('Admin.Customerservicerequests') ? 'active' : '' }}" @if (request()->routeIs('Admin.Customerservicerequests')) aria-current="page" @endif>

                    <i class="bi bi-clipboard-check"></i>
                    <span> Customer Requests</span>
                </a>
            </li>



   
            <li class="nav-item">
                <a
                    href="{{ route('Admin.TechnicianAssigned') }}"
                    class="nav-link
                    {{ request()->routeIs('Admin.TechnicianAssigned') ? 'active' : '' }}" @if (request()->routeIs('Admin.TechnicianAssigned')) aria-current="page" @endif>

                    <i class="bi bi-calendar-check"></i>
                    <span> Technician Assigned</span>
                </a>
            </li>



      

            <li class="nav-item">
                <a
                    href="{{ route('Admin.TechnicianPayment') }}"
                    class="nav-link
                    {{ request()->routeIs('Admin.TechnicianPayment') ? 'active' : '' }}" @if (request()->routeIs('Admin.TechnicianPayment')) aria-current="page" @endif>
                    <i class="bi bi-cash-coin"></i>
                    <span>
                        Technician Payments
                    </span>
                </a>
            </li>




            <li class="nav-item">
                <a
                    href="{{ route('Admin.Servicehistory') }}"
                    class="nav-link
                    {{ request()->routeIs('Admin.Servicehistory') ? 'active' : '' }}" @if (request()->routeIs('Admin.Servicehistory')) aria-current="page" @endif>

                    <i class="bi bi-clock-history"></i>
                    <span>
                        All Service History
                    </span>
                </a>
            </li>




            <li class="nav-item">
                <a
                    href="{{ route('Admin.Customerfeedback') }}"
                    class="nav-link
                    {{ request()->routeIs('Admin.Customerfeedback') ? 'active' : '' }}" @if (request()->routeIs('Admin.Customerfeedback')) aria-current="page" @endif>
                    <i class="bi bi-star"></i>
                    <span>Customer Feedback</span>
                </a>
            </li>



      

            <li class="nav-item">
                <a
                    href="{{ route('Admin.homeedit') }}"
                    class="nav-link
                    {{ request()->routeIs('Admin.homeedit') ? 'active' : '' }}" @if (request()->routeIs('Admin.homeedit')) aria-current="page" @endif>

                    <i class="bi bi-house"></i>
                    <span>Home</span>
                </a>
            </li>


        </ul>


    </nav>



    <div class="admin-right">
        <x-portal-topbar role="Admin" />




        <main class="admin-content">
            @yield('content')
        </main>
        @include('components.footer')

    </div>

</div>




<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
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
function printServiceHistory()
{
    window.print();
}
</script>



<script>
function togglePassword(inputId, iconId)
{

    const input =
        document.getElementById(inputId);

    const icon =
        document.getElementById(iconId);


    if (input.type === "password") {

        input.type = "text";

        icon.classList.remove("bi-eye");

        icon.classList.add("bi-eye-slash");

    }

    else {

        input.type = "password";

        icon.classList.remove("bi-eye-slash");

        icon.classList.add("bi-eye");

    }

}
</script>




<style>

body {

    margin: 0;

    padding: 0;

    background: var(--sams-surface);

    font-family:
        Arial,
        Helvetica,
        sans-serif;

}



.admin-layout {

    display: flex;

    width: 100%;

    min-height: 100vh;

}




.admin-right {

    margin-left: 250px;

    width: calc(100% - 250px);

    min-height: 100vh;

}




.admin-content {

    width: 100%;

    min-height:
        calc(100vh - 72px);

    background: var(--sams-surface);

}




@media (max-width: 992px) {

    .admin-right {

        margin-left: 220px;

        width:
            calc(100% - 220px);

    }


}


@media (max-width: 768px) {

    .admin-right {

        margin-left: 70px;

        width:
            calc(100% - 70px);

    }


}



</style>



</body>

</html>
