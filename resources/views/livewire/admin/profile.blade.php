<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Admin Profile</h4>

            <div class="row">
                {{-- @foreach ($users as $user) --}}
                <div class="col-xl-6">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            value="{{ $user->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Phone</label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                            value="{{ $user->phone }}" disabled>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-6">
                    <fieldset>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" name="email"
                                value="{{ $user->email }}" disabled>
                        </div>
                        <button type="button" disabled class="btn btn-primary waves-effect waves-light width-lg">Update
                            Profile</button>
                    </fieldset>
                </div><!-- end col -->
                {{-- @endforeach --}}
            </div><!-- end row -->

        </div>
    </div><!-- end col -->
</div>
