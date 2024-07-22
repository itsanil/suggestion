@extends('layouts.main')
@section('m1','Subscription')
@section('m2','Add')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('subscription.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                       @include('subscription.form') 
                    </form>
                </div>
            </div>
            <!-- end select2 -->

        </div>


    </div>
    <!-- Button trigger modal -->
@endsection

