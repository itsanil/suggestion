<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            {{ Form::label('text', 'Name', ['class' => 'form-control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control','required'=>true]) }}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            {{ Form::label('text', 'Duration', ['class' => 'form-control-label']) }}
            {{ Form::text('duration', null, ['class' => 'form-control','required'=>true]) }}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            {{ Form::label('text', 'Modules', ['class' => 'form-control-label']) }}
            <!-- {{ Form::select('modules', $module_data, null, [ 'class'=> 'form-control', 'placeholder' => 'Select modules...']) }} -->
            @if(isset($data))
            {{ Form::select('modules[]', $module_data,json_decode($data->modules) , [ 'class'=> 'select2 form-control select2-multiple', "multiple"=>"multiple"]) }}
            @else
            {{ Form::select('modules[]', $module_data, null, [ 'class'=> 'select2 form-control select2-multiple', "multiple"=>"multiple"]) }}
            @endif
            <!-- {{ Form::text('modules', null, ['class' => 'form-control','required'=>true]) }} -->
        </div>
    </div>
</div>
<br>
<!-- <div class="btn-group mb-12 d-flex" role="group"> -->
    <button type="submit" class="btn btn-primary float-right" data-method="destroy">Save</button>
<!-- </div> -->