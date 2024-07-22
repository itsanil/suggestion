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
                            <a href="{{ route('suggestion.index') }}" class="btn btn-primary waves-effect waves-light" >Back</a>
                        </div>
                    </div>
                    <br>
                    <?php 
                        $val = $suggestion;
                        $getSuggestionData = $val->getSuggestionData;
                        $getFeedbackData = $val->getFeedbackData;
                        $img = $getSuggestionData->img;
                        $img = json_decode($img,true);
                        $score_id_data = ($getFeedbackData)?json_decode($getFeedbackData->score_id,true):[];

                    ?>
                    {!! Form::model($suggestion, ['method' => 'PATCH','route' => ['suggestion.update', $suggestion->id]]) !!}
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <td><b>Title :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$getSuggestionData->title}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Type :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$val->getType->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Plant :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$val->getPlant->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Department :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$val->getDepartment->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Priority :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$getSuggestionData->priority}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Created By Employee :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$val->getCreatedBy->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Coardinator :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;@if($val->getFeedbackData && $val->getFeedbackData->getCoardinator) {{$val->getFeedbackData->getCoardinator->name}} @endif</td>
                                        </tr>
                                        <tr>
                                            <td><b>Description :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$getSuggestionData->desc}}</td>
                                        </tr>
                                        @if($img)
                                        <tr>
                                            <td><b>Image :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="avatar-group">
                                                    @foreach($img as $img_val)
                                                    <div class="avatar-group-item">
                                                         <a href="{{asset($img_val)}}" target="_blank" class="d-inline-block">
                                                             <img src="{{asset($img_val)}}" alt="" class="rounded-circle avatar-xs">
                                                         </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td><b>Image Description :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$getSuggestionData->img_desc}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Feedback (By Coardinator):</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{($getFeedbackData?$getFeedbackData->feedback_text1:'')}}</td>
                                        </tr>
                                        @role('Admin')
                                        <tr>
                                            
                                            <td>
                                                <b>Status</b>
                                                <div class="form-group">
                                                    {{ Form::select('status', ['Approve'=>'Select','In-Progress'=>'In-Progress','Pointed'=>'Pointed','On-Hold'=>'On-Hold','Implement'=>'Implement','Reject'=>'Reject'], null, [ 'class'=> 'form-control status','required'=>true]) }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="target_date">
                                            
                                            <td><b>Traget Date</b>
                                                <div class="form-group">
                                                    {{ Form::date('target_date', null, [ 'class'=> 'form-control']) }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="feedback_data">
                                            
                                            <td><b>Coardinator</b>
                                                <div class="form-group">
                                                    {{ Form::select('coardinator2', $hod_users,null, [ 'class'=>' form-control']) }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Feedback :</b>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {!! Form::textarea('feedback_text2', ($getFeedbackData?$getFeedbackData->feedback_text2:null), ['class' => 'form-control','rows'=>'1']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <td>

                                                                @foreach($score_data as $score_id =>  $scores)
                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="checkbox" id="formCheck1"  value="{{$score_id}}" name="score_id[]" @if(in_array($score_id, $score_id_data)) checked="" @endif>
                                                                            <label class="form-check-label" for="formCheck1">
                                                                                {{ $scores }}
                                                                            </label>
                                                                        </div>
                                                                @endforeach
                                                            </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        @if($val->status != 'Implement' && $val->status != 'Reject')
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="float-right">
                                                    <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @else
                                        
                                        <tr>
                                            <td><b>Feedback (By HOD):</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{($getFeedbackData?$getFeedbackData->feedback_text2:'')}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Score :</b>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$val->feedback_score}}</td>
                                        </tr>
                                        @endrole
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    window.addEventListener('load',function(){
        let status = $('.status').val();
        $('.target_date').hide();
        $('.feedback_data').hide();
        $('.submit-btn').hide();
        if (status != 'Reject' && status != 'Approve') {
            $('.target_date').show();
            $('.submit-btn').show();
        }
        if (status == 'Implement') {
            $('.feedback_data').show();
            $('.submit-btn').show();
        }
        $('.status').on('change',function() {
            let status = $(this).val();
            $('.target_date').hide();
            $('.feedback_data').hide();
            $('.submit-btn').hide();
            if (status != 'Reject' && status != 'Approve') {
                $('.target_date').show();
                $('.submit-btn').show();
            }
            if (status == 'Implement') {
                $('.feedback_data').show();
                $('.submit-btn').show();
            }
        })
    });
    
</script>
@endsection