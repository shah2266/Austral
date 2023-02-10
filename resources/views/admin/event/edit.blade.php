@extends('admin.layouts.master')

@section('title')
Event
@endsection


@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Event</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right"><a href="{{ url('/controlpanel/admin/event/manage') }}"
                        class="label bg-blue color-palette p__8 f__size__13">Back to event page <i
                            class="fa fa-mail-reply"></i></a></span>
            </span>
        </div>
    </div>
    <div class="box-body">
        <form action="{{ url('/controlpanel/admin/event/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group {{ $errors->has('image') ? ' has-error':'' }}">
                        <img src="{{ asset($event->resize_image_path.$event->image) }}" alt="" class="image__resize">
                        <input type="hidden" name="id" value="{{ $event->id }}">
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
                                    id="name" name="name" value="{{ $event->name }}" placeholder="name">
                                <span class="fa fa-map-marker form-control-feedback"></span>
                                @if ($errors->has('name'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('address') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('address') ? ' has-error':'' }} "
                                    id="address" name="address" value="{{ $event->address }}" placeholder="Address">
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
                                    <div class="form-group has-feedback {{ $errors->has('from_date') ? ' has-error':'' }} ">
                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="from_date" class="form-control pull-right {{ $errors->has('from_date') ? ' has-error':'' }}" value="{{ $event->from_date }}" placeholder="From date" id="datepicker">
                                        </div>
                                        @if ($errors->has('from_date'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('from_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group has-feedback {{ $errors->has('to_date') ? ' has-error':'' }} ">
                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="to_date" class="form-control pull-right {{ $errors->has('to_date') ? ' has-error':'' }}" value="{{ $event->to_date }}" placeholder="To date" id="datepicker2">
                                        </div>
                                        @if ($errors->has('to_date'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('to_date') }}</strong>
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
                                <option value="{{ $key }}" {{ ($event->status == $key)? 'selected':''}}>{{ $st }}</option>
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
                        <textarea id="editor1" name="description" rows="10" cols="80">{{ $event->description }}</textarea>
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
                    <button type="submit" class="btn btn-success btn-block btn-flat">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
