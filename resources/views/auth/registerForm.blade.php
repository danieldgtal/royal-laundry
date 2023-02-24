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
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-xl-6">
                                <label for="exampleInputEmail1">First Name</label>
                                <input class="form-control" type="text" required="" name="firstname"
                                    value="{{ old('firstname') }}" placeholder="Enter your firstname">
                            </div>
                            <div class="col-xl-6"> <label for="exampleInputEmail1">Last Name</label>
                                <input class="form-control" type="text" required="" name="lastname"
                                    placeholder="Enter your lastname" value="{{ old('lastname') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter email" required>
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-xl-6">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" placeholder="Enter your phone number" data-mask="(999) 999-9999"
                                    class="form-control" autocomplete="off" maxlength="14" name="phone"
                                    value="{{ old('phone') }}" required>
                            </div>
                            <div class="col-xl-6">
                                <label for="dateOfBirth">Date Of Birth</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="dob" value="{{ old('dob') }}"
                                        placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control">
                            <option value="">Select gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>

                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address_line_1">Address </label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                            placeholder="Enter your address"
                            class="form-control @error('address_line_1') is-invalid @enderror">
                        @error('address_line_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address_line_1">City </label>
                        <input type="text" id="city" name="city" value="{{ old('city') }}"
                            placeholder="Enter your city" class="form-control @error('city') is-invalid @enderror">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="state">State </label>
                        <input type="text" id="state" name="state" value="{{ old('state') }}"
                            placeholder="Enter your State" class="form-control @error('state') is-invalid @enderror">
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-xl-6">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter your password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Confirm your password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signup" required>
                                <label class="custom-control-label" for="checkbox-signup">I accept <a
                                        href="#">Terms
                                        and
                                        Conditions</a></label>
                            </div>
                        </div>
                    @endif

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
