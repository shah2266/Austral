<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminStyle/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ request()->is('controlpanel/ausadmindashboard') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('controlpanel/ausadmindashboard') ? 'active' : '' }}"><a href="{{ url('controlpanel/ausadmindashboard') }}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                </ul>
            </li>
            <li class="treeview {{ request()->is('controlpanel/admin/company/*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Website Options</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('controlpanel/admin/company/manage') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/company/manage') }}"><i class="fa fa-circle-o"></i> General</a></li>
                    <li {{ request()->is('controlpanel/admin/company/slider/manage') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/company/slider/manage') }}"><i class="fa fa-circle-o"></i> Slider</a></li>
                    <li {{ request()->is('controlpanel/admin/company/chairman') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/company/chairman/message') }}"><i class="fa fa-circle-o"></i> Chairman message</a></li>
                    <li {{ request()->is('controlpanel/admin/company/others/manage') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/company/others/manage') }}"><i class="fa fa-circle-o"></i> Others</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('controlpanel/admin/page/*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('controlpanel/admin/page/manage') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/page/manage') }}"><i class="fa fa-circle-o"></i> Manage</a></li>
                    <li {{ request()->is('controlpanel/admin/page/add') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/page/add') }}"><i class="fa fa-circle-o"></i> Add new page</a></li>
                    <li {{ request()->is('controlpanel/admin/page/content/manage') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/page/content/manage') }}"><i class="fa fa-circle-o"></i> Page content Setting</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('controlpanel/admin/service/*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Service</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('controlpanel/admin/service/manage') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/service/manage') }}"><i class="fa fa-circle-o"></i> Manage</a></li>
                    <li {{ request()->is('controlpanel/admin/service/add') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/service/add') }}"><i class="fa fa-circle-o"></i> Add new service</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('controlpanel/admin/project/*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Projects</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('controlpanel/admin/project/manage') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/project/manage') }}"><i class="fa fa-circle-o"></i> Manage</a></li>
                    <li {{ request()->is('controlpanel/admin/project/add') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/project/add') }}"><i class="fa fa-circle-o"></i> Add New Project</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('controlpanel/admin/event/*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Events</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('controlpanel/admin/event/manage') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/event/manage') }}"><i class="fa fa-circle-o"></i> Manage</a></li>
                    <li {{ request()->is('controlpanel/admin/event/add') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/event/add') }}"><i class="fa fa-circle-o"></i> Add New Events</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('controlpanel/admin/employee/*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Employee</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ request()->is('controlpanel/admin/employee/manage') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/employee/manage') }}"><i class="fa fa-circle-o"></i> Manage</a></li>
                    <li {{ request()->is('controlpanel/admin/employee/add') ? 'active' : '' }}><a href="{{ url('controlpanel/admin/employee/add') }}"><i class="fa fa-circle-o"></i> Add new member</a></li>
                </ul>
            </li>
            <li class="header">Setting</li>
            <li class="treeview {{ request()->is('controlpanel/admin/register/*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('controlpanel/admin/register/manage') }}"><i class="fa fa-circle-o"></i> Accounts</a></li>
                    <li><a href="{{ url('controlpanel/admin/register') }}"><i class="fa fa-circle-o"></i> Add new account</a></li>
                </ul>
            </li>
            <li class="treeview {{ request()->is('controlpanel/admin/track/*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Tracker</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('controlpanel/admin/track/visitor') }}"><i class="fa fa-circle-o"></i> Visitors</a></li>
                    <li><a href="{{ url('controlpanel/admin/track/session') }}"><i class="fa fa-circle-o"></i> All sessions</a></li>
                    <li><a href="{{ url('controlpanel/admin/track/error') }}"><i class="fa fa-circle-o"></i> Errors</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
