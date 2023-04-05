<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Staff Profile</h4>

            <div class="row">
                {{-- @foreach ($staffs as $staff) --}}
                <div class="col-xl-6">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">FirstName</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            value="{{ $staff->firstname }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="lastname">LastName</label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                            value="{{ $staff->lastname }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        @php
                            $user = DB::table('users')
                                ->where('id', auth()->user()->id)
                                ->first();
                        @endphp

                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ $user->phone }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" disabled>{{ $staff->address }}</textarea>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-6">
                    <fieldset>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" name="email"
                                value="{{ $staff->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Branch</label>
                            @if ($branch = App\Models\Branch::find($staff->branch_id))
                                <input type="text" id="email" class="form-control" name="email"
                                    value="{{ $branch->name }}" disabled>
                            @else
                                <input type="text" id="email" class="form-control" name="email"
                                    value="{{ 'UNKNOWN' }}" disabled>
                            @endif
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
