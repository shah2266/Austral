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
                            <th>uuid</th>
                            <th>IP address</th>
                            <th>Platform</th>
                            <th>Browser</th>
                            <th>Language</th>
                            <th>Hit date time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessions as $session)
                        <tr>
                            <td>{{ $session->id }}</td>
                            <td>{{ $session->uuid }}</td>
                            <td>{{ $session->client_ip}}</td>
                            <td>{{ $session->device->kind . ' - ' . $session->device->platform }}</td>
                            <td>{{ $session->agent->browser . ' - ' . $session->agent->browser_version }}</td>
                            <td>{{ $session->language->preference }}</td>
                            <td><b>Created: </b>{{ $session->created_at }}<br><b>Updated:</b> {{ $session->updated_at }}
                            </td>
                        </tr>
                        @endforeach
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
