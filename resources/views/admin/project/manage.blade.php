@extends('admin.layouts.master')

@section('title')
Projects
@endsection

@section('currentPage')
Projects
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- logos -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Projects Information</h3>
                    
                <div class="box-tools pull-right">
                    <span class="btn btn-box-tool">
                        <span class="pull-right">
                            <a href="{{ url('/controlpanel/admin/project/add') }}" class="label bg-navy color-palette p__8 f__size__13">Add project <i class="fa fa-plus"></i></a>
                        </span>
                    </span>
                    <span data-toggle="tooltip" title="{{ $totalProjects }} Info Found" class="badge bg-yellow">{{ $totalProjects }}</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-striped">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th>Project Name</th>
                        <th>Project Type</th>
                        <th>Project Details</th>
                        <th>Hand Over Date</th>
                        <th>Status</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                    
                    @php 
                     echo $projects
                    @endphp

                </table>
            </div>

            <div class="box-footer">
            </div>
            <!-- /.box-footer-->
        </div>
    </div>
</div>
@endsection
