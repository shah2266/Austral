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
                <h3 class="box-title">Visitor Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table id="visitorSessions" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th style="width: 40px">Id</th>
                            <th>IP address</th>
                            <th>Platform</th>
                            <th>Browser</th>
                            <th>Language</th>
                            <th>Hit date time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $visitor->id }}</td>
                            <td>{{ $visitor->client_ip}}</td>
                            <td>{{ $visitor->device->platform }}</td>
                            <td>{{ $visitor->agent->browser . ' - ' . $visitor->agent->browser_version }}</td>
                            <td>{{ $visitor->language->preference }}</td>
                            <td><b>Created: </b>{{ $visitor->created_at }}<br><b>Updated:</b> {{ $visitor->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th style="width: 40px">Id</th>
                            <th>uuid</th>
                            <th>IP address</th>
                            <th>Platform</th>
                            <th>Browser</th>
                            <th>Language</th>
                            <th>Hit date time</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>

            <div class="box-footer">
            </div>
            <!-- /.box-footer-->
        </div>
    </div>
</div>
@endsection
