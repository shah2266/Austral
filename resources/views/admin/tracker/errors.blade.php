@extends('admin.layouts.master')

@section('title')
Tracker
@endsection

@section('currentPage')
Tracker
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- logos -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Errors Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table id="visitorSessions" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th style="width: 40px">Id</th>
                            <th>Session id</th>
                            <th>Error message</th>
                            <th>Path</th>
                            <th>Date time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($errors as $error)
                        <tr>
                            <td>{{ $error->id }}</td>
                            <td>{{ $error->session->uuid }}</td>
                            <td><b>{{ $error->error->code }} </b><span class="text-danger">{{ $error->error->message }}</span></td>
                            <td>{{ $error->path->path }}</td>
                            <td>{{ $error->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="box-footer">
            </div>
            <!-- /.box-footer-->
        </div>
    </div>
</div>
@endsection
