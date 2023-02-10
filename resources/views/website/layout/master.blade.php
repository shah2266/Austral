<!doctype html>
<html lang="en">

<head>
    
    @include('website.includes.head-meta')

    <title>Austral - @yield('title') </title>

    @include('website.includes.head-links')

</head>

<body class="pageloader">
    <!-- pre loader-->
    <div id="preloader">
        <div class="preloaderlogo"></div>
    </div>
    
    @include('website.includes.header-menu')
    
    <!-- Main Section -->
    @yield('main-area')
    <!-- Main Section -->

    @if(\Request::is('contact') != true)
        @if(\Request::is('project') != true)
            @include('website.includes.recent-projects')
        @endif
        @if(\Request::is('event') != true)
            @include('website.includes.recent-events')
        @endif
    @endif
    
    @include('website.includes.footer')
    @include('website.includes.footer-script')
</body>

</html>