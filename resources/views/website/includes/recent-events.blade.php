@if(!$recent_events->isEmpty())
<section class="catagory_post">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="section_tittle">
                        <h2>Our Latest Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($recent_events as $recent_event)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_catagory_post post_2">
                        <div class="category_post_img">
                            <img src="{{ asset($recent_event->resize_image_path.$recent_event->image) }}" alt="">
                        </div>
                        <div class="post_text_1 pr_30">
                            <p><span> {{ \Carbon\Carbon::parse($recent_event->from_date)->format('d M y') }} - {{ \Carbon\Carbon::parse($recent_event->to_date)->format('d M y') }} </span></p>
                            <a href="{{ route('website.single.event', ['id' => $recent_event->id] ) }}">
                                <h3>{{ $recent_event->name }}</h3>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!--catagory_post end-->