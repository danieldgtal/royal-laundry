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
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.ico') }}">
    <!-- Table datatable css -->
    <link href="{{ asset('dashboard/assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('dashboard/assets/libs/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/libs/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" />
    <!-- App css -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css">
    <link href="{{ asset('dashboard/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('dashboard/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/app.min.css') }}" rel="stylesheet" type="text/css"
        id="app-stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @livewireStyles
    @livewireScripts
    <style>
        @media print {
            body {
                width: 80mm;
                margin: 0mm;
            }
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <x-dashboard.topbar />

        <!-- Leftbar -->
        <x-dashboard.leftbar />

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                @yield('content')
                <!-- end container-fluid -->

            </div>
            <!-- end content -->

            <!-- Footer Start -->
            <x-dashboard.footer />
            <!-- end Footer -->

        </div>

    </div>
    <!-- END wrapper -->


    <!-- Vendor js -->
    <script src="{{ asset('dashboard/assets/js/vendor.min.js') }}"></script>
    <!-- plugins -->
    <script src="{{ asset('dashboard/assets/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }} "></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }} "></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap-daterangepicker/daterangepicker.js') }} "></script>
    <script src="{{ asset('dashboard/assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    <!-- Init js-->
    <script src="{{ asset('dashboard/assets/js/pages/form-pickers.init.js') }}"></script>
    <!--Morris Chart-->
    <script src="{{ asset('dashboard/assets/libs/morris-js/morris.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/raphael/raphael.min.js') }}"></script>
    <!-- Dashboard init js-->
    <script src="{{ asset('dashboard/assets/js/pages/dashboard.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('dashboard/assets/js/app.min.js') }}"></script>
    <!-- Sweet alert init js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>
