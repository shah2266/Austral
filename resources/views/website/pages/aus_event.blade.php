@extends('website.layout.master')

@section('title')
Events
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
                        <p><a href="{{ route('website.home') }}">Home</a> <span>-</span>Event</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Blog Area =================-->
<section class="blog_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @if(!$events->isEmpty())
                        @foreach($events as $event)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset($event->original_image_path.$event->image) }}" alt="">
                                <a href="{{ route('website.single.event', ['id' => $event->id] ) }}" class="blog_item_date">
                                    <h3>{{ \Carbon\Carbon::parse($event->from_date)->format('d') }}</h3>
                                    <p>{{ \Carbon\Carbon::parse($event->from_date)->format('M') }}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('website.single.event', ['id' => $event->id] ) }}">
                                    <h2>{{ $event->name }} <sub><small>{{ '('.\Carbon\Carbon::parse($event->from_date)->format('d M y') }} - {{ \Carbon\Carbon::parse($event->to_date)->format('d M y').')' }}</small></sub></h2>
                                </a>
                                <p>{{ Str::limit(strip_tags($event->description),160) }}</p>
                                <ul class="blog-info-link">
                                    <li><a href="{{ route('website.single.event', ['id' => $event->id] ) }}"><i class="far fa-eye"></i> Read more</a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $events->links() }}
                        </nav>
                    @endif
                    
                    
                </div>
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
<!--Event Area-->

@endsection
