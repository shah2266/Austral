@extends('admin.layouts.master')

@section('title')
Projects | {{ $project->project_name }}
@endsection

@section('currentPage')
Projects - {{ $project->project_name }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="project_details_heading clearfix">
            <span class="pull-left margin">
                <h1>{{ $project->project_name }}</h1>
            </span>
            <span class="pull-right margin">
                <a href="{{ url('/controlpanel/admin/project/manage') }}" class="label bg-blue color-palette p__8 f__size__13">
                Back to project page
                <i class="fa fa-mail-reply"></i></a>
            </span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#project" data-toggle="tab">Project basic info</a></li>
                <li><a href="#diagram" data-toggle="tab">Diagram</a></li>
                <li><a href="#featured" data-toggle="tab">Featured image</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="project">
                    <div class="row project_details margin-bottom">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Project Type</b></td>
                                    <td>
                                    @if($project->project_type == 1)
                                        <span class="badge bg-green">Completed</span>
                                    @elseif($project->project_type == 2)
                                        <span class="badge bg-yellow">Running</span>
                                    @else
                                        <span class="badge bg-red">Upcoming</span>
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Address</b></td>
                                    <td>{{ $project->address }}</td>
                                </tr>
                                
                                <tr>
                                    <td><b>Parking space</b></td>
                                    <td>{{ $project->parking_space }}</td>
                                </tr>
                                <tr>
                                    <td><b>Handover date</b></td>
                                    <td>{{-- \Carbon\Carbon::parse($project->handover_date_time)->format('d-m-Y') --}}</td>
                                </tr>
                                <tr>
                                    <td><b>Featured</b></td>
                                    <td>{{ $project->features }}</td>
                                </tr>
                                <tr>
                                    <td><b>Project visibility</b></td>
                                    <td>
                                        @if($project->status == 1)
                                            <span class="badge bg-green">Publish</span>
                                        @else
                                            <span class="badge bg-red">Unpublish</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Total area (SFT)</b></td>
                                    <td>{{ $project->total_area }} SFT</td>
                                </tr>
                                <tr>
                                    <td><b>Number of unit</b></td>
                                    <td>{{ $project->number_of_unit }}</td>
                                </tr>
                                <tr>
                                    <td><b>Flat</b></td>
                                    <td>{{ $project->flat }}</td>
                                </tr>
                                <tr>
                                    <td><b>Lift</b></td>
                                    <td>{{ $project->lift }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <h4><b>Description</b></h4>
                            <p>{{ strip_tags($project->description) }}</p>
                        </div>
                    </div>
                    <!-- /.user-block -->
                    <div class="row margin-bottom mt-20">
                        <div class="col-sm-6">
                            <img class="img-responsive" src="{{ asset($project->resize_image_path.$project->image) }}" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <div class="row">
                                @foreach($images as $key => $image)
                                    <div class="col-sm-4">
                                        <img class="img-responsive img-fit" src="{{ asset($image->resize_image_path.$image->image) }}"
                                            alt="Photo">
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="diagram">
                    <div class="row">
                        @foreach($diagrams as $key => $diagram)
                            <div class="col-sm-6">
                                <img class="img-responsive img-fit" src="{{ asset($diagram->resize_image_path.$diagram->image) }}"
                                    alt="Photo">
                                <h5 class="text-center"><b>{{ $diagram->caption }}</b></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="featured">
                    <div class="row">
                        @foreach($images as $key => $image)
                            <div class="col-sm-4">
                                <img class="img-responsive img-fit" src="{{ asset($image->resize_image_path.$image->image) }}"
                                    alt="Photo">
                                <h5 class="text-center"><b>{{ $image->caption }}</b></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
@endsection
