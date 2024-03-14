<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MyCashier</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/src/assets/images/logos/cashier.png') }}" />
    <link rel="stylesheet" href="{{ asset('/src/assets/css/styles.min.css') }}" />
</head>

<body style="background: #f3f4f6">
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('Partial.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('Partial.nav')
            <!--  Header End -->
            @yield('content')

        </div>
    </div>

    <script src="{{ asset('/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('/src/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('/src/assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://kit.fontawesome.com/c0c6839ed1.js" crossorigin="anonymous"></script>
    @include('sweetalert::alert')
</body>

</html>
