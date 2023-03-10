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
                <x-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('register') }}" class="mt-2">
                    @csrf
                    <x-registerForm />

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> Join Now
                        </button>
                    </div>

                </form>


                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-black-50">Already have account? <a href="{{ route('login') }}"
                                class="text-black ml-1"><b>Sign
                                    In</b></a></p>
                    </div> <!-- end col -->
                </div>
            </div>





        </div> <!-- end card-body -->
    </div>
    <!-- end card -->
    </div>

    <!-- end row -->
@endsection
