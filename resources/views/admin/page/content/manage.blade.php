@extends('admin.layouts.master')

@section('title')
Page Content Setting
@endsection

@section('currentPage')
Page Content Setting
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- logos -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Page Content Setting</h3>
                    
                <div class="box-tools pull-right">
                    <span class="btn btn-box-tool">
                        <span class="pull-right"><a href="{{ url('/controlpanel/admin/page/content/add') }}" class="label bg-navy color-palette p__8 f__size__13">Add Page Content <i class="fa fa-plus"></i></a></span>
                    </span>
                    <span data-toggle="tooltip" title="{{ count($page_contents) }} Info Found" class="badge bg-yellow">{{ count($page_contents) }}</span>
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
                        <th>Page Name</th>
                        <th>Heading</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                    @foreach($page_contents as $key=>$data)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ $data->page_name }}</td>
                            <td>{{ $data->heading }}</td>
                            <td>{{ strip_tags($data->description) }}</td>
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
                                                <a href="{{ url('/controlpanel/admin/page/content/publish/'.$data->id) }}"><i class="fa fa-eye"></i> Publish this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/page/content/unpublished/'.$data->id) }}"><i class="fa fa-eye-slash"></i> Unpublished this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/page/content/edit/'.$data->id) }}"><i class="fa fa-pencil"></i> Edit this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/page/content/delete/'.$data->id) }}"><i class="fa fa-trash"></i> Delete this info</a>
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
