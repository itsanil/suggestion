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
                    {!! Form::open(array('route' => 'suggestion.store','method'=>'POST','enctype'=>"multipart/form-data")) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('text', 'Type', ['class' => 'form-control-label']) }}
                                {{ Form::select('type_id', $type_data, null, [ 'class'=> 'form-control','required'=>true]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('text', 'Plant', ['class' => 'form-control-label']) }}
                                {{ Form::select('plant_id', $plant_data, null, [ 'class'=> 'form-control','required'=>true]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('text', 'Department', ['class' => 'form-control-label']) }}
                                {{ Form::select('department_id', $department_data, null, [ 'class'=> 'form-control','required'=>true]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
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
                            {{--
                            
                            
                            <div class="dropzone">
                                <div class="upload-area" onclick="document.getElementById('file').click()">
                                    <img id="preview" src="#" alt="Image Preview">
                                    <p>Drop files here or click to upload.</p>
                                    <input type="file" id="file" name="image" accept="image/*" style="display: none;" multiple onchange="previewFile()">
                                </div>
                                <ul class="file-list mt-4">
                                    @foreach($images as $image)
                                    <li>
                                        <span>{{ $image->filename }}</span>
                                        <button onclick="deleteImage({{ $image->id }})">Delete</button>
                                    </li>
                                    @endforeach
                                </ul>
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
                            
                            <div class="dropzone">
                                
                                <input type="file" id="file" name="img[]" accept="image/*"  multiple onchange="previewFile()">
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
                            --}}
                            <div class="form-group">
                                {{ Form::label('text', 'Select single or multiple Image', ['class' => 'form-control-label']) }}
                                <input name="img[]" class="form-control" type="file" accept="image/*" multiple="multiple">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {{ Form::label('text', 'Image Description', ['class' => 'form-control-label']) }}
                                {!! Form::textarea('img_desc', null, ['class' => 'form-control','required'=>true]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
 <!-- Plugins js -->
<script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>

<!-- Form file upload init js -->
<script src="{{ asset('assets/js/pages/form-file-upload.init.js') }}"></script>
<script>
    function previewFile() {
        const preview = document.getElementById('preview');
        const file = document.getElementById('file').files[0];
        const reader = new FileReader();

        reader.onloadend = () => {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }

    function deleteImage(imageId) {
        if (confirm('Are you sure you want to delete this image?')) {
            fetch(`/upload/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to delete image');
                }
            });
        }
    }

</script>
@endsection