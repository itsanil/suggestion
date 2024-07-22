<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    @csrf
<br>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="username" placeholder="Enter User Name" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
        @error('user_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group auth-pass-inputgroup">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
        </div>
    </div>
    <div class="mt-3 d-grid">
        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
    </div>
    @if (Route::has('password.request'))
        <div class="mt-4 text-center">
            <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
        </div>
    @endif
    
</form>