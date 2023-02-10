@extends('admin.layouts.master')

@section('title')
Slider
@endsection

@section('currentPage')
Slider
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- logos -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Slider</h3>
                    
                <div class="box-tools pull-right">
                    <span class="btn btn-box-tool">
                        <span class="pull-right"><a href="{{ url('/controlpanel/admin/company/slider/add') }}" class="label bg-navy color-palette p__8 f__size__13">Add Slider <i class="fa fa-plus"></i></a></span>
                    </span>
                    <span data-toggle="tooltip" title="{{ count($sliders) }} Info Found" class="badge bg-yellow">{{ count($sliders) }}</span>
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
                        <th>Slide Image</th>
                        <th>Heading</th>
                        <th>Sub Title</th>
                        <th>Established Year</th>
                        <th>Button</th>
                        <th>Status</th>
                        <th style="text-align:center;">Action</th>
                    </tr>

                    @foreach($sliders as $key=>$data)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td><img src="{{ asset($data->image) }}" alt="Slide" class="image__resize"></td>
                            <td>{{ $data->caption }}</td>
                            <td>{{ $data->sub_title}}</td>
                            <td>{{ $data->year_of_established }}</td>
                            <td><b>Label:</b>{{ $data->btn_label }}<br><b>Button link:</b>{{ $data->btn}}</td>
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
                                                <a href="{{ url('/controlpanel/admin/company/slider/publish/'.$data->id) }}"><i class="fa fa-eye"></i> Publish this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/company/slider/unpublished/'.$data->id) }}"><i class="fa fa-eye-slash"></i> Unpublished this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/company/slider/edit/'.$data->id) }}"><i class="fa fa-pencil"></i> Edit this info</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/controlpanel/admin/company/slider/delete/'.$data->id) }}"><i class="fa fa-trash"></i> Delete this info</a>
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
