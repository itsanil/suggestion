<?php 
use \App\Models\Society;

$society_data = Society::pluck('name','id')->toArray();
 ?>
<form class="form-horizontal" method="POST" action="{{ url('socity-login') }}">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Society</label>
        {{ Form::select('society_id', $society_data, null, [ 'class'=> 'form-control','required'=>true]) }}
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Mobile</label>
        <input type="number" class="form-control @error('contact_mobile') is-invalid @enderror" id="username" placeholder="Enter Mobile" name="contact_mobile" value="{{ old('contact_mobile') }}" required autocomplete="contact_mobile" autofocus>
        @error('contact_mobile')
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