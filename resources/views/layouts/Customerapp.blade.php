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

</head>

<body>


<div class="customer-layout">
    <nav class="customer-sidebar">


        <div class="sidebar-logo">
            <div class="logo-icon">
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
                    {{ request()->routeIs('Customer.dashboard') ? 'active' : '' }}">

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
                    {{ request()->routeIs('Customer.services') ? 'active' : '' }}">

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
                    {{ request()->routeIs('Customer.requests') ? 'active' : '' }}">
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
                    {{ request()->routeIs('Customer.Technicianassigned') ? 'active' : '' }}">

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
                    {{ request()->routeIs('Customer.Servicehistory') ? 'active' : '' }}">

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
                    {{ request()->routeIs('Customer.feedback') ? 'active' : '' }}">
                    <i class="bi bi-star"></i>
                    <span>
                        Customer Feedback
                    </span>
                </a>
            </li>

        </ul>




        <div class="sidebar-bottom">
            <div class="customer-profile">
                <div class="profile-icon">
                    <i class="bi bi-person"></i>
                </div>


                <div>
                    <strong>
                        {{ Auth::user()->name }}
                    </strong>

                    <small>
                        Customer
                    </small>
                </div>
            </div>



            <form
                action="{{ route('logoutpage') }}"
                method="POST">

                @csrf

                <button
                    type="submit"
                    class="logout-btn">

                    <i class="bi bi-box-arrow-right"></i>

                    Logout

                </button>
            </form>
        </div>
    </nav>



  

    <div class="customer-right">

        <header class="customer-topbar">

            <div class="top-search">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    placeholder="Tap here to search">

                <button>

                    <i class="bi bi-chevron-down"></i>

                </button>
            </div>





            <div class="topbar-right">
                <button class="top-icon">
                    <i class="bi bi-bell"></i>
                    <span class="notification-dot"></span>
                </button>


                <button class="top-icon">
                    <i class="bi bi-chat-square-text"></i>
                </button>



                <div class="top-customer-profile">
                    <div class="top-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>


                    <div class="top-customer-info">
                        <strong>
                            {{ Auth::user()->name }}
                        </strong>
                        <small>
                            Customer
                        </small>
                    </div>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
        </header>


        <main class="customer-content">
            @yield('content')
        </main>
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

    background: #f5f6f8;

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



.customer-sidebar {

    width: 250px;

    min-width: 250px;

    height: 100vh;

    position: fixed;

    left: 0;

    top: 0;

    background: #212529;

    color: white;

    display: flex;

    flex-direction: column;

    z-index: 1000;

}



.sidebar-logo {

    height: 76px;

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 0 22px;

    font-size: 22px;

    font-weight: 700;

    border-bottom:
        1px solid rgba(255,255,255,.08);

}


.logo-icon {

    width: 40px;

    height: 40px;

    background: #0d6efd;

    border-radius: 9px;

    display: flex;

    align-items: center;

    justify-content: center;

}



.sidebar-menu {

    padding: 20px 14px;

    margin: 0;

    flex: 1;

    overflow-y: auto;

}


.sidebar-menu .nav-item {

    margin-bottom: 5px;

}


.sidebar-menu .nav-link {

    color: #d9dde1;

    display: flex;

    align-items: center;

    gap: 13px;

    padding: 12px 14px;

    border-radius: 8px;

    font-size: 14px;

    transition: .2s;

}


.sidebar-menu .nav-link i {

    width: 22px;

    text-align: center;

    font-size: 18px;

}


.sidebar-menu .nav-link:hover {

    background: #343a40;

    color: white;

}


.sidebar-menu .nav-link.active {

    background: #0d6efd;

    color: white;

}



.sidebar-bottom {

    padding: 15px;

    border-top:
        1px solid rgba(255,255,255,.08);

}


.customer-profile {

    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 15px;

}


.profile-icon {

    width: 40px;

    height: 40px;

    border-radius: 50%;

    background: #343a40;

    display: flex;

    align-items: center;

    justify-content: center;

}


.customer-profile strong {

    display: block;

    font-size: 14px;

}


.customer-profile small {

    display: block;

    color: #adb5bd;

    font-size: 12px;

}


.logout-btn {

    width: 100%;

    border: none;

    background: #dc3545;

    color: white;

    border-radius: 7px;

    padding: 10px;

    font-size: 14px;

}


.logout-btn:hover {

    background: #bb2d3b;

}



.customer-right {

    margin-left: 250px;

    width: calc(100% - 250px);

    min-height: 100vh;

}



.customer-topbar {

    height: 76px;

    width: 100%;

    background: white;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 10px 28px;

    border-bottom:
        1px solid #e9ecef;

    box-shadow:
        0 2px 8px rgba(0,0,0,.04);

}


.top-search {

    width: 52%;

    max-width: 650px;

    height: 46px;

    background: #f5f6f8;

    border-radius: 25px;

    display: flex;

    align-items: center;

    overflow: hidden;

}


.top-search > i {

    margin-left: 18px;

    font-size: 18px;

    color: #495057;

}


.top-search input {

    flex: 1;

    border: none;

    outline: none;

    background: transparent;

    padding: 0 14px;

    font-size: 14px;

}


.top-search button {

    width: 55px;

    height: 100%;

    border: none;

    border-left:
        1px solid #dee2e6;

    background: transparent;

}




.topbar-right {

    display: flex;

    align-items: center;

    gap: 15px;

}


.top-icon {

    width: 40px;

    height: 40px;

    border: none;

    background: transparent;

    font-size: 20px;

    position: relative;

    color: #343a40;

}


.top-icon:hover {

    color: #0d6efd;

}


.notification-dot {

    position: absolute;

    top: 5px;

    right: 5px;

    width: 7px;

    height: 7px;

    background: #20c997;

    border-radius: 50%;

    border: 1px solid white;

}



.top-customer-profile {

    display: flex;

    align-items: center;

    gap: 10px;

    padding-left: 5px;

}


.top-avatar {

    width: 45px;

    height: 45px;

    border-radius: 50%;

    background: #dff5ee;

    color: #198754;

    display: flex;

    align-items: center;

    justify-content: center;

    font-weight: 700;

    font-size: 17px;

}


.top-customer-info {

    display: flex;

    flex-direction: column;

    line-height: 1.2;

}


.top-customer-info strong {

    font-size: 14px;

}


.top-customer-info small {

    color: #8b939b;

    font-size: 11px;

    margin-top: 3px;

}


.top-customer-profile > i {

    font-size: 13px;

    color: #6c757d;

    margin-left: 5px;

}




.customer-content {

    width: 100%;

    min-height:
        calc(100vh - 76px);

    background: #f5f6f8;

}




@media (max-width: 992px) {

    .customer-sidebar {

        width: 220px;

        min-width: 220px;

    }


    .customer-right {

        margin-left: 220px;

        width:
            calc(100% - 220px);

    }


    .top-customer-info {

        display: none;

    }

}


@media (max-width: 768px) {

    .customer-sidebar {

        width: 70px;

        min-width: 70px;

    }


    .sidebar-logo {

        justify-content: center;

        padding: 0;

    }


    .sidebar-logo span {

        display: none;

    }


    .sidebar-menu .nav-link {

        justify-content: center;

        padding: 13px;

    }


    .sidebar-menu .nav-link span {

        display: none;

    }


    .sidebar-menu .nav-link i {

        margin: 0;

    }


    .customer-profile > div:not(.profile-icon) {

        display: none;

    }


    .logout-btn {

        font-size: 0;

    }


    .logout-btn i {

        font-size: 18px;

    }


    .customer-right {

        margin-left: 70px;

        width:
            calc(100% - 70px);

    }


    .top-search {

        width: 55%;

    }

}


@media (max-width: 576px) {

    .customer-topbar {

        padding: 10px 15px;

    }


    .top-search {

        width: 60%;

    }


    .top-customer-profile {

        display: none;

    }

}

</style>


@include('components.footer')
</body>
</html>