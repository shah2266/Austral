@extends('admin.layouts.master')

@section('title')
Add project featured image
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Add project featured image</h3>
                <div class="box-tools pull-right">
                    <span class="btn btn-box-tool">
                        <span class="pull-right"><a href="{{ url('/controlpanel/admin/project/manage') }}"
                                class="label bg-blue color-palette p__8 f__size__13">Back to project page <i
                                    class="fa fa-mail-reply"></i></a></span>
                    </span>
                </div>
            </div>

            <div class="box-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $project->project_name }}"
                                    disabled="disabled" title="Selected project name.">
                                <input type="hidden" class="form-control" name="project_id" value="{{ $project->id }}">
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
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Project featured image list</h3>

                <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="{{ count($images) }} Info Found"
                        class="badge bg-yellow">{{ count($images) }}</span>
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
                        <th>Diagram Image</th>
                        <th>Project Name</th>
                        <th>Diagram Caption</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>


                    @foreach($images as $key=>$data)
                    <tr>
                        <td>{{ ($key+1) }}</td>
                        <td><img src="{{ asset($data->resize_image_path.$data->image) }}" alt="Slide"
                                class="image__resize"></td>
                        <td>{{ $data->project_name}}</td>
                        <td>{{ $data->caption }}</td>
                        <td><span
                                class="{{ ($data->status == 1)? 'badge bg-green':'badge bg-blue' }}">{{ ($data->status == 1)? 'Published': 'Unpublished'}}</span>
                        </td>
                        <td style="min-width:200px; text-align:center;">
                            <div class="margin">
                                <div class="btn-group">
                                    <button type="button" class="btn bg-purple">Action</button>
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li>
                                            <a href="{{ url('/controlpanel/admin/project/'.$data->project_id.'/featured/publish/'.$data->id) }}"><i
                                                    class="fa fa-eye"></i> Publish this info</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/controlpanel/admin/project/'.$data->project_id.'/featured/unpublished/'.$data->id) }}"><i
                                                    class="fa fa-eye-slash"></i> Unpublished this info</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/controlpanel/admin/project/'.$data->project_id.'/featured/delete/'.$data->id) }}"><i
                                                    class="fa fa-trash"></i> Delete this info</a>
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
        <!--/.direct-chat -->
    </div>
</div>

@endsection
