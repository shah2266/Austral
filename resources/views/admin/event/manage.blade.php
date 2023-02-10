@extends('admin.layouts.master')

@section('title')
Events
@endsection

@section('currentPage')
Events
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- logos -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Events Information</h3>
                    
                <div class="box-tools pull-right">
                    <span class="btn btn-box-tool">
                        <span class="pull-right">
                            <a href="{{ url('/controlpanel/admin/event/add') }}" class="label bg-navy color-palette p__8 f__size__13">Add event <i class="fa fa-plus"></i></a>
                        </span>
                    </span>
                    <span data-toggle="tooltip" title="{{ count($events) }} Info Found" class="badge bg-yellow">{{ count($events) }}</span>
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
                        <th>Image</th>
                        <th>Event Name</th>
                        <th>Status</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                    @foreach($events as $key=>$data)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td><img src="{{ asset($data->resize_image_path.$data->image) }}" alt="image" class="image__resize"></td>
                            <td>{{ $data->name }}</td>
                            <td>
                                <div class="margin">
                                    <span class="{{ ($data->status == 1)? 'badge bg-green':'badge bg-blue' }}">{{ ($data->status == 1)? 'Published': 'Unpublished'}}</span>
                                </div>
                            </td>
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
                                                <a href="{{ url('/controlpanel/admin/event/publish/'.$data->id) }}"><i class="fa fa-eye"></i> Publish this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/event/unpublished/'.$data->id) }}"><i class="fa fa-eye-slash"></i> Unpublished this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/event/edit/'.$data->id) }}"><i class="fa fa-pencil"></i> Edit this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/event/delete/'.$data->id) }}"><i class="fa fa-trash"></i> Delete this info</a>
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
