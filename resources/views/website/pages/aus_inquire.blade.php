@extends('website.layout.master')

@section('title', 'Contact us')

@section('main-area')
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_inner">
                    <div class="breadcrumb_inner_item">
                        <h2>Contact us</h2>
                        <p><a href="{{ route('website.home') }}">Home</a> <span>-</span>Contact us</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--contact section start-->
<section class="contact-section">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <div id="map" style="height: 480px;"></div>
            <script>
                function initMap() {
                    var uluru = {
                        lat: {{ $company->latitude }},
                        lng: {{ $company->longitude }}
                    };
                    var grayStyles = [{
                            featureType: "all",
                            stylers: [{
                                    saturation: -90
                                },
                                {
                                    lightness: 50
                                }
                            ]
                        },
                        {
                            elementType: 'labels.text.fill',
                            stylers: [{
                                color: '#ccdee9'
                            }]
                        }
                    ];
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: {{ $company->latitude }},
                            lng: {{ $company->longitude }}
                        },
                        zoom: 16,
                        styles: grayStyles,
                        scrollwheel: false
                    });
                }

            </script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
            </script>

        </div>
        <div class="row" >

            <div class="col-lg-8">
                <h2 class="contact-title">Get in Touch</h2>

                @if(Session::get('success'))
                    <div id="thanks" class="text-center mb-3" style="font-size:30px; font-weight:bolder;">
                        <p class="text-success">{{ Session::get('success') }}</p>
                    </div>
                @endif

                {!! Form::open(['route' => 'website.contacts', 'class'=> 'form-contact contact_form']) !!}
                
                    <div class="row">

                        <!-- Name -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter your name', 'required' => true, 'minlength'=> '5', 'maxlength' => '20']) !!}
                                @if ($errors->has('name'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Contact number -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Enter your number', 'required' => true, 'minlength' => '10', 'maxlength' => '15']) !!}
                                @if ($errors->has('number'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'required' => true, 'maxlength'=>'30', 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$']) !!}
                                @if ($errors->has('email'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Subject -->
                        <div class="col-6">
                            <div class="form-group">
                            {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Enter subject', 'required' => true, 'minlength'=> '10', 'maxlength'=>'80']) !!}
                            @if ($errors->has('subject'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                            @endif
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="col-12">
                            <div class="form-group">
                                    {!! Form::textarea('', null, [
                                        'class'         => 'form-control w-100', 
                                        'rows'          => 6,
                                        'name'          => 'message',
                                        'id'            => 'message',
                                        'placeholder'   => 'Enter message',
                                        'required'      => true,
                                        'minlength'     => '20',
                                        'maxlength'     => '160'
                                        ]) 
                                    !!}
                                @if ($errors->has('message'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::submit('Send Message', ['class'=>'button button-contactForm btn_2']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-4 contact-details">
                <h2 class="contact-title">Contact Information</h2>
                <div class="info-inner clearfix">
                    <div class="float-left">
                        <i class="fa fa fa-map-marker"></i>
                    </div>
                    <div class="float-right">
                        <div class="info-main clearfix">
                            @if(!empty($company->address))
                                <h4>Office Address</h4>
                                <p> {{ $company->address }} </p>
                            @else
                                {{ 'Address' }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="info-inner clearfix">
                    <div class="float-left">
                        <i class="fa fa fa-phone"></i>
                    </div>
                    <div class="float-right">
                        <div class="info-main clearfix">
                            @if(!empty($company->phone))
                            <h4>Phone Numbers</h4>
                            <p>{{ $company->phone }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="info-inner clearfix">
                    <div class="float-left">
                        <i class="fa fa fa-envelope"></i>
                    </div>
                    <div class="float-right">
                        <div class="info-main clearfix">
                            <h4>Email Address</h4>
                            <p>info@australproperties.com<br>
                                australpropertiesbd@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--contact section end-->

@endsection
