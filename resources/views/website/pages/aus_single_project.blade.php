@extends('website.layout.master')

@section('title')
Our projects
@endsection

@section('main-area')

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_inner">
                    <div class="breadcrumb_inner_item">
                        <h2>Projects</h2>
                        <p><a href="{{ route('website.home') }}">Home</a> <span>-</span><a
                                href="{{ route('website.projects') }}">Projects</a><span>-</span>{{ $project->project_name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!-- project_details part start -->
<section class="project_details pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section_tittle">
                    <h2>{{$project->project_name}}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-10">
                <div class="project_details_img">
                    <img src="{{ asset($project->original_image_path.$project->image) }}" alt="single_project"
                        class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7 col-sm-8">
                <div class="project_details_content">
                    <h3>{{ $project->project_name }}</h3>
                    <p>{{ strip_tags($project->description) }}</p>

                </div>
                @if(!empty($project->features))
                <div class="quote-wrapper">
                    <div class="quotes">
                        <h4>Features</h4>
                        <p>{{ strip_tags($project->features) }}</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-3 col-sm-4">
                <div class="project_details_widget bg-light p-3 my-5">
                    <div class="single_project_details_widget">
                        <span class="ti-location-pin"></span>
                        <h5>Address</h5>
                        <p>{{ $project->address }}</p>
                        <!-- <h6>Wed, Feb 06, 2019</h6> -->
                    </div>
                    <div class="single_project_details_widget">
                        <span class="ti-time"></span>
                        <h5>Handover Date</h5>
                        <p>{{ \Carbon\Carbon::parse($project->handover_date_time)->format('d M Y') }}</p>
                        <!-- <h6>Wed, Feb 06, 2019</h6> -->
                    </div>
                    <div class="single_project_details_widget">
                        <span class="ti-check-box"></span>
                        <h5>Status</h5>
                        <p>
                            @if($project->project_type == 1)
                            <b class="badge text-success">Completed</b>
                            @elseif($project->project_type == 2)
                            <b class="badge text-warning">Running</b>
                            @else
                            <b class="badge text-danger">Upcoming</b>
                            @endif
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <table class="table table-hover border text-center">
                    <thead>
                        <tr>
                            <th scope="col">Total area (SFT)</th>
                            <th scope="col">Number of unit</th>
                            <th scope="col">Flat</th>
                            <th scope="col">Lift</th>
                            <th scope="col">Parking space</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $project->total_area }}</td>
                            <td>{{ $project->number_of_unit }}</td>
                            <td>{{ $project->flat }}</td>
                            <td>{{ $project->lift }}</td>
                            <td>{{ $project->parking_space }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if(!$diagrams->isEmpty())

        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 project_details">
                <div class="project_details_content">
                    <h3>{{ $project->project_name }} - Diagram</h3>
                </div>
                <div id="diagram" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner image-overlay">
                        @foreach($diagrams as $key => $diagram)
                        <div class="carousel-item {{($key == 0)? ' active':''}}">
                            <div class="row">
                                <div class="col-md-6 col-6">

                                    <a href="{{ asset($diagram->original_image_path.$diagram->image) }}"
                                        rel="prettyPhoto">
                                        <div class="single-imgs relative">
                                            <img class="card-img rounded-0"
                                                src="{{ asset($diagram->resize_image_path.$diagram->image) }}" alt="">
                                            <div class="overlay">
                                                <div class="overlay-content">
                                                    <div class="overlay-icon">
                                                        <i class="ti-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-6 single_project_details_text">
                                    <h4 class="text-uppercase">{{ $diagram->caption }}</h4>
                                    <p>{{ strip_tags($diagram->description) }}</p>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    <div class="diagram-btn">
                        <a href="#diagram" role="button" data-slide="prev" style="font-size:40px;"> prev </a>
                        <a href="#diagram" role="button" data-slide="next" style="font-size:40px;"> next </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(!$featured->isEmpty())
        <div class="row justify-content-center mb_130">
            <div class="col-lg-10 project_details">
                <div class="project_details_content">
                    <h3>{{ $project->project_name }} - Featured images</h3>
                </div>
                <div id="owl-project-featured-image" class="owl-carousel image-overlay">
                    @foreach($featured as $image)
                    <div class="item mr-2">
                        <a href="{{ asset($image->original_image_path.$image->image) }}" rel="prettyPhoto[]">
                            <div class="single-imgs relative">
                                <img class="card-img rounded-0"
                                    src="{{ asset($image->resize_image_path.$image->image) }}" alt="">
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <div class="overlay-icon">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- project_details part end -->

@endsection
