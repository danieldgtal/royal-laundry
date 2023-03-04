@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        @php
            $url = url()->current();
            $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
        @endphp
        <x-dashboard.dashboard-header url="{{ $page }}" />
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <h4 class="header-title mb-4">User Profile</h4>
                    <form method="POST">
                        <div class="row">

                            <div class="col-xl-6">

                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">FirstName</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">LastName</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect2">Address</label>
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                </div>



                            </div><!-- end col -->

                            <div class="col-xl-6">

                                <fieldset>
                                    <div class="form-group">
                                        <label for="disabledTextInput">Email</label>
                                        <input type="text" id="disabledTextInput" class="form-control"
                                            placeholder="Disabled input">
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect2">City</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect2">State</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <button type="button" class="btn btn-primary waves-effect waves-light width-lg">Update
                                        Profile</button>
                                </fieldset>



                            </div><!-- end col -->

                        </div><!-- end row -->
                    </form>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
