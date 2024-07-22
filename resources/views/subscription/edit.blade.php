@extends('layouts.main')
@section('m1','Subscription')
@section('m2','Edit')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    {!! Form::model($data, ['method' => 'PATCH','route' => ['subscription.update', $data->id]]) !!}
                       @include('subscription.form') 
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- end select2 -->

        </div>


    </div>
    <!-- Button trigger modal -->
@endsection

