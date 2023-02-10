@extends('admin.layouts.master')

@section('title')
Contact
@endsection

@section('currentPage')
Contact
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- logos -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Contact</h3>
                    
                <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="{{ count($contacts) }} Info Found" class="badge bg-yellow">{{ count($contacts) }}</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-striped">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Subjects</th>
                        <th>Description</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                    @foreach($contacts as $key=>$data)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->number }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->subject }}</td>
                            <td>{{ strip_tags($data->message) }}</td>
                            <td style="min-width:200px; text-align:center;">
                                <div class="margin">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-purple">Action</button>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/contact/delete/'.$data->id) }}"><i class="fa fa-trash"></i> Delete this info</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="box-footer">
            </div>
            <!-- /.box-footer-->
        </div>
    </div>
</div>
@endsection
