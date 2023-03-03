@extends('layouts.guest')

@section('content')
    <div class="account-card-box">
        <div class="card mb-0">
            <div class="card-body p-4">
                @if (session('success'))
                    <div class="alert alert-success"><strong> {{ session('success') }} </strong></div>
                @endif
                @if (session('logout-success'))
                    <div class="alert alert-success"><strong> {{ session('logout-success') }} </strong></div>
                @endif
                @error('email')
                    <span class="alert alert-danger text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="text-center">
                    <div class="my-3">
                        <a href="{{ route('home.index') }}">
                            <span><img src="{{ asset('dashboard/assets/images/logo.png') }}" class="mx-auto" alt=""
                                    height="28"></span>
                        </a>
                    </div>
                    <h5 class="text-muted text-uppercase py-3 font-16">Sign In</h5>
                </div>

                <form method="POST" action="{{ route('login') }}" class="mt-2">
                    @csrf
                    <div class="form-group mb-3">
                        <input class="form-control" name="email" type="email" value="{{ old('email') }}"
                            placeholder="Enter your email" required autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <input class="form-control" name="password" type="password" id="password"
                            placeholder="Enter your password" required>
                    </div>


                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>

                            <a href="{{ route('password.request') }}" class="text-muted float-right">Forgot
                                your
                                password <i class="mdi mdi-lock mr-1"></i> </a>
                        </div>

                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> Log In </button>
                    </div>

                    <span>Not yet a Member ? <a href="{{ route('register') }}"> Register </a> </span>

                </form>

            </div> <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
@endsection
