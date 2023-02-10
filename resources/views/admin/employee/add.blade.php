@extends('admin.layouts.master')

@section('title')
Employee
@endsection


@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Employee</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right"><a href="{{ url('/controlpanel/admin/employee/manage') }}"
                        class="label bg-blue color-palette p__8 f__size__13">Back to employee page <i
                            class="fa fa-mail-reply"></i></a></span>
            </span>
        </div>
    </div>
    <div class="box-body">
        <form action="{{ url('/controlpanel/admin/employee/add') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group {{ $errors->has('image') ? ' has-error':'' }}">
                        <input type="file" name="image" class="file">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control" disabled
                                placeholder="Upload Image (Only-jpeg, png)">
                            <span class="input-group-btn">
                                <button class="browse btn btn-success" type="button"><i
                                        class="glyphicon glyphicon-search"></i>
                                    Browse</button>
                            </span>

                        </div>
                    </div>

                    <div class="{{ $errors->has('image') ? ' has-error':'' }}">
                        @if ($errors->has('image'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('name') ? ' has-error':'' }} "
                                    id="name" name="name" value="{{ old('name') }}" placeholder="name">
                                <span class="fa fa-map-marker form-control-feedback"></span>
                                @if ($errors->has('name'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('designation') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('designation') ? ' has-error':'' }} "
                                            id="designation" name="designation"
                                            value="{{ old('designation') }}" placeholder="Designation">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('designation'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('designation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('id_card') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('id_card') ? ' has-error':'' }} "
                                            id="id_card" name="id_card" value="{{ old('id_card') }}"
                                            placeholder="Card no">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('id_card'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('id_card') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('email') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('email') ? ' has-error':'' }} "
                                            id="email" name="email"
                                            value="{{ old('email') }}" placeholder="Email">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('email'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('contact') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('contact') ? ' has-error':'' }} "
                                            id="contact" name="contact" value="{{ old('contact') }}"
                                            placeholder="contact">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('contact'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group has-feedback {{ $errors->has('address') ? ' has-error':'' }}">
                                        <input type="text" class="form-control {{ $errors->has('address') ? ' has-error':'' }} "
                                            id="address" name="address" value="{{ old('address') }}" placeholder="Address">
                                        <span class="fa fa-map-marker form-control-feedback"></span>
                                        @if ($errors->has('address'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('gender') ? ' has-error':'' }}">
                                        @php
                                            $types = array('1'=>'Male','2'=>'Female');
                                        @endphp
                                        <select class="form-control select2 {{ $errors->has('gender') ? ' has-error':'' }}" name="gender" style="width: 100%;">
                                            <option value="">--Select gender--</option>
                                            @foreach($types as $key => $type)
                                                @if (old('gender') == $key)
                                                    <option value="{{ $key }}" selected>{{ $type }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $type }}</option>
                                                @endif
                                            @endforeach                                    
                                        </select>
                                        @if ($errors->has('gender'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group {{ $errors->has('status') ? ' has-error':'' }}">
                        @php
                            $status = array('1'=>'Publish','0'=>'Unpublish'); 
                        @endphp
                        <select class="form-control select2" name="status" style="width: 100%;">
                            @foreach($status as $key => $st)
                                @if (old('status') == $key)
                                    <option value="{{ $key }}" selected>{{ $st }}</option>
                                @else
                                    <option value="{{ $key }}">{{ $st }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('status'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group {{ $errors->has('description') ? ' has-error':'' }}">
                        <textarea id="editor1" name="description" rows="10" cols="80">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Save</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
