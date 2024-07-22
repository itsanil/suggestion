@extends('layouts.main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)


@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
            
                <div class="card-body">
                    @role('SuperAdmin')
                    <div class="d-sm-flex flex-wrap">
                        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
                        <div class="ms-auto">
                            <a href="{{ route('users.index') }}" class="btn btn-primary waves-effect waves-light" >Back</a>
                        </div>
                    </div>
                    <br>
                    @endrole
{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Role:</strong>
            {{ Form::select('roles', $roles, $user->getRoleNames()->toArray()[0], [ 'class'=> 'form-control','required'=>true]) }}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Username:</strong>
            {!! Form::text('user_name', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Mobile:</strong>
            {!! Form::number('mobile', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Employee ID:</strong>
            {!! Form::text('employee_id', null, array('placeholder' => 'Employee ID','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('text', 'Gender', ['class' => 'form-control-label']) }}
            {{ Form::select('gender', ['Male'=>'Male','Female'=>'Female','Other'=>'Other'], null, [ 'class'=> 'form-control','required'=>true]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('text', 'Joining Date', ['class' => 'form-control-label']) }}
            {{ Form::date('joining_date', date('Y-m-d',strtotime($user->joining_date)), array('placeholder' => 'Joining Date','class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            {{ Form::label('text', 'Plant', ['class' => 'form-control-label']) }}
            {{ Form::select('location_id[]', $plant_data, json_decode($user->location_id,true), [ 'class'=> 'select2 form-control select2-multiple', "multiple"=>"multiple"]) }}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            {{ Form::label('text', 'Department', ['class' => 'form-control-label']) }}
            {{ Form::select('department_id[]', $department_data, json_decode($user->department_id,true), [ 'class'=> 'select2 form-control select2-multiple', "multiple"=>"multiple"]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('text', 'Status', ['class' => 'form-control-label']) }}
            {{ Form::select('status', ['1'=>'Active','0'=>'In-active'], null, [ 'class'=> 'form-control','required'=>true]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('text', 'Application', ['class' => 'form-control-label']) }}
            {{ Form::select('app_id[]', $application_data, json_decode($user->app_id,true), [ 'class'=> 'select2 form-control select2-multiple','required'=>true,"multiple"=>"multiple"]) }}
        </div>
    </div>

    <div class="col-md-12 text-center">
        <!-- <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button> -->
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
   <!--  <div class="col-xs-6 col-sm-6 col-md-6 text-center">
        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div> -->
{!! Form::close() !!}

</div>
            </div>
        </div>
    </div>
@endsection