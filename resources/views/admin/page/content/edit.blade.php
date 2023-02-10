@extends('admin.layouts.master')

@section('title')
Edit page content
@endsection


@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Edit page content</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right"><a href="{{ url('/controlpanel/admin/page/content/manage') }}"
                        class="label bg-blue color-palette p__8 f__size__13">Back to page content setting page <i
                            class="fa fa-mail-reply"></i></a></span>
            </span>
        </div>
    </div>
    <div class="box-body">
        <form action="{{ url('/controlpanel/admin/page/content/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" name="id" value="{{ $pageContent->id }}">
                            <div class="form-group {{ $errors->has('page_id') ? ' has-error':'' }}">
                                <label>Page Name</label>
                                <select class="form-control select2" name="page_id" style="width: 100%;">
                                    <option>--Select page name</option>
                                    @foreach($activePages as $key => $page)
                                        <option value="{{ $page->id }}" {{ ($pageContent->page_id == $page->id)? 'selected':'' }}>{{$page->page_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('page_id'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('page_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('heading') ? ' has-error':'' }}">
                                <input type="text"
                                    class="form-control {{ $errors->has('heading') ? ' has-error':'' }} "
                                    id="heading" name="heading" value="{{ $pageContent->heading }}"
                                    placeholder="Content heading">
                                @if ($errors->has('heading'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('heading') }}</strong>
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
                                        <option value="{{ $key }}" {{ ($pageContent->status == $key)? 'selected': ''}}>{{$status}}</option>
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

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group {{ $errors->has('description') ? ' has-error':'' }}">
                                <textarea id="editor1" name="description" rows="10" cols="80">{{ $pageContent->description }}</textarea>
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
                    <button type="submit" class="btn btn-success btn-block btn-flat">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
