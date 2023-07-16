@extends('admin.layout.app')

@section('title')
Main Page
@stop

@section('content')
@foreach($times as $time )
<div class="row">

    <div class="col-lg-12 col-xs-12">
        <div class='contentRide'>
            <h3>{{ $time->parks->name }}: {{ $time->duration_time?? 0 ." minute" }}
            </h3>
            <p> {{ $time->date }} : ( {{$time->start}} - {{ $time->end }} )</p>
            <div class="home-flex">
                @foreach ($rides as $ride )
                @if ($ride->park_id === $time->parks->id)
                @if ($ride->available == "active")
                <!-- NOTE : kindly add class : (playHasQue) to (playBox) div if the play has Que --->
                <div class="playBox yes cardGame">
                    <!-- Start Tooltip -->
                    <div class="tooltip-outer">
                        <div class="tooltip-icon" data-toggle="tooltip" title="Play Details HereSome tooltip text!"><i class="fa fa-info-circle"> </i></div>
                    </div>
                    <!-- !!End Tooltip -->
                    <a href="{{url('/all-rides/'.$ride->park_id.'/'.$time->id)}}">
                        <div class="card-box" id="rideStatus{{$ride->id}}">
                            <h4 class="header-title m-t-0 m-b-0">{{$ride->name}}</h4>
                        </div>
                    </a>
                </div>
                @elseif($ride->available == "stopped" || "closed")
                <div class="playBox no cardGame">
                    <!-- Start Tooltip -->
                    <div class="tooltip-outer">
                        <div class="tooltip-icon" id="tooltip{{$ride->id}}" data-toggle="tooltip" title="Play Details HereSome tooltip text!"><i class="fa fa-info-circle"> </i></div>
                    </div>
                    <!-- !!End Tooltip -->
                    <a href="{{url('/all-rides/'.$ride->park_id.'/'.$time->id)}}">

                        <div class="card-box" id="rideStatus{{$ride->id}}">

                            <h4 class="header-title m-t-0 m-b-0">{{$ride->name}}</h4>

                        </div>
                    </a>

                </div>
                @endif
                @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <h4> Total Riders :
                        @foreach($total_riders as $total_rider_id => $total_rider_rides)
                        @if ($total_rider_id === $time->id)
                        @foreach($total_rider_rides as $ride)
                        {{ $ride->total_rider }}
                        @endforeach
                        @endif
                        @endforeach
                    </h4>
                    @foreach($cycles as $cycle_rides)
                    @foreach($queues as $queue)
                    @if ($cycle_rides->park_time_id === $time->id & $queue->park_time_id === $time->id )
                    <ul>
                        @if ($cycle_rides->ride_cat ==='family' &$queue->ride_cat ==='family' )

                        <li>Family Riders :{{$cycle_rides->total_rider}}
                            - Avg Queue :{{$queue->avg_queue_minutes}} min
                            - Avg Cycles : {{$cycle_rides->avg_duration}} Sec
                        </li>
                        @endif

                        @if ($cycle_rides->ride_cat ==='thrill' & $queue->ride_cat ==='thrill' )

                        <li>Thrill Riders :{{ $cycle_rides->total_rider}}
                            - Avg Queue :{{$queue->avg_queue_minutes}} min
                            - Avg Cycles : {{ $cycle_rides->avg_duration}}
                        </li>
                        @endif
                        @if ($cycle_rides->ride_cat ==='kids' & $queue->ride_cat ==='kids' )

                        <li>Kids Riders :{{ $cycle_rides->total_rider}}
                            - Avg Queue :{{ $queue->avg_queue_minutes }} min
                            - Avg Cycles : {{ $cycle_rides->avg_duration}}
                        </li>
                        @endif

                    </ul>
                    @endif
                    @endforeach
                    @endforeach

                </div>

                <div class="col-lg-6 col-xs-12">


                </div>


            </div>


        </div>
    </div>

</div>
@endforeach


<!-- <div class='contentRide'>
        <div class="Description">
            <div class="contentDescription">
                <h4 class="bold">title</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, minima soluta omnis commodi
                    exercitationem laboriosam iure laudantium porro asperiores totam fuga quam ab. Eaque blanditiis
                    perferendis enim repudiandae neque voluptas!</p>
            </div>
            <div class="contentDescription">
                <h4 class="bold">title</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, minima soluta omnis commodi
                    exercitationem laboriosam iure laudantium porro asperiores totam fuga quam ab. Eaque blanditiis
                    perferendis enim repudiandae neque voluptas!</p>
            </div>
            <div class="contentDescription">
                <h4 class="bold">title</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, minima soluta omnis commodi
                    exercitationem laboriosam iure laudantium porro asperiores totam fuga quam ab. Eaque blanditiis
                    perferendis enim repudiandae neque voluptas!</p>
            </div>

        </div>
    </div> -->
<div class="row home-flex">

    <div class="col col-xs-6 col-md-4 col-lg-3">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-0">Departments Number</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value=" {{App\Models\Department::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value="{{App\Models\User::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value=" {{App\Models\Branch::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value=" {{App\Models\Park::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value=" {{App\Models\Zone::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value=" {{App\Models\Ride::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value="{{App\Models\RideType::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value="{{App\Models\StopageCategory::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value="{{App\Models\StopageSubCategory::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#b59369" data-bgColor="#fff6eb" value=" {{App\Models\CustomerFeedbacks::count()}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        $('.cardGame').each(function() {
            if ($(this).hasClass("yes")) {
                $(this).addClass("yesImportant");
                console.log("$(this)")

            } else if ($(this).hasClass("no")) {
                $(this).addClass("noImportant")
            }
        });


    });
</script>
@endpush
