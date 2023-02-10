@extends('admin.layouts.master')

@section('title')
Add service
@endsection


@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Add service</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right"><a href="{{ url('/controlpanel/admin/company/others/manage') }}"
                        class="label bg-blue color-palette p__8 f__size__13">Back to mission and vision page <i
                            class="fa fa-mail-reply"></i></a></span>
            </span>
        </div>
    </div>
    <div class="box-body">
        <form action="{{ url('/controlpanel/admin/company/others/add') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('title') ? ' has-error':'' }}">
                                <input type="text"
                                    class="form-control {{ $errors->has('title') ? ' has-error':'' }} "
                                    id="title" name="title" value="{{ old('title') }}"
                                    placeholder="Enter title">
                                @if ($errors->has('title'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group {{ $errors->has('status') ? ' has-error':'' }}">
                                <label>Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                    <option value="1" selected="selected" >Publish</option>
                                    <option value="0">Unpublish</option>
                                </select>
                                @if ($errors->has('status'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-lg-9">
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
