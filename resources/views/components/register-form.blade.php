<div class="form-group mb-3">
    <div class="row">
        <div class="col-xl-6">
            <label for="firstname">First Name</label>
            <input class="form-control" type="text" required="" name="firstname" value="{{ old('firstname') }}"
                placeholder="Enter your firstname">
        </div>
        <div class="col-xl-6">
            <label for="lastname">Last Name</label>
            <input class="form-control" type="text" required="" name="lastname" placeholder="Enter your lastname"
                value="{{ old('lastname') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1"
        placeholder="Enter email" required>
</div>

<div class="form-group mb-3">
    <div class="row">
        <div class="col-xl-6">
            <label for="phone">Phone</label>
            <input type="text" placeholder="Enter your phone number" data-mask="(999) 999-9999" class="form-control"
                maxlength="14" name="phone" value="{{ old('phone') }}" required>
        </div>
        <div class="col-xl-6">
            <label for="dateOfBirth">Date Of Birth</label>
            <div class="input-group">
                <input type="date" class="form-control" name="dob" value="{{ old('dob') }}"
                    placeholder="dd/mm/yyyy">

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
    <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Enter your address"
        class="form-control @error('address_line_1') is-invalid @enderror">
    @error('address_line_1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="address_line_1">City </label>
    <input type="text" id="city" name="city" value="{{ old('city') }}" placeholder="Enter your city"
        class="form-control @error('city') is-invalid @enderror">
    @error('city')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="state">State </label>
    <input type="text" id="state" name="state" value="{{ old('state') }}" placeholder="Enter your State"
        class="form-control @error('state') is-invalid @enderror">
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
            <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="off"
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
                placeholder="Confirm your password" autocomplete="off"
                class="form-control @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

</div>
