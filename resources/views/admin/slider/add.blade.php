@extends('admin.layouts.master')

@section('title')
Slider Add
@endsection


@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Add slider</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right"><a href="{{ url('/controlpanel/admin/company/slider/manage') }}"
                        class="label bg-blue color-palette p__8 f__size__13">Back to slider page <i
                            class="fa fa-mail-reply"></i></a></span>
            </span>
        </div>
    </div>
    <div class="box-body">
        <form action="{{ url('/controlpanel/admin/company/slider/add') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group {{ $errors->has('image') ? ' has-error':'' }}">
                        <input type="file" name="image" class="file">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control" disabled placeholder="Upload Image (Only-jpeg, png)">
                            <span class="input-group-btn">
                                <button class="browse btn btn-success" type="button"><i class="glyphicon glyphicon-search"></i>
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
                            <div class="form-group has-feedback {{ $errors->has('caption') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('caption') ? ' has-error':'' }} " id="caption"
                                    name="caption" value="{{ old('caption') }}" placeholder="Slide name">
                                
                                @if ($errors->has('caption'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('caption') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('sub_title') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('sub_title') ? ' has-error':'' }} " id="sub_title"
                                    name="sub_title" value="{{ old('sub_title') }}" placeholder="Sub title">
                                
                                @if ($errors->has('sub_title'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('sub_title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('btn_label') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('btn_label') ? ' has-error':'' }} " id="btn_label"
                                    name="btn_label" value="{{ old('btn_label') }}" placeholder="Button label">
                                
                                @if ($errors->has('btn_label'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('btn_label') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('btn') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('btn') ? ' has-error':'' }} " id="btn"
                                    name="btn" value="{{ old('btn') }}" placeholder="Button link">
                                
                                @if ($errors->has('btn'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('btn') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('year_of_established') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('year_of_established') ? ' has-error':'' }} " id="year_of_established"
                                    name="year_of_established" value="{{ old('year_of_established') }}" placeholder="Year of established">
                                
                                @if ($errors->has('year_of_established'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('year_of_established') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
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