<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Royal Choice Laundry') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/css/favicon.png') }}">

    <!-- App css -->
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="{{ asset('dashboard/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('dashboard/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet"
        type="text/css" />
    <script src="{{ mix('/js/app.js') }}"></script>
</head>

<body class="authentication-bg">

    <div class="account-pages pt-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="account-card-box">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- plugins -->
    <script src="{{ asset('dashboard/assets/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>

    <!-- Init js-->
    <script src="{{ asset('dashboard/assets/js/pages/form-pickers.init.js') }}"></script>
</body>

</html>
