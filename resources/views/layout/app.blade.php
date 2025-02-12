<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{csrf_token ()}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <style>
        .sidebar {
            width: 250px;
            background-color: #12171e;
            transition: all 0.5s ease;
            color: #fff;
            min-height: 100vh;
        }
        .sidebar ul li {
            position: relative;
            list-style-type: none;
            height: 36px;
            width: 90%;
            margin: 0.8rem auto;
            line-height: 50px;
        }
        .sidebar ul li a:hover, .sidebar ul li button:hover {
            border-radius: 0.8rem;
            background-color: #fff;
            color: #12171e !important;
        }
        .sidebar.menu-press {
            width: 80px;
        }
        .sidebar ul li .tooltips {
            background-color: #fff;
            color: #12171e;
            position: absolute;
            left: 125px;
            top: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 0.2);
            border-radius: .6rem;
            padding: .4rem 1.2rem;
            line-height: 1.8rem;
            z-index: 20;
            opacity: 0;
            pointer-events: none;
        }
        .sidebar ul li:hover .tooltips {
            opacity: 100;
        }
    </style>
    @yield('style')
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="top d-flex align-items-center justify-content-between mt-1 ms-1">
                <div class="logo d-flex align-items-center tog">
                    <i class='bx bxl-codepen fs-2'></i>
                    <span class="fs-6 ms-1">VEHICLE REQUEST</span>
                </div>
                <div>
                    <button class="btn text-white menu-btn fs-5"><i class="bx bx-menu" id="btn" style="margin-left: 12px;"></i></button>
                </div>
            </div>
            <div class="d-flex align-items-center mt-3">
                <div class="me-3"><img src="{{url('/')}}/westrac_icon.png" alt="westrac" class="border rounded-circle" style="width: 50px; margin-left: 12px;"></div>
                <div class="tog">
                    <div class="fw-bold">Admin</div>
                </div>
            </div>
            <ul class="mt-2 d-flex flex-column" style="list-style-type: none;">
                <li>
                    <a class="text-decoration-none text-white menu-items px-3 py-2" href="{{ url('/admin') }}" style="margin-left: -15px;">
                        <i class="bx bxs-grid-alt"></i>
                        <span class="nav-item ms-2 tog">Requested Vehicles</span>
                    </a>
                    <span class="tool-tip d-none">Requested Vehicles</span>
                </li>
                <li>
                    <a class="text-decoration-none text-white menu-items px-3 py-2" href="{{ url('/calendar') }}" style="margin-left: -15px;">
                        <i class="bx bx-calendar"></i>
                        <span class="nav-item ms-2 tog">Calendar</span>
                    </a>
                    <span class="tool-tip d-none">Calendar</span>
                </li>
                <li>
                    <a class="text-decoration-none text-white menu-items px-3 py-2" href="{{ url('/supervisor') }}" style="margin-left: -15px;">
                        <i class="bx bx-user"></i>
                        <span class="nav-item ms-2 tog">Supervisors</span>
                    </a>
                    <span class="tool-tip d-none">Supervisors</span>
                </li>
                <li>
                    <a class="text-decoration-none text-white menu-items px-3 py-2" href="{{ url('/vehicle') }}" style="margin-left: -15px;">
                        <i class="bx bx-car"></i>
                        <span class="nav-item ms-2 tog">Vehicles</span>
                    </a>
                    <span class="tool-tip d-none">Vehicles</span>
                </li>
                <li>
                    <a class="text-decoration-none text-white menu-items px-3 py-2" href="{{ url('/driver') }}" style="margin-left: -15px;">
                        <i class="bx bx-body"></i>
                        <span class="nav-item ms-2 tog">Drivers</span>
                    </a>
                    <span class="tool-tip d-none">Drivers</span>
                </li>
                <li>
                    <a class="text-decoration-none text-white menu-items px-3 py-2" href="{{ url('/history') }}" style="margin-left: -15px;">
                        <i class="bx bxs-food-menu"></i>
                        <span class="nav-item ms-2 tog">History</span>
                    </a>
                    <span class="tool-tip d-none">History</span>
                </li>
                <li>
                    <a class="text-decoration-none text-white menu-items px-3 py-2" target="_blank" href="{{ url('/') }}" style="margin-left: -15px;">
                        <i class="bx bxs-book-open"></i>
                        <span class="nav-item ms-2 tog">Form</span>
                    </a>
                    <span class="tool-tip d-none">Form</span>
                </li>
                <li>
                    <form action="{{ url('/logout') }}" method="post" role="form">
                        @csrf
                        <button class="btn text-white menu-items px-3 py-2" style="margin-left: -15px;">
                            <i class="bx bx-log-out"></i>
                            <span class="nav-item ms-2 tog">Logout</span>
                        </button>
                    </form>
                    <span class="tool-tip d-none">Logout</span>
                </li>
            </ul>
        </div>
        <div class="main-content m-4" style="flex: 1;">
            @yield('content')
        </div>
    </div>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="toastAlert" class="toast colored-toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toastHead toast-header text-fixed-white">
                <img class="bd-placeholder-img rounded me-2" src="{{url('/')}}/westrac_icon.png" alt="..." style="width: 20px;">
                <strong class="me-auto toastAlertTitle text-white"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body toastAlertBody text-fixed-white"></div>
        </div>
    </div>
</body>
<script>
    let display_alert = (title, text, class_name) => {
        if (0 == class_name) {
            class_name = 'bg-danger-subtle';
            class_head = 'bg-danger';
        }
        else if (1 == class_name) {
            class_name = 'bg-success-subtle';
            class_head = 'bg-success';
        }
        else if (2 == class_name) {
            class_name = 'bg-info-subtle';
            class_head = 'bg-info';
        }
        else if (3 == class_name) {
            class_name = 'bg-warning-subtle';
            class_head = 'bg-warning';
        }

        $('#toastAlert').addClass(class_name);
        $('.toastHead').addClass(class_head);
        $('.toastAlertTitle').html(title);
        $('.toastAlertBody').html(text);

        const _toast = document.getElementById('toastAlert')
        const toast = new bootstrap.Toast(_toast);
        toast.show();
    }

    $(document)
        .on('click', '#btn', function(e) {
            $('.sidebar').toggleClass('menu-press');

            if($('.sidebar').hasClass('menu-press')) {
                $('.tog').addClass('d-none');
                $('.tool-tip').removeClass('d-none');
                $('.tool-tip').addClass('tooltips');
            } else {
                $('.tog').removeClass('d-none');
                $('.tool-tip').addClass('d-none');
                $('.tool-tip').removeClass('tooltips');
            }
        })
</script>
@yield('script')
</html>