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

<body class="sams sams-customer">


<div class="customer-layout">
    <nav class="portal-sidebar portal-sidebar--customer" aria-label="Customer navigation">


        <div class="sidebar-logo">
            <div class="logo-icon" aria-hidden="true">
                <i class="bi bi-tools"></i>
            </div>

            <span>
                SAMS
            </span>
        </div>





        <ul class="nav nav-pills flex-column sidebar-menu">
            <li class="nav-item">
                <a
                    href="{{ route('Customer.dashboard') }}"
                    class="nav-link
                    {{ request()->routeIs('Customer.dashboard') ? 'active' : '' }}" @if (request()->routeIs('Customer.dashboard')) aria-current="page" @endif>

                    <i class="bi bi-speedometer2"></i>

                    <span>
                        Dashboard
                    </span>
                </a>
            </li>



       

            <li class="nav-item">
                <a
                    href="{{ route('Customer.services') }}"
                    class="nav-link
                    {{ request()->routeIs('Customer.services') ? 'active' : '' }}" @if (request()->routeIs('Customer.services')) aria-current="page" @endif>

                    <i class="bi bi-wrench-adjustable"></i>
                    <span>
                        Services
                    </span>
                </a>
            </li>



     

            <li class="nav-item">
                <a
                    href="{{ route('Customer.requests') }}"
                    class="nav-link
                    {{ request()->routeIs('Customer.requests') ? 'active' : '' }}" @if (request()->routeIs('Customer.requests')) aria-current="page" @endif>
                    <i class="bi bi-clipboard-check"></i>
                    <span>
                        My Requests
                    </span>
                </a>
            </li>



            <li class="nav-item">
                <a
                    href="{{ route('Customer.Technicianassigned') }}"
                    class="nav-link
                    {{ request()->routeIs('Customer.Technicianassigned') ? 'active' : '' }}" @if (request()->routeIs('Customer.Technicianassigned')) aria-current="page" @endif>

                    <i class="bi bi-calendar-check"></i>
                    <span>
                        Assigned Technician
                    </span>
                </a>
            </li>



            <li class="nav-item">
                <a
                    href="{{ route('Customer.Servicehistory') }}"
                    class="nav-link
                    {{ request()->routeIs('Customer.Servicehistory') ? 'active' : '' }}" @if (request()->routeIs('Customer.Servicehistory')) aria-current="page" @endif>

                    <i class="bi bi-clock-history"></i>
                    <span>
                        Service History
                    </span>
                </a>
            </li>



            <li class="nav-item">
                <a
                    href="{{ route('Customer.feedback') }}"
                    class="nav-link
                    {{ request()->routeIs('Customer.feedback') ? 'active' : '' }}" @if (request()->routeIs('Customer.feedback')) aria-current="page" @endif>
                    <i class="bi bi-star"></i>
                    <span>
                        Customer Feedback
                    </span>
                </a>
            </li>

        </ul>




    </nav>



  

    <div class="customer-right">

        <x-portal-topbar role="Customer" />


        <main class="customer-content">
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



{{-- PRINT SCRIPT --}}

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



<script>

const serviceSelect =
    document.getElementById('serviceSelect');


if (serviceSelect) {

    serviceSelect.addEventListener(
        'change',
        function () {


            const selectedOption =
                this.options[this.selectedIndex];


            const technicianSelect =
                document.getElementById(
                    'technicianSelect'
                );


            if (!technicianSelect) {

                return;

            }


            technicianSelect.innerHTML = '';


            if (!selectedOption.value) {

                technicianSelect.innerHTML =
                    '<option value="">Select Service First</option>';

                return;

            }


            const technicianId =
                selectedOption.dataset.technicianId;


            const technicianName =
                selectedOption.dataset.technicianName;


            const option =
                document.createElement('option');


            option.value =
                technicianId;


            option.textContent =
                technicianName;


            option.selected = true;


            technicianSelect.appendChild(option);

        }
    );

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



.customer-layout {

    display: flex;

    width: 100%;

    min-height: 100vh;

}



.customer-right {

    margin-left: 250px;

    width: calc(100% - 250px);

    min-height: 100vh;

}



.customer-content {

    width: 100%;

    min-height:
        calc(100vh - 72px);

    background: var(--sams-surface);

}




@media (max-width: 992px) {

    .customer-right {

        margin-left: 220px;

        width:
            calc(100% - 220px);

    }


}


@media (max-width: 768px) {

    .customer-right {

        margin-left: 70px;

        width:
            calc(100% - 70px);

    }


}



</style>



</body>
</html>