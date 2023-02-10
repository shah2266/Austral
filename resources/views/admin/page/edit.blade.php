@extends('admin.layouts.master')

@section('title')
Update page 
@endsection


@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Update page</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right"><a href="{{ url('/controlpanel/admin/page/manage') }}"
                        class="label bg-blue color-palette p__8 f__size__13">Back to page<i
                            class="fa fa-mail-reply"></i></a></span>
            </span>
        </div>
    </div>
    <div class="box-body">
        <form action="{{ url('/controlpanel/admin/page/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" name="id" value="{{ $page->id }}">
                            <div class="form-group has-feedback {{ $errors->has('page_name') ? ' has-error':'' }}">
                                <input type="text"
                                    class="form-control {{ $errors->has('page_name') ? ' has-error':'' }} "
                                    id="page_name" name="page_name" value="{{ $page->page_name }}"
                                    placeholder="Page name">
                                @if ($errors->has('page_name'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('page_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('title') ? ' has-error':'' }}">
                                <input type="text"
                                    class="form-control {{ $errors->has('title') ? ' has-error':'' }} "
                                    id="title" name="title" value="{{ $page->title }}"
                                    placeholder="Page title">
                                @if ($errors->has('title'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group {{ $errors->has('status') ? ' has-error':'' }}">
                                @php
                                    $status = array('0'=>'Unpublish', '1'=>'Publish');
                                @endphp
                                <label>Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                    @foreach($status as $key => $status)
                                        <option value="{{ $key }}" {{ ($page->status == $key)? 'selected': ''}}>{{$status}}</option>
                                    @endforeach
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
