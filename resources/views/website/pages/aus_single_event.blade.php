@extends('website.layout.master')

@section('title')
Our event
@endsection

@section('main-area')

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_inner">
                    <div class="breadcrumb_inner_item">
                        <h2>Event</h2>
                        <p><a href="{{ route('website.home') }}">Home</a> <span>-</span><a
                                href="{{ route('website.events') }}">Event</a><span>-</span>{{ $event->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Event Area =================-->
<section class="blog_area single-post-area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ asset($event->original_image_path.$event->image) }}" alt="">
                    </div>
                    <div class="blog_details">
                        <h2>{{ $event->name }}</h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><i class="far fa-clock"></i>
                                {{ \Carbon\Carbon::parse($event->from_date)->format('d M y') }} -
                                {{ \Carbon\Carbon::parse($event->to_date)->format('d M y') }}</li>
                            <li><i class="fas fa-map-marked-alt"></i> {{ $event->address }}</li>
                        </ul>
                        <p>{{ strip_tags($event->description) }}</p>
                    </div>
                </div>

                @if($totalEvents >= 5)
                
                <div class="navigation-top">
                    <div class="navigation-area">
                        <div class="row">
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <a href="{{ route('website.single.event', ['id' => $event_prev->id] ) }}">
                                        <img class="img-fluid" src="{{ asset($event_prev->original_image_path.$event_prev->image) }}" alt="Image missing" style="width:60px; height:60px;">
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="{{ route('website.single.event', ['id' => $event_prev->id] ) }}">
                                        <span class="lnr text-white ti-arrow-left"></span>
                                    </a>
                                </div>
                                <div class="details">
                                    <p>Prev Post</p>
                                    <a href="{{ route('website.single.event', ['id' => $event_prev->id] ) }}">
                                        <h4>{{ $event_prev->name }}</h4>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="details">
                                    <p>Next Post</p>
                                    <a href="{{ route('website.single.event', ['id' => $event_next->id] ) }}">
                                        <h4>{{ $event_next->name }}</h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="{{ route('website.single.event', ['id' => $event_next->id] ) }}">
                                        <span class="lnr text-white ti-arrow-right"></span>
                                    </a>
                                </div>
                                <div class="thumb">
                                    <a href="{{ route('website.single.event', ['id' => $event_next->id] ) }}">
                                        <img class="img-fluid" src="{{ asset($event_next->original_image_path.$event_next->image) }}" alt="Image missing" style="width:60px; height:60px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent event</h3>
                        @foreach($recent_events as $re)
                            <div class="media post_item">
                                <img src="{{ asset($re->resize_image_path.$re->image) }}" alt="post" style="width:80px; height:60px;">
                                <div class="media-body">
                                    <a href="{{ route('website.single.event', ['id' => $re->id] ) }}">
                                        <h3>{{$re->name}}</h3>
                                    </a>
                                    <p>{{ \Carbon\Carbon::parse($event->from_date)->format('d M y') }} - {{ \Carbon\Carbon::parse($event->to_date)->format('d M y') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tags</h4>
                        <ul class="list">
                            <li>
                                <a href="{{ route('website.projects')}}">project</a>
                            </li>
                            <li>
                                <a href="{{ route('website.events')}}">Event</a>
                            </li>
                        </ul>
                    </aside>
                    <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Recent products</h4>
                        <ul class="instagram_row flex-wrap image-overlay">
                            @foreach($projects as $project)
                            <li>
                                <a href="{{ route('website.single.project', ['id' => $project->id] ) }}">
                                    <div class="single-imgs relative">
                                        <img class="card-img rounded-0"
                                            src="{{ asset($project->resize_image_path.$project->image) }}" alt="">
                                        <div class="overlay">
                                            <div class="overlay-content">
                                                <div class="overlay-icon">
                                                    <i class="ti-link"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Event Area end =================-->
@endsection
