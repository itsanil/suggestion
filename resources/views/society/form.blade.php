<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('text', 'Name', ['class' => 'form-control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control','required'=>true]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('text', 'Registration date', ['class' => 'form-control-label']) }}
            {{ Form::date('registration_date', null, ['class' => 'form-control','required'=>true]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('text', 'Subscription', ['class' => 'form-control-label']) }}
            {{ Form::select('subscription_id', $subscription_data, null, [ 'class'=> 'form-control','required'=>true]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('text', 'Status', ['class' => 'form-control-label']) }}
            {{ Form::select('status', ['Active'=>'Active','In-active'=>'In-active'], null, [ 'class'=> 'form-control','required'=>true]) }}
        </div>
    </div>
</div>
<br>
<!-- <div class="btn-group mb-12 d-flex" role="group"> -->
    <button type="submit" class="btn btn-primary float-right" data-method="destroy">Save</button>
<!-- </div> -->