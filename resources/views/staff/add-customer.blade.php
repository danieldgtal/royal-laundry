@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        @php
            $url = url()->current();
            $page = Str::ucfirst(parse_url($url, PHP_URL_PATH));
            
        @endphp
        <x-dashboard.dashboard-header url="{{ $page }}" />
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success"><strong> {{ session('success') }} </strong></div>
                @endif
                <div class="card-box mx-md-5 pl-md-5">
                    <x-validation-errors class="mb-4" />
                    <h4 class="header-title mb-4">Create New Customer Account</h4>
                    <p>create a new account for customers by filling their details below to help them setup account quickly
                        and easily.</p>
                    <form action="{{ route('staff.new-customer') }}" method="post">
                        @csrf
                        <x-registerForm>

                        </x-registerForm>
                        <div class="form-group text-center">
                            <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> Create New
                                Customer
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
