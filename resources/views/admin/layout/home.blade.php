@extends('admin.layout.app')

@section('title')
    Main Page
@stop

@section('content')
    @foreach ($times as $time)
        <div class="row">


            <div class="col-lg-12 col-xs-12">
                <div class='contentRide'>
                    <h3>{{ $time->parks->name }}: {{ $time->duration_time ?? 0 . ' minute' }}
                    </h3>
                    <p> {{ $time->date }} : ( {{ $time->start }} - {{ $time->end }} )</p>
                    <div class="home-flex">
                        @foreach ($rides as $ride)
                            @if ($ride->park_id === $time->parks->id)
                                @if ($ride->available == 'active')
                                    <!-- NOTE : kindly add class : (playHasQue) to (playBox) div if the play has Que --->
                                    <div class="playBox yes cardGame " id="rideQueue{{ $ride->id }}">

                                        <a href="{{ url('/all-rides/' . $ride->park_id . '/' . $time->id) }}">
                                            <div class="card-box" id="rideStatus{{ $ride->id }}">
                                                <h4 class="header-title m-t-0 m-b-0">{{ $ride->name }}</h4>
                                            </div>
                                        </a>
                                    </div>
                                @elseif($ride->available == 'stopped' || 'closed')
                                    <div class="playBox no cardGame " id="rideQueue{{ $ride->id }}">
                                        <!-- Start Tooltip -->
                                        <div class="tooltip-outer">
                                            <div class="tooltip-icon" id="tooltip{{ $ride->id }}" data-toggle="tooltip"
                                                title="{{$ride->stoppageSubCategoryName}}!"><i class="fa fa-info-circle"> </i></div>
                                        </div>
                                        <!-- !!End Tooltip -->
                                        <a href="{{ url('/all-rides/' . $ride->park_id . '/' . $time->id) }}">

                                            <div class="card-box" id="rideStatus{{ $ride->id }}">

                                                <h4 class="header-title m-t-0 m-b-0">{{ $ride->name }}</h4>

                                            </div>
                                        </a>

                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            @if (!empty($total_riders))
                                <h4> Total Riders :
                                    @foreach ($total_riders as $total_rider_id => $total_rider_rides)
                                        @if ($total_rider_id === $time->id)
                                            @foreach ($total_rider_rides as $ride)
                                                <span id="park-{{ $time->park_id }}">{{ $ride->total_rider }}</span>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </h4>
                            @endif
                            @foreach ($cycles as $cycle_rides)
                            {{-- @dd($cycle_rides) --}}
                                @foreach ($queues as $queue)

                                    @if (($cycle_rides->park_time_id === $time->id) & ($queue->park_time_id === $time->id))
                                        <ul>
                                            @if (($cycle_rides->ride_cat === 'family') & ($queue->ride_cat === 'family'))
                                                <li>Family Riders :{{ $cycle_rides->total_rider }}
                                                    - Avg Queue :{{ $queue->avg_queue_minutes }} min
                                                    - Avg Cycles : {{ $cycle_rides->avg_duration }} Sec
                                                </li>
                                            @endif

                                            @if (($cycle_rides->ride_cat === 'thrill') & ($queue->ride_cat === 'thrill'))
                                                <li>Thrill Riders :{{ $cycle_rides->total_rider }}
                                                    - Avg Queue :{{ $queue->avg_queue_minutes }} min
                                                    - Avg Cycles : {{ $cycle_rides->avg_duration }}
                                                </li>
                                            @endif
                                            @if (($cycle_rides->ride_cat === 'kids') & ($queue->ride_cat === 'kids'))
                                                <li>Kids Riders :{{ $cycle_rides->total_rider }}
                                                    - Avg Queue :{{ $queue->avg_queue_minutes }} min
                                                    - Avg Cycles : {{ $cycle_rides->avg_duration }}
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
