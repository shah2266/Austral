<!DOCTYPE html>
<html>

<head>
    @include('admin.includes.head-meta')

    <title>Dashboard - @yield('title')</title>
    
    @include('admin.includes.head-links')
    
</head>

<body class="hold-transition skin-green fixed sidebar-mini">
    
    <div class="wrapper">
        <!-- Header -->
        @include('admin.includes.header-menu')
        <!-- Header End -->

        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.includes.sidebar')
        <!-- End Side Bar-->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @include('admin.includes.breadcrumb')

            <!-- Main content -->
            <section class="content">
                @include('admin.includes.message')
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('admin.includes.footer')
        <!-- #Footer -->

    </div>
    <!-- ./wrapper -->

    @include('admin.includes.footer-script')

</body>

</html>

