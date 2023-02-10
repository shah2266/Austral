<!--header part start-->
<header class="main_menu">
    <!-- Top bar -->
    <div class="sub_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-8">
                    <div class="sub_menu_right_content">
                        <a href="#"><i class="flaticon-phone-call"></i>
                            @if(!empty($company->phone))
                                {{ $company->phone }}
                            @else
                                {{ '123456789' }}
                            @endif
                        </a> <span>|</span>
                        <a href="#"><i class="flaticon-at"></i>
                            @if(!empty($company->email))
                                {{ $company->email }}
                            @else
                                {{ 'info@demo.com' }}
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4">
                    <div class="sub_menu_social_icon">
                        @if(!empty($company->social_link_icon_1))
                            <a href="{{ url($company->social_link1) }}" target="_blank"><i class="{{ $company->social_link_icon_1 }}"></i></a>
                        @endif

                        @if(!empty($company->social_link_icon_2))
                            <a href="{{ url($company->social_link2) }}" target="_blank"><i class="{{ $company->social_link_icon_2 }}"></i></a>
                        @endif

                        @if(!empty($company->social_link_icon_3))
                            <a href="{{ url($company->social_link3) }}" target="_blank"><i class="{{ $company->social_link_icon_3 }}"></i></a>
                        @endif

                        @if(!empty($company->social_link_icon_4))
                            <a href="{{ url($company->social_link4) }}" target="_blank"><i class="{{ $company->social_link_icon_4 }}"></i></a>
                        @endif

                        @if(!empty($company->social_link_icon_5))
                            <a href="{{ url($company->social_link5) }}" target="_blank"><i class="{{ $company->social_link_icon_5 }}"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Top bar -->

    <!-- Main Menu -->
    <div class="main_menu_inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            @if(!empty($company->logo))
                                <img src="{{ asset($company->logo) }}" alt="logo">
                            @else
                                <b>{{ 'Demo logo' }}</b>
                            @endif
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item {{ (Route::currentRouteName() == 'website.home')? 'active':'' }}">
                                    <a class="nav-link" href="{{ route('website.home') }}">Home</a>
                                </li>
                                <li class="nav-item {{ (Route::currentRouteName() == 'website.about')? 'active':'' }}">
                                    <a class="nav-link" href="{{ route('website.about') }}">About</a>
                                </li>
                                <li class="nav-item {{ ((Route::currentRouteName() == 'website.projects') || (Route::currentRouteName() == 'website.single.project'))? 'active':'' }}">
                                    <a class="nav-link" href="{{ route('website.projects') }}">Projects</a>
                                </li>
                                <li class="nav-item {{ ((Route::currentRouteName() == 'website.events') || (Route::currentRouteName() == 'website.single.event'))? 'active':'' }}">
                                    <a class="nav-link" href="{{ route('website.events') }}">Events</a>
                                </li>
                                <li class="nav-item {{ (Route::currentRouteName() == 'website.contacts')? 'active':'' }}">
                                    <a class="nav-link" href="{{ route('website.contacts') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- #Main Menu -->
</header>
<!-- Header part end-->
