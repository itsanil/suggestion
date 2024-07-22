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
                        <div class="ms-auto">
                            <a href="{{ route('home') }}" class="btn btn-primary waves-effect waves-light" >Back</a>
                        </div>
                    </div>
                    <br>
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <table class="table table-bordered dt-responsive  nowrap w-100 " id="datatable" >
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($score_wise as $val)
                                    <tr data-id="{{ $val->id }}">
                                        <td data-field="name">{{ $val->getCreatedBy->name }}</td>
                                        <td data-field="name">{{ $val->feedback_score }}</td>
                                        <td data-field="name">{{ $val->status }}</td>
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

@endsection
