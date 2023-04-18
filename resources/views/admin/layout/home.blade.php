@extends('admin.layout.app')

@section('title')
Main Page
@stop

@section('content')
<div class="row">
    <div class="col-lg-8 col-xs-12">
        <div class='contentRide'>
            <h2>Rides Status</h2>
            <div class="row">
                @foreach ($rides as $ride )
                @if ($ride->available == "active")
                <div class="col-lg-2 col-md-6 yes cardGame">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-15">{{$ride->name}}</h4>
                    </div>
                </div>
                @elseif($ride->available == "stopped" || "closed")
                <div class="col-lg-2 col-md-6 no cardGame">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-15">{{$ride->name}}</h4>
                    </div>
                </div>
                @endif
                @endforeach
            </div>


        </div>
    </div>
    <div class="col-lg-4 col-xs-12">
        <div class='contentRide'>
            <h2>Park Hours</h2>
            <div class="row">
                @foreach($park_times as $time )
                <a href="{{route('admin.park_times.index')}}">
                    <div class="col-lg-4 col-md-6  cardGame">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">{{ $time->parks->name }}</h4>
                            <p> {{ $time->duration_time?? 0 ." minute" }}</p>
                            <p> {{ $time->date }} || {{$time->start}} - {{ $time->end }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </div>
</div>


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
<div class=" row">

    <div class="col-lg-3 col-md-6">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-15">Departments Number</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#B8E6F4" value=" {{App\Models\Department::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
                </div>

                <div class="widget-detail-1">
                    <h2 class="p-t-10 m-b-0"> {{App\Models\Department::count()}} </h2>
                    <p class="text-muted">Department</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-15">Number of Users</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#AAE2C6" value="{{App\Models\User::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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

            <h4 class="header-title m-t-0 m-b-15">Branches Number</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#B8E6F4" value=" {{App\Models\Branch::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
                </div>

                <div class="widget-detail-1">
                    <h2 class="p-t-10 m-b-0"> {{App\Models\Branch::count()}} </h2>
                    <p class="text-muted">Branch</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-3 col-md-6">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-15">Park Number</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#B8E6F4" value=" {{App\Models\Park::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
                </div>

                <div class="widget-detail-1">
                    <h2 class="p-t-10 m-b-0"> {{App\Models\Park::count()}} </h2>
                    <p class="text-muted">Park</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-3 col-md-6">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-15">Zones Number</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#B8E6F4" value=" {{App\Models\Zone::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
                </div>

                <div class="widget-detail-1">
                    <h2 class="p-t-10 m-b-0"> {{App\Models\Zone::count()}} </h2>
                    <p class="text-muted">Zone</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-3 col-md-6">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-15">Rides Number</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#B8E6F4" value=" {{App\Models\Ride::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
                </div>

                <div class="widget-detail-1">
                    <h2 class="p-t-10 m-b-0"> {{App\Models\Ride::count()}} </h2>
                    <p class="text-muted">Ride</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->


    <div class="col-lg-3 col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-15">Number of Ride Types</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#AAE2C6" value="{{App\Models\RideType::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
                </div>

                <div class="widget-detail-1">
                    <h2 class="p-t-10 m-b-0"> {{App\Models\RideType::count()}} </h2>
                    <p class="text-muted">Ride Types</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-15">Number of Stoppages Categories</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#AAE2C6" value="{{App\Models\StopageCategory::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
                </div>

                <div class="widget-detail-1">
                    <h2 class="p-t-10 m-b-0"> {{App\Models\StopageCategory::count()}} </h2>
                    <p class="text-muted">StopageCategory</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-15">Number of Stoppages Sub Categories</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#AAE2C6" value="{{App\Models\StopageSubCategory::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
                </div>

                <div class="widget-detail-1">
                    <h2 class="p-t-10 m-b-0"> {{App\Models\StopageSubCategory::count()}} </h2>
                    <p class="text-muted">StopageSubCategory</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-15">Customers Feedback Number</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#B8E6F4" value=" {{App\Models\CustomerFeedbacks::count()}}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" style="margin-left: -62px;" />
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