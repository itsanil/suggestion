@extends('layouts.main')
@section('m1','Society')
@section('m2','Data')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($data, ['method' => 'PATCH','route' => ['society.update', $society->id],"enctype"=>"multipart/form-data"]) !!}
                        <input type="hidden" name="society_id" value="{{ $society->id }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('address', 'Address', ['class' => 'form-control-label']) }}
                                    {{ Form::text('address', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('email', 'Email', ['class' => 'form-control-label']) }}
                                    {{ Form::email('email', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('gst_no', 'GST Number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('gst_no', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('pt_no', 'PT Number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('pt_no', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('pan_no', 'PAN Number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('pan_no', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('tan_no', 'TAN Number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('tan_no', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('city', 'City', ['class' => 'form-control-label']) }}
                                    {{ Form::text('city', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('state', 'State', ['class' => 'form-control-label']) }}
                                    {{ Form::text('state', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('pincode', 'Pincode', ['class' => 'form-control-label']) }}
                                    {{ Form::text('pincode', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">

                                    {{ Form::label('img', 'Image', ['class' => 'form-control-label']) }}
                                    @if($data && $data->img)
                                        <a href="{{ url($data->img) }}" target="_blank">
                                            <img src="{{ asset($data->img) }}" alt="" class="avatar-sm">
                                        </a>
                                    @endif
                                    <br>
                                    {{ Form::file('img', ['class' => 'form-control-file']) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('registration_number', 'Registration Number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('registration_number', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('db_name', 'Database Name', ['class' => 'form-control-label']) }}
                                    {{ Form::text('db_name', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('db_username', 'Database Username', ['class' => 'form-control-label']) }}
                                    {{ Form::text('db_username', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('db_password', 'Database Password', ['class' => 'form-control-label']) }}
                                    {{ Form::text('db_password',  null,['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('mobile_no', 'Mobile Number', ['class' => 'form-control-label']) }}
                                    {{ Form::tel('mobile_no', null, ['class' => 'form-control','required'=>true]) }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- <div class="btn-group mb-12 d-flex" role="group"> -->
                            <button type="submit" class="btn btn-primary float-right" data-method="destroy">Save</button>
                        <!-- </div> -->
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- end select2 -->

        </div>


    </div>
    <!-- Button trigger modal -->
@endsection

