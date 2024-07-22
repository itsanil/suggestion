@extends('layouts.main')
@section('m1','Society')
@section('m2','Add')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('society.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                       @include('society.form') 
                    </form>
                </div>
            </div>
            <!-- end select2 -->

        </div>


    </div>
    <!-- Button trigger modal -->
@endsection

