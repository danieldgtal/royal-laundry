@extends('layouts.app')

@section('content')
    <style>
        .div-hover:hover {
            background-color: #d3d3d3
        }

        .circle-button {
            display: inline-block;
            padding: 8px 14px;
            background-color: lightgray;
            border: 1.5px solid gray;
            border-radius: 50%;
            color: black;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            transition: all 0.2s ease-in-out;
        }

        .circle-button:hover {
            background-color: gray;
            color: white;
        }


        @media (max-width: 768px) {
            .circle-button {
                padding: 5px 10px;
                font-size: 10px;
                margin-bottom: 10px;
            }
        }
    </style>
    <div class="container-fluid">

        <!-- start page title -->
        @php
            $url = url()->current();
            $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
        @endphp
        <x-dashboard.dashboard-header url="{{ $page }}" />
        <!-- row -->

        <livewire:user-cart />
    </div>
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
