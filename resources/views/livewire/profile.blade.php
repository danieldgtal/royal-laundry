<div class="row">
    <div class="col-12">
        <div class="card-box">

            <h4 class="header-title mb-4">User Profile</h4>
            <form method="POST">
                <div class="row">
                    {{-- @foreach ($customers as $customer) --}}
                    <div class="col-xl-6">

                        @csrf
                        <div class="form-group">
                            <label for="firstname">FirstName</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                value="{{ $customer->firstname }}">
                        </div>
                        <div class="form-group">
                            <label for="lastname">LastName</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                value="{{ $customer->lastname }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $customer->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{ $customer->address }}</textarea>
                        </div>

                    </div><!-- end col -->

                    <div class="col-xl-6">

                        <fieldset>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" name="email"
                                    value="{{ $customer->email }}">
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    value="{{ $customer->dob }}">
                            </div>
                            <div class="form-group">
                                <label for="City">City</label>
                                <input type="text" class="form-control" id="dob" name="dob"
                                    value="{{ $customer->city }}">
                            </div>
                            <div class="form-group">
                                <label for="State">State</label>
                                <input type="text" class="form-control" id="state" name="state"
                                    value="{{ $customer->state }}">
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
