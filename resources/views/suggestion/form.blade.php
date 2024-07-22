    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Type', ['class' => 'form-control-label']) }}
                    {{ Form::select('type_id', $type_data, null, [ 'class'=> 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Plant', ['class' => 'form-control-label']) }}
                    {{ Form::select('plant_id', $plant_data, null, [ 'class'=> 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Department', ['class' => 'form-control-label']) }}
                    {{ Form::select('department_id', $department_data, null, [ 'class'=> 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Title', ['class' => 'form-control-label']) }}
                    {{ Form::text('title', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Description', ['class' => 'form-control-label']) }}
                    {!! Form::textarea('desc', null, ['class' => 'form-control','required'=>true]) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Priority', ['class' => 'form-control-label']) }}
                    {{ Form::select('priority', ['Critical'=>'Critical','High'=>'High','Medium'=>'Medium','Low'=>'Low'], null, [ 'class'=> 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('text', 'Due Date', ['class' => 'form-control-label']) }}
                    {{ Form::date('due_date', null, ['class' => 'form-control','required'=>true]) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple="multiple">
                    </div>
                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>
                
                        <h4>Drop files here or click to upload.</h4>
                    </div>
                </div>
                <ul class="list-unstyled mb-0" id="dropzone-preview">
                    <li class="mt-2" id="dropzone-preview-list">
                        <!-- This is used as the file preview template -->
                        <div class="border rounded">
                            <div class="d-flex p-2">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm bg-light rounded">
                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="../../../img.themesbrand.com/judia/new-document.png" alt="Dropzone-Image">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="pt-1">
                                        <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                        <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>