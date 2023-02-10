@extends('website.layout.master')

@section('title')
Home
@endsection

@section('main-area')
<!-- banner part start-->
<section class="banner_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
                    <div class="overlay"></div>

                    <!-- Indicators -->
                    <!-- <ol class="carousel-indicators">
                            <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#bs-carousel" data-slide-to="1"></li>
                            <li data-target="#bs-carousel" data-slide-to="2"></li>
                        </ol> -->

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach($sliders as $key => $slide)
                            @if($key == 1)
                            <div class="carousel-item slides active">
                                <div class="banner_text text-center">
                                    <div class="banner_text_inner">
                                        @if(!empty($slide->year_of_established))
                                            <h5>Since <span>{{ $slide->year_of_established }}</span> </h5>
                                        @endif
                                        
                                        <h1>{{ $slide->caption }}</h1>
                                        <h3>{{ $slide->sub_title }}</h3>
                                        @if($slide->btn )
                                        <a href="{{ $slide->btn }}" class="btn_1">{{ $slide->btn_label }} </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @else 
                            <div class="carousel-item slides">
                                <!-- <div class="slide-2"></div> -->
                                <img src="{{ asset($slide->image) }}" alt="" class="img-fluid" style="width:100%">
                                <div class="banner_text text-center">
                                    <div class="banner_text_inner">
                                        @if(!empty($slide->year_of_established))
                                            <h5>Since <span>{{ $slide->year_of_established }}</span> </h5>
                                        @endif
                                        
                                        <h1>{{ $slide->caption }}</h1>
                                        <h3>{{ $slide->sub_title }}</h3>
                                        @if($slide->btn )
                                        <a href="{{ $slide->btn }}" class="btn_1">{{ $slide->btn_label }} </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                        
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#bs-carousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#bs-carousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- Home About Part -->
<section class="home_about_part section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('frontendStyle/img/about.jpg') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="section_tittle">
                    <h2>{{ $about_heading }}</h2>
                </div>
                <p>
                    {{ $about_description }}
                </p>
                <a href="{{ route('website.about').'#about_us' }}" class="btn_2">read more</a>
            </div>
        </div>
    </div>
</section>
<!-- Home About Part -->

<!-- service part start-->
<section class="service_part section_padding" style="background: #e6f4f9;">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="section_tittle">
                    <h2>Our Services</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            @foreach($services as $service)
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single_service_part">
                    <i class="{{ $service->icon }}"></i>
                    <span class="line"></span>
                    <h3>{{ $service->heading }}</h3>
                    <p>{{ $service->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- service part start-->

<!-- project start-->
<section class="projects section_padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="section_tittle">
                    <h2>Our Completed
                        Project</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($projects as $project)
            <div class="col-md-4 col-sm-6">
                <div class="projects_item mb-3">
                    <img src="{{ asset($project->resize_image_path.$project->image) }}" alt="project">
                    <div class="projects_item_content">
                        <h3 class="title">{{ $project->project_name }}</h3>
                        <span class="post">{{ $project->address }}</span>
                    </div>
                    <ul class="icon">
                        <li><a href="{{ asset($project->original_image_path.$project->image) }}" rel="prettyPhoto"><i class="fa fa-plus"></i></a></li>
                        <li><a href="{{ url('/project/'.$project->id) }}"><i class="fa fa-link"></i></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- project end -->
@endsection
