	<!-- Content Header (Page header) -->
	<section class="content-header">
	    <h1 style="display:inline-block">
	        <a href="{{ url('controlpanel/ausadmindashboard') }}" style="display:inline-block;color: #000;">Dashboard</a> 
	        <small>Control panel</small>
	    </h1>
	    <div style="display:inline-block">
	        <small>
	            <a href="{{ url('controlpanel/ausadmindashboard') }}" class="btn bg-green margin p__8 f__size__13"
	                data-toggle="tooltip" title="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
	        </small>
	        <small>
	            <a href="{{ url('/') }}" class="btn bg-maroon margin p__8 f__size__13" target="_blank"
	                data-toggle="tooltip" title="Preview Site"><i class="fa fa-eye"></i> Preview Site</a>
	        </small>
	        <span>
	            <a onclick="window.location.href=window.location.href" class="btn bg-olive margin refresh"
	                data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
	        </span>
	    </div>
	    <ol class="breadcrumb">
	        <li><a href="{{ url('controlpanel/ausadmindashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	        <li class="active">@yield('currentPage')</li>
	    </ol>
	</section>
