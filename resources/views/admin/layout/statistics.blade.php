@extends('admin.layout.app')

@section('title')
Statistics
@stop

@section('content')
   
    <div class="row home-flex">

        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-0">Departments Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value=" {{App\Models\Department::count()}}" data-skin="tron"
                               data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\Department::count()}} </h2>
                        <p class="text-muted">Department</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-0">Number of Users</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value="{{App\Models\User::count()}}" data-skin="tron"
                               data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\User::count()}} </h2>
                        <p class="text-muted">User</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->


        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-0">Branches Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value=" {{App\Models\Branch::count()}}" data-skin="tron"
                               data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\Branch::count()}} </h2>
                        <p class="text-muted">Branch</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-0">Park Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value=" {{App\Models\Park::count()}}" data-skin="tron"
                               data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\Park::count()}} </h2>
                        <p class="text-muted">Park</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-0">Zones Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value=" {{App\Models\Zone::count()}}" data-skin="tron"
                               data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\Zone::count()}} </h2>
                        <p class="text-muted">Zone</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-0">Rides Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value=" {{App\Models\Ride::count()}}" data-skin="tron"
                               data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\Ride::count()}} </h2>
                        <p class="text-muted">Ride</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->


        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-0">Number of Ride Types</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value="{{App\Models\RideType::count()}}" data-skin="tron"
                               data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\RideType::count()}} </h2>
                        <p class="text-muted">Ride Types</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-0">Number of Stoppages Categories</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value="{{App\Models\StopageCategory::count()}}" data-skin="tron"
                               data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\StopageCategory::count()}} </h2>
                        <p class="text-muted">StopageCategory</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-0">Number of Stoppages Sub Categories</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value="{{App\Models\StopageSubCategory::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\StopageSubCategory::count()}} </h2>
                        <p class="text-muted">StopageSubCategory</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col col-xs-6 col-md-4 col-lg-3">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-0">Customers Feedback Number</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369"
                               data-bgColor="#fff6eb" value=" {{App\Models\CustomerFeedbacks::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"
                               style="margin-left: -62px;"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\CustomerFeedbacks::count()}} </h2>
                        <p class="text-muted">CustomerFeedbacks</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

    </div>

@stop

