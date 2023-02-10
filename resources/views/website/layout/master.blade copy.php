<!DOCTYPE html>
<html lang="en">
    <head>

        @include('website.includes.head-meta')

        <title>Austral - @yield('title') </title>
        
        @include('website.includes.head-links')

    </head>
	<body>
		<!-- pre loader-->
		<!--<div id="preloader"></div>-->
			
		<div id="wrap">

        @include('website.includes.header-menu')

        <!-- Main Section -->
        @yield('main-area')
        <!-- Main Section -->

        @include('website.includes.footer')
        @include('website.includes.footer-script')

    </body>
</html>