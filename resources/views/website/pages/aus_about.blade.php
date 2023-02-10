@extends('website.layout.master')

@section('title')
About
@endsection

@section('main-area')

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_inner">
                    <div class="breadcrumb_inner_item">
                        <h2>About us</h2>
                        <p><a href="{{ route('website.home') }}">Home</a> <span>-</span>About us</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!-- service part start-->
<section class="home_about_part section_padding" id="about_us">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="section_tittle">
                    <h2>{{ $about->heading }}</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-12">
                <p>
                {{ strip_tags($about->description) }}
                </p>
            </div>

        </div>
    </div>
</section>
<!-- service part start-->


@if(!$mvs->isEmpty())
<!-- about part start-->
<section class="about_part section_bg section_padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            @foreach($mvs as $mv)
            <div class="col-4 col-md-4 col-lg-4 mb-4">
                <div class="about_text">
                    <h2>{{ $mv->title }}</h2>
                    <p>{{ $mv->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- about part start-->
@endif

<!-- about part start-->
@if(!empty($chairman))
<section class="about_part section_bg section_padding section_chairman">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-6 col-lg-6">
                <div class="about_img">
                    <img src="{{ asset($chairman->image) }}" alt="">
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="about_text" style="background-image: none;">
                    <h2>{{ $chairman->name }}</h2>
                    <h4><b>{{ $chairman->designation }}</b></h4>
                    <p>{{ $chairman->description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about part start-->
@endif

<!--industries start-->
<section class="our_Professional single_page_Professional section_padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="section_tittle">
                    <h2>Meet Experienced
                        Professional</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="owl-team" class="owl-carousel">
                    @foreach($teams as $member)
                        <div class="item">
                            <div class="single_industries m-1">
                                <img src="{{ asset($member->resize_image_path.$member->image) }}" alt="">
                                <div class="single_industries_text">
                                    <h3>{{ $member->name }}</h3>
                                    <p>{{ $member->designation }}</p>
                                    <div class="details">
                                        <a href="#">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<!--industries end-->

@endsection
