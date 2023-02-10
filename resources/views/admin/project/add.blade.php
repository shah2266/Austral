@extends('admin.layouts.master')

@section('title')
Project
@endsection


@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Project</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right"><a href="{{ url('/controlpanel/admin/project/manage') }}"
                        class="label bg-blue color-palette p__8 f__size__13">Back to project page <i
                            class="fa fa-mail-reply"></i></a></span>
            </span>
        </div>
    </div>
    <div class="box-body">
        <form action="{{ url('/controlpanel/admin/project/add') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
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
                            <div class="form-group {{ $errors->has('project_type') ? ' has-error':'' }}">
                                @php
                                    $types = array('1'=>'Completed','2'=>'Running', '3'=>'Upcoming');
                                @endphp
                                <select class="form-control select2 {{ $errors->has('project_type') ? ' has-error':'' }}" name="project_type" style="width: 100%;">
                                    <option value="">--Project type--</option>
                                    @foreach($types as $key => $type)
                                        @if (old('project_type') == $key)
                                            <option value="{{ $key }}" selected>{{ $type }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $type }}</option>
                                        @endif
                                    @endforeach                                    
                                </select>
                                @if ($errors->has('project_type'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('project_type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('project_name') ? ' has-error':'' }}">
                                <input type="text"
                                    class="form-control {{ $errors->has('project_name') ? ' has-error':'' }} "
                                    id="project_name" name="project_name" value="{{ old('project_name') }}"
                                    placeholder="Project name">
                                <span class="fa fa-building form-control-feedback"></span>
                                @if ($errors->has('project_name'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('project_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('total_area') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('total_area') ? ' has-error':'' }} "
                                            id="total_area" name="total_area"
                                            value="{{ old('total_area') }}" placeholder="Total area">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('total_area'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('total_area') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('number_of_unit') ? ' has-error':'' }}">
                                        <select class="form-control select2 {{ $errors->has('number_of_unit') ? ' has-error':'' }}" name="number_of_unit" style="width: 100%;">
                                            <option value="">--Select number of unit--</option>
                                            @for($i = 1; $i <= 20; $i++)
                                                @if (old('number_of_unit') == $i)
                                                    <option value="{{ $i }}" selected>{{ $i }}</option>
                                                @else
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                        @if ($errors->has('number_of_unit'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('number_of_unit') }}</strong>
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
                                        class="form-group has-feedback {{ $errors->has('parking_space') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('parking_space') ? ' has-error':'' }} "
                                            id="parking_space" name="parking_space"
                                            value="{{ old('parking_space') }}" placeholder="Parking space">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('parking_space'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('parking_space') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('features') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('features') ? ' has-error':'' }} "
                                            id="features" name="features" value="{{ old('features') }}"
                                            placeholder="Features">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('features'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('features') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('flat') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('flat') ? ' has-error':'' }} "
                                            id="flat" name="flat"
                                            value="{{ old('flat') }}" placeholder="Total number of flat">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('flat'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('flat') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('lift') ? ' has-error':'' }}">
                                        <select class="form-control select2" name="lift" style="width: 100%;">
                                            <option value="">--Select total lift--</option>
                                            @for($i = 1; $i <= 20; $i++)
                                                @if (old('lift') == $i)
                                                    <option value="{{ $i }}" selected>{{ $i }}</option>
                                                @else
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                        @if ($errors->has('lift'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('lift') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div class="form-group has-feedback {{ $errors->has('handover_date_time') ? ' has-error':'' }} ">
                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="handover_date_time" class="form-control pull-right {{ $errors->has('handover_date_time') ? ' has-error':'' }}" value="{{ old('handover_date_time') }}" placeholder="Pick handover date" id="datepicker">
                                        </div>
                                        @if ($errors->has('handover_date_time'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('handover_date_time') }}</strong>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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
