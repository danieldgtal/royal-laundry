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
                            {{-- @foreach ($users as $user) --}}
                            <div class="col-xl-6">

                                @csrf
                                <div class="form-group">
                                    <label for="firstname">FirstName</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        value="{{ $user->firstname }}">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">LastName</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        value="{{ $user->lastname }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3">{{ $user->address }}</textarea>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-6">

                                <fieldset>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" class="form-control" name="email"
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob"
                                            value="{{ $user->dob }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="City">City</label>
                                        <input type="text" class="form-control" id="dob" name="dob"
                                            value="{{ $user->city }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="State">State</label>
                                        <input type="text" class="form-control" id="state" name="state"
                                            value="{{ $user->state }}">
                                    </div>
                                    <button type="button" class="btn btn-primary waves-effect waves-light width-lg">Update
                                        Profile</button>
                                </fieldset>



                            </div><!-- end col -->
                            {{-- @endforeach --}}
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
