@extends('layouts.guest')

@section('content')
    <div class="account-card-box">
        <div class="card mb-0">
            <div class="card-body p-4">

                <div class="text-center">
                    <div class="my-3">
                        <a href="{{ route('home.index') }}">
                            <span><img src="{{ asset('dashboard/assets/images/logo.png') }}" alt="" height="28"
                                    class="mx-auto"></span>
                        </a>
                    </div>
                    <h5 class="text-muted text-uppercase py-3 font-16">Sign up</h5>
                </div>

                <form action="#" class="mt-2">
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-xl-6">
                                <label for="exampleInputEmail1">First Name</label>
                                <input class="form-control" type="text" required="" placeholder="Enter your username">
                            </div>
                            <div class="col-xl-6"> <label for="exampleInputEmail1">Last Name</label>
                                <input class="form-control" type="text" required="" placeholder="Enter your username">
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        <small class="text-muted">We'll never share your email with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" type="text" required="" placeholder="Enter your username">
                        <input class="form-control" type="number" required="" placeholder="Enter your username">

                    </div>


                    <div class="form-group mb-3">
                        <input class="form-control" type="text" required="" placeholder="Enter your username">
                    </div>

                    <div class="form-group mb-3">
                        <input class="form-control" type="password" required="" id="password"
                            placeholder="Enter your password">
                    </div>

                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signup" checked>
                            <label class="custom-control-label" for="checkbox-signup">I accept <a href="#">Terms and
                                    Conditions</a></label>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> Join Now
                        </button>
                    </div>

                </form>



            </div> <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-white-50">Already have account? <a href="{{ route('login') }}" class="text-white ml-1"><b>Sign
                        In</b></a></p>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
