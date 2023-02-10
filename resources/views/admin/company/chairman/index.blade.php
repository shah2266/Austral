@extends('admin.layouts.master')

@section('title')
Chairman message
@endsection


@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Chairman message</h3>
    </div>
    <div class="box-body">
        <form action="{{ url('/controlpanel/admin/company/chairman/message/add') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group {{ $errors->has('image') ? ' has-error':'' }}">
                        @if(!empty($message->id))
                        <input type="hidden" name="id" value="{{ $message->id }}">
                        @endif
                        @if(!empty($message->image))
                            <img src="{{ asset($message->image) }}" alt="" class="image__resize">
                        @endif                        
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
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('name') ? ' has-error':'' }} " id="name"
                                    name="name" value="@if(!empty($message->name)) {{ $message->name }} @else {{ old('name') }} @endif" placeholder="Name">
                                
                                @if ($errors->has('name'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('designation') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('designation') ? ' has-error':'' }} " id="designation"
                                    name="designation" value="@if(!empty($message->designation)) {{ $message->designation }} @else {{ old('designation') }} @endif" placeholder="Designation">
                                
                                @if ($errors->has('designation'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group {{ $errors->has('description') ? ' has-error':'' }}">
                        <textarea id="editor1" name="description" rows="10" cols="80">@if(!empty($message->description)) {{ $message->description }} @else {{ old('description') }} @endif</textarea>
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