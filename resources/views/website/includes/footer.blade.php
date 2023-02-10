<!-- footer part start-->
<footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="single-footer-widget footer-widget-1">
                        <a href="{{ url('/') }}"> <img src="{{ asset('frontendStyle/img/logo_0333.png') }}" alt=""> </a>
                        <p>
                            {{ $about_short_content }}
                            <a href="{{ route('website.about').'#about_us' }}" class="d-inline">Read more</a>
                        </p>
                        
                    </div>
                </div>

                <div class="col-sm-6 col-md-2 col-xl-2 offset-xl-1">
                    <div class="single-footer-widget footer-widget-2">
                        <h4>Quick links</h4>
                        <ul>
                            <li><a href="{{ route('website.about') }}">About us</a></li>
                            <li><a href="{{ route('website.projects') }}">Our projects</a></li>
                            <li><a href="{{ route('website.events') }}">Events</a></li>
                            <li><a href="{{ route('website.contacts') }}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer-widget-3">
                        <h4>Upcoming projects</h4>
                        <ul class="recent_project clearfix">

                            @foreach($upcoming_projects as $project)
                            <li>
                                <a href="{{ asset($project->resize_image_path.$project->image) }}" rel="prettyPhoto">
                                    <img src="{{ asset($project->resize_image_path.$project->image) }}"/>
                                </a>
                                <h5>{{ $project->project_name }}</h5>
                                <p>{{ Str::limit(strip_tags($project->description),50) }} <a href="{{ route('website.single.project', ['id' => $project->id] ) }}" class="d-inline">Read More</a> </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="single-footer-widget footer_icon">
                        <h4>Contact Info</h4>
                        <p>
                            @if(!empty($company->address))
                                {{ $company->address }}
                            @else
                                {{ 'Address' }}
                            @endif
                        </p>
                        <ul>
                            @if(!empty($company->phone) || !empty($company->email))
                                <li><a href="#"><i class="ti-mobile"></i> {{ $company->phone }}</a></li>
                                <li><a href="#"><i class="ti-email"></i> {{ $company->email }}</a></li>
                                <li><a href="https://australproperties.com/"><i class="ti-world"></i> australproperties.com</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <img src="{{ asset('frontendStyle/img/city_blue.png') }}" alt="">
                </div>
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <p class="footer-text m-0">
                            Copyright &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> 
                            @if(!empty($company->copy_right_text))
                                {{ $company->copy_right_text }}
                            @else
                                {{ 'Austral Properties Ltd. All right reserved.' }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    {{-- <div id="visitor_info">
        <div class="ip-area">
            <span class="float-right visitor-info-close">
                <i class="far fa-window-close"></i>
            </span>
            <div class="ip-feedback">
                <p>Welcome to australproperties Ltd.</p>
                <h5>Browser: {{ $visitor->agent->browser . ' - ' . $visitor->agent->browser_version }}</h5>
                <h5>IP: {{ $visitor->client_ip }}</h5>
                <h5 class="os-version">OS: {{ $visitor->device->platform }}</h5>
                <small><em>(N.b: Also Track Some Info like - Geo-location, IP address and Network)</em></small>
            </div>
        </div>
    </div> --}}

    <div id="visitor_info">
        <div class="ip-area">
            <span class="float-right visitor-info-close">
				<i class="far fa-caret-square-down" title="Minimize"></i>
            </span>
            <div class="ip-feedback">
                <p>Welcome to australproperties Ltd.</p>
                <h5>Browser: {{ 'Firefox - 72.0'}}</h5>
                <h5>IP: {{ '144.48.109.21' }}</h5>
                <h5 class="os-version">OS: {{ 'Windows' }}</h5>
                <small><em>(N.b: Also Track Some Info like - Geo-location, IP address and Network)</em></small>
            </div>
        </div>
        <span class="float-right visitor-info-show d-none">
			<i class="far fa-caret-square-up" title="Show"></i>
        </span>
    </div>

    