<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('controlpanel/ausadmindashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Austral</b>Properties</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">{{ count($contacts) }}</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header">Latest {{ count($contacts) }} contacts</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach($contacts as $data)
                                <li>
                                    <!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{ asset('adminStyle/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            {{ $data->name }}
                                            <small><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d h:m')  }}</small>
                                        </h4>
                                        <p>{{ $data->message }}</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="{{ url('controlpanel/admin/contact/manage') }}">See All Messages</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('adminStyle/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('adminStyle/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                            <p>
                                Shah Alam - Web Developer
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="col-md-12">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="btn btn-default btn-flat btn-block"> <i class="fa fa-key"></i> Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>

    </nav>
</header>
