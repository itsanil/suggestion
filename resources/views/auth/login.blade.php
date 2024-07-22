@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row">
                    <!-- <div class="col-7">
                        <div class="text-primary p-4">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <p>Sign in to continue to SmartCHS.</p>
                        </div>
                    </div> -->
                    <!-- <div class="col-5 align-self-end"> -->
                        <img src="{{ asset('kusumgar/Kusumgar-logos_296+86_v_.png') }}" alt="" class="img-fluid">
                    <!-- </div> -->
                </div>
            </div>
            <div class="card-body pt-0">
                

                @include('auth.admin_login')

            </div>
        </div>
        
    </div>
</div>
@endsection
