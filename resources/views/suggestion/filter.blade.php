    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('sort_by', 'Sort by', ['class' => 'form-control-label']) }}
                    <div>
                        {{ Form::radio('sort_by', 'feedback_score', true) }} Points<br>
                        {{ Form::radio('sort_by', 'created_at') }} Date Created<br>
                        {{ Form::radio('sort_by', 'due_date') }} Due Date<br>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('order_by', 'Order by', ['class' => 'form-control-label']) }}
                    <div>
                        {{ Form::radio('order_by', 'asc', true) }} Ascending<br>
                        {{ Form::radio('order_by', 'desc') }} Descending<br>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('type_id', 'Type', ['class' => 'form-control-label']) }}
                    {{ Form::select('type_id', $type_data->prepend('None', ''), null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('plant_id', 'Location', ['class' => 'form-control-label']) }}
                    {{ Form::select('plant_id', $plant_data->prepend('None', ''), null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('department_id', 'Department', ['class' => 'form-control-label']) }}
                    {{ Form::select('department_id', $department_data->prepend('None', ''), null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('priority', 'Priority', ['class' => 'form-control-label']) }}
                    {{ Form::select('priority', ['' => 'None', 'Critical' => 'Critical', 'Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('status', 'Status', ['class' => 'form-control-label']) }}
                    {{ Form::select('sug_status', ['' => 'None', 'Approve'=>'Approve','In-Progress'=>'In-Progress','Pointed'=>'Pointed','On-Hold'=>'On-Hold','Implement'=>'Implement','Reject'=>'Reject'], null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::label('date_filter', 'Date Filter', ['class' => 'form-control-label']) }}
                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                        <input type="date" class="form-control" name="start" placeholder="Start Date">
                        <input type="date" class="form-control" name="end" placeholder="End Date">
                    </div>
                    <!-- {{ Form::date('start_date', request('start_date'), ['class' => 'form-control']) }} -->
                    <!-- {{ Form::date('end_date', request('end_date'), ['class' => 'form-control']) }} -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Apply</button>
    </div>