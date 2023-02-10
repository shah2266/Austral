@extends('admin.layouts.masterAdmin')

@section('title')
Tour Slider
@endsection

@section('currentPage')
Tour slider
@endsection


@section('content')
<div class="row">

    <!-- Session message -->
    <div class="col-md-12">
        @if(Session::get('success'))
        <div class="callout callout-success">
            <p>{{ Session::get('success') }}</p>
        </div>
        @elseif(Session::get('info'))
        <div class="callout callout-info">
            <p>{{ Session::get('info') }}</p>
        </div>
        @elseif(Session::get('danger'))
        <div class="callout callout-danger">
            <p>{{ Session::get('danger') }}</p>
        </div>
        @elseif(Session::get('warning'))
        <div class="callout callout-warning">
            <p>{{ Session::get('warning') }}</p>
        </div>
        @endif
    </div>
    <!-- #Session message -->

    <div class="col-md-12">
        <!-- logos -->
        <div class="box box-warning direct-chat direct-chat-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Tour Slider</h3>
                    
                <div class="box-tools pull-right">
                    <span class="btn btn-box-tool">
                        <span class="pull-right"><a href="{{ url('/controlpanel/admin/tour/tour/manage') }}" class="label bg-blue color-palette p__8 f__size__13">Back To Tour Page <i class="fa fa-mail-reply"></i></a></span>
                    </span>
                    <span data-toggle="tooltip" title="{{ count($tourPackageSliders) }} Info Found" class="badge bg-yellow">{{ count($tourPackageSliders) }}</span>
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
                        <th>Slide Caption</th>
                        <th>Tour Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach($tourPackageSliders as $key=>$data)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td><img src="{{ asset($data->resize_image_path.$data->image) }}" alt="Slide" class="image__resize"></td>
                            <td>{{ $data->image_caption }}</td>
                            <td>{{ $data->name }}</td>
                            <td><span class="{{ ($data->status == 1)? 'badge bg-green':'badge bg-blue' }}">{{ ($data->status == 1)? 'Published': 'Unpublished'}}</span></td>
                            <td style="min-width:200px">
                                <a href="{{ url('/controlpanel/admin/tour/'.$data->tour_id.'/slider/manage/publish/'.$data->id) }}" data-toggle="tooltip" title="Publish this info" onclick="return confirm('Are your sure to publish this record!')" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                <a href="{{ url('/controlpanel/admin/tour/'.$data->tour_id.'/slider/manage/unpublished/'.$data->id) }}" data-toggle="tooltip" title="Unpublished this info" onclick="return confirm('Are your sure to Unpublish this record!')" class="btn btn-danger btn-xs"><i class="fa fa-eye-slash"></i></a>
                                <a href="#" data-tour-id="{{ $data->tour_id }}" data-slider-id="{{ $data->id }}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
<div class="modal modal-danger fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form action="{{ url('/controlpanel/admin/tour/slider/manage/delete') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Are you sure want to delete this item?</p>
                    <input type="hidden" name="slider_id" id="slider_id" value="">
                    <input type="hidden" name="tour_id" id="tour_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline btn-ok">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



