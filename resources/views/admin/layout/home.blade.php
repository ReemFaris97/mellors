@extends('admin.layout.app')

@section('title')
   Main Page
@stop

@section('content')
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Number of Users</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#AAE2C6" value="{{App\Models\User::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15" style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\User::count()}} </h2>
                        <p class="text-muted">User</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->



        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Branches Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#B8E6F4" value=" {{App\Models\Branch::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15" style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0">  {{App\Models\Branch::count()}} </h2>
                        <p class="text-muted">Branch</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Park Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#B8E6F4" value=" {{App\Models\Park::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15" style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0">  {{App\Models\Park::count()}} </h2>
                        <p class="text-muted">Park</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Zones Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#B8E6F4" value=" {{App\Models\Zone::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15" style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0">  {{App\Models\Zone::count()}} </h2>
                        <p class="text-muted">Zone</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Rides Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#B8E6F4" value=" {{App\Models\Ride::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15" style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0">  {{App\Models\Ride::count()}} </h2>
                        <p class="text-muted">Ride</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Departments Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#B8E6F4" value=" {{App\Models\Department::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15" style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0">  {{App\Models\Department::count()}} </h2>
                        <p class="text-muted">Department</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

    </div>

@stop

