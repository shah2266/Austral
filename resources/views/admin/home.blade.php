@extends('admin.layouts.master')

@section('title')
Home
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Session message -->
        <div class="callout callout-success">
            <p>You are logged in!</p>
        </div>
        <!-- #Session message -->
    </div>
</div>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $projects }}</h3>

                <p>Total projects</p>
            </div>
            <div class="icon">
                <i class="fa fa-building"></i>
            </div>
            <a href="{{ url('/controlpanel/admin/project/manage') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $events }}</h3>

                <p>Events</p>
            </div>
            <div class="icon">
                <i class="fa fa-picture-o"></i>
            </div>
            <a href="{{ url('/controlpanel/admin/event/manage') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $users }}</h3>
                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/controlpanel/admin/register/manage') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $services }}</h3>

                <p>Services</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('/controlpanel/admin/service/manage') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $employees }}</h3>

                <p>Employees</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ url('/controlpanel/admin/employee/manage') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $pages }}</h3>

                <p>Total pages</p>
            </div>
            <div class="icon">
                <i class="fa  fa-file-code-o"></i>
            </div>
            <a href="{{ url('/controlpanel/admin/page/manage') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection
