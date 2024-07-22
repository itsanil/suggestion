@extends('layouts.main')
@section('m1','Master')
@section('m2','Society')
@push('pg_btn')
@can('create-designation')
    <a  data-toggle="modal" data-target="#designation_add" href="#" class="btn btn-sm btn-primary">Create Society</a>
@endcan
@endpush

        @if(session('errors'))
            @foreach($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif

        @if(session('success'))
            @foreach($success as $success)
                <li>{{ $success }}</li>
            @endforeach
        @endif

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
            
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap">
                        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
                        <div class="ms-auto">
                            <a href="{{ route('society.create')}}" class="btn btn-primary waves-effect waves-light">Add</a>
                            <!-- <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Week</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Month</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Year</a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                    <br>

                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <table class="table table-editable table-bordered dt-responsive  nowrap w-100 table-edits" id="datatable" >
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Registration date</th>
                                    <th scope="col">Subscription</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($data as $val)
                                    <tr data-id="{{ $val->id }}">
                                        <td data-field="name">{{ $val->name }}</td>
                                        <td data-field="registration_date">{{ $val->registration_date }}</td>
                                        <td data-field="subscription_id">{{ $val->subscription->name }}</td>
                                        <td data-field="status">{{ $val->status }}</td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-info btn-sm m-1" href="{{ route('society.show',$val->id)}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-info btn-sm m-1" href="{{ route('society.edit',$val->id)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            {!! Form::open(['route' => ['society.destroy', $val],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}

                                            <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Delete Designation" href="">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

@endsection
@section('css')
   @include('layouts.css') 
@endsection
@section('js')
@include('layouts.js')
<script>
    jQuery(document).ready(function(){
        $('.delete').on('click', function(e){
            e.preventDefault();
            let that = jQuery(this);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, do it!"
            }).then(function(t) {
                if (t.value) {
                    that.parent('form').submit();
                    Swal.fire("Deleted!", "Your file has been deleted.", "success");
                } else {
                    Swal.fire("Your Data is safe!");
                }
            });
        });
    })

</script>
@endsection
