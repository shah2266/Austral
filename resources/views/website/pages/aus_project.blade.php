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
                        <p><a href="{{ route('website.home') }}">Home</a> <span>-</span>Projects</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!-- project start-->
<section class="projects section_padding">
    <div class="container">
        <div class="row">
            <div class="col-4 col-lg-4">
                <div class="section_tittle">
                    <h2>Our Projects</h2>
                </div>
            </div>
            <div class="col-8 col-md-8 col-lg-8 project_tabs_menu text-right">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a href="#upcoming" aria-controls="upcoming" role="tab" data-toggle="tab">UpComing
                            Projects</a></li>
                    <li><a href="#running" aria-controls="running" role="tab" data-toggle="tab">Current Projects</a>
                    </li>
                    <li class="active"><a href="#completed" aria-controls="completed" role="tab"
                            data-toggle="tab">Completed Projects</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 pl-0 pr-0">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="completed">
                        <div class="row">
                            @foreach($projects_completed as $project)
                                <div class="col-md-4 col-sm-6">
                                    <div class="projects_item mb-30">
                                        <img src="{{ asset($project->resize_image_path.$project->image) }}" alt="">
                                        <div class="projects_item_content">
                                            <h3 class="title">{{ $project->project_name }}</h3>
                                            <span class="post">{{ $project->address }}</span>
                                        </div>
                                        <ul class="icon">
                                            <li><a href="{{ asset($project->original_image_path.$project->image) }}" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                            </li>
                                            <li><a href="{{ route('website.single.project', ['id' => $project->id] ) }}"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="running">

                        <div class="row">
                            @foreach($projects_running as $project)
                                <div class="col-md-4 col-sm-6">
                                    <div class="projects_item mb-30">
                                        <img src="{{ asset($project->resize_image_path.$project->image) }}" alt="">
                                        <div class="projects_item_content">
                                            <h3 class="title">{{ $project->project_name }}</h3>
                                            <span class="post">{{ $project->address }}</span>
                                        </div>
                                        <ul class="icon">
                                            <li><a href="{{ asset($project->original_image_path.$project->image) }}" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                            </li>
                                            <li><a href="{{ route('website.single.project', ['id' => $project->id] ) }}"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="upcoming">
                        <div class="row">
                            @foreach($projects_upcoming as $project)
                                <div class="col-md-4 col-sm-6">
                                    <div class="projects_item mb-30">
                                        <img src="{{ asset($project->resize_image_path.$project->image) }}" alt="">
                                        <div class="projects_item_content">
                                            <h3 class="title">{{ $project->project_name }}</h3>
                                            <span class="post">{{ $project->address }}</span>
                                        </div>
                                        <ul class="icon">
                                            <li><a href="{{ asset($project->original_image_path.$project->image) }}" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                            </li>
                                            <li><a href="{{ route('website.single.project', ['id' => $project->id] ) }}"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
