@extends('layouts.main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)


@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
            
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap">
                        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
                        <div class="ms-auto">
                            <a href="{{ route('users.create') }}" class="btn btn-primary waves-effect waves-light" >Add</a>
                        </div>
                    </div>
                    <br>
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <table class="table table-bordered dt-responsive  nowrap w-100 " id="datatable" >
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                          @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                               <label class="badge badge-pill badge-soft-success font-size-11">{{ $v }}</label>
                                            @endforeach
                                          @endif
                                        </td>
                                        <td>
                                           <!-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> -->
                                           <a class="btn btn-info btn-sm m-1" href="{{ route('users.edit',$user->id) }}">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                           <!-- <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a> -->
                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Delete User" href="">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} -->
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