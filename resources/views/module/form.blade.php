    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Name', ['class' => 'form-control-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Url Name', ['class' => 'form-control-label']) }}
                    {{ Form::text('url_name', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>