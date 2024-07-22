@extends('layouts.app')

@section('content')

<!-- <div class="row justify-content-center">
    <div class="checkout-tabs"> -->
        <div class="row">
            @foreach($application_data as $value)
            <div class="col-lg-2 col-6 mb-3">
                <div class="card" style="background: #556ee6;">
                    <div class="card-body p-4">
                        <a href="{{url('home')}}?app_id={{$value->id}}" class="text-body">
                        <div class="text-center mb-3" style="color: white !important;">
                            <i class="bx bx-home-circle"></i>
                            <h5 class="mt-4 mb-2 font-size-15">{{$value->name}}</h5>
                        </div>
                        </a>
                    </div>
                </div><!--end card-->
            </div>
            <!-- <div class="col-md-6 nav nav-pills" >
                <a class="nav-link active" id="v-pills-gen-ques-tab" style="width:100%;" href="{{url('home')}}?app_id={{$value->id}}" >
                    <br>
                    <p class="fw-bold mb-4">{{$value->name}}</p>
                </a>
            </div> -->
            @endforeach
        <!-- </div>
    </div> -->
</div>
@endsection
