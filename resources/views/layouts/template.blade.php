<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sultan Farm</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/nav.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/sultan.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/sultan.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

</head>

<body>
    <div id="app">
        @include('layouts.header')
        @include ('layouts.sidebar')
        <div id="main" style="background-color: #E7E9E9">
            <header class="" style="background-color: #E7E9E9">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')
            {{-- @include ('layouts.footer') --}}
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
    <script src="assets/extensions/toastify-js/src/toastify.js"></script>
    <script src="assets/js/pages/toastify.js"></script>
</body>

</html>
