@extends('layouts.main')

@section('m1','Dashboard')
@section('m2','Dashboard')
@section('title',$title)
@section('content')
<style type="text/css">
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
/*        background-color:#25d366;*/
/*        color:#FFF;*/
        border-radius:50px;
        text-align:center;
        font-size:30px;
        box-shadow: 2px 2px 3px #999;
        z-index:100;
    }

    .my-float{
        margin-top:16px;
    }
</style>
<div class="row">
    <div class="col-lg-2 col-6 mb-3">
        <div class="card" style="background: #556ee6;">
            <div class="card-body p-4">
                <a href="{{url('application')}}" class="text-body">
                <div class="text-center mb-3" style="color: white !important;">
                    <i class="bx bx-home-circle"></i>
                    <h5 class="mt-4 mb-2 font-size-15">Application</h5>
                </div>
                </a>
            </div>
        </div><!--end card-->
    </div>
    <div class="col-lg-2 col-6 mb-3">
        <div class="card" style="background: #556ee6;">
            <div class="card-body p-4">
                <a href="{{url('plant')}}" class="text-body">
                <div class="text-center mb-3" style="color: white !important;">
                    <i class="bx bx-map"></i>
                    <h5 class="mt-4 mb-2 font-size-15">Plant</h5>
                </div>
                </a>
            </div>
        </div><!--end card-->
    </div>
    <div class="col-lg-2 col-6 mb-3">
        <div class="card" style="background: #556ee6;">
            <div class="card-body p-4">
                <a href="{{url('department')}}" class="text-body">
                <div class="text-center mb-3" style="color: white !important;">
                    <i class="bx bx-briefcase"></i>
                    <h5 class="mt-4 mb-2 font-size-15">Department</h5>
                </div>
                </a>
            </div>
        </div><!--end card-->
    </div>
    <div class="col-lg-2 col-6 mb-3">
        <div class="card" style="background: #556ee6;">
            <div class="card-body p-4">
                <a href="{{url('type')}}" class="text-body">
                <div class="text-center mb-3" style="color: white !important;">
                    <i class="bx bx-label"></i>
                    <h5 class="mt-4 mb-2 font-size-15">Type</h5>
                </div>
                </a>
            </div>
        </div><!--end card-->
    </div>
    <div class="col-lg-2 col-6 mb-3">
        <div class="card" style="background: #556ee6;">
            <div class="card-body p-4">
                <a href="{{url('users')}}" class="text-body">
                <div class="text-center mb-3" style="color: white !important;">
                    <i class="bx bx-user"></i>
                    <h5 class="mt-4 mb-2 font-size-15">User</h5>
                </div>
                </a>
            </div>
        </div><!--end card-->
    </div>
    <div class="col-lg-2 col-6 mb-3">
        <div class="card" style="background: #556ee6;">
            <div class="card-body p-4">
                <a href="{{url('score')}}" class="text-body">
                <div class="text-center mb-3" style="color: white !important;">
                    <i class="bx bx-message"></i>
                    <h5 class="mt-4 mb-2 font-size-15">Score</h5>
                </div>
                </a>
            </div>
        </div><!--end card-->
    </div>
</div>
@endsection
@section('css')
<!-- DataTables -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  -->
@endsection
@section('js')
 
@endsection
