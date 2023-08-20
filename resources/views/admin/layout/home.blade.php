@extends('admin.layout.app')

@section('title')
    Main Page
@stop

@section('content')
    @foreach ($times as $time)
        <div class="row">


            <div class="col-lg-12 col-xs-12">
                <div class='contentRide'>
                    <div class="contentRide_header">
                        <h3 class="contentRide_title">{{ $time->parks->name }}</h3> 
                        <div class="contentRide_mins">
                            <p>{{ $time->duration_time ?? 0 . ' minute' }} </p>
                            <p> {{ $time->date }} : ( {{ $time->start }} - {{ $time->end }} )</p>
                        </div>
                    </div>
                    <div class="home-flex">
                        @foreach ($rides as $ride)
                            @if ($ride->park_id === $time->parks->id)
                                @if ($ride->available == 'active')
                                    @php
                                        $model = App\Models\Ride::find($ride->id);

                                        $queue = $model->queue()?->where(function ($query) use($time) {
                                                    $query->whereBetween('start_time', [$time?->date, $time?->close_date])->orWhereDate('start_time', $time->date);
                                                })->latest()->first();
                                     @endphp
                                    <!-- NOTE : kindly add class : (playHasQue) to (playBox) div if the play has Que --->
                                    <div class="playBox yes cardGame @if ($queue && $queue->queue_seconds == 0) playHasQue @endif" id="rideQueue{{ $ride->id }}">

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
                                                title="{{ $ride->stoppageSubCategoryName }}!"><i class="fa fa-info-circle">
                                                </i></div>
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
                        <div class="col-xs-12">
                            @if (!empty($total_riders))
                                <div class="total_riders"> Total Riders :
                                    @forelse ($total_riders as $total_rider_id => $total_rider_rides)
                                        @if ($total_rider_id === $time->id)
                                            @foreach ($total_rider_rides as $ride)
                                                <span id="park-{{ $time->park_id }}">{{ $ride->total_rider }}</span>
                                            @endforeach
                                        @endif
                                    @empty
                                        <span id="park-{{ $time->park_id }}">0</span>
                                    @endforelse
                                </div>
                            @endif

                            @php
                                $displayedRideCat = [];
                            @endphp

                            @foreach ($cycles as $cycle_rides)
                                @php
                                    $queueFound = false;
                                    $cycleFound = false;
                                @endphp

                                @foreach ($queues as $queue)
                                    @if (
                                        $cycle_rides->park_time_id === $time->id &&
                                            $queue->park_time_id === $time->id &&
                                            $cycle_rides->ride_cat === $queue->ride_cat)
                                        @if (!in_array($cycle_rides->ride_cat, $displayedRideCat))
                                            <ul class="riders_list">
                                                <li>{{ ucfirst($cycle_rides->ride_cat) }} Riders:
                                                    {{ $cycle_rides->total_rider }}
                                                   
                                                   @if ($queue->avg_queue_minutes !== null)
                                                      <!-- NOTE : kindly add class : (playHasQue) to <li></li>  if label: Avg Queue ---> 
                                                      <span class="playHasQue">   - Avg Queue: {{ number_format($queue->avg_queue_minutes, 1) }} min </span>
                                                    @endif
                                                    @if ($cycle_rides->avg_duration !== null)
                                                    <span class="cycle">
                                                        - Avg Cycles: {{ number_format($cycle_rides->avg_duration, 1) }}
                                                        Sec
                                                        </span>
                                                    @endif
                                                </li>
                                            </ul>
                                            @php
                                                $displayedRideCat[] = $cycle_rides->ride_cat;
                                            @endphp
                                        @endif
                                        @php
                                            $queueFound = true;
                                            $cycleFound = true;

                                        @endphp
                                    @break
                                @endif
                            @endforeach

                            @if (!$queueFound && !in_array($cycle_rides->ride_cat, $displayedRideCat))
                                <ul>
                                    <li>{{ ucfirst($cycle_rides->ride_cat) }} Riders: {{ $cycle_rides->total_rider }}
                                        - Avg Cycles: {{ number_format($cycle_rides->avg_duration, 1) }} Sec
                                    </li>
                                </ul>
                                @php
                                    $displayedRideCat[] = $cycle_rides->ride_cat;
                                @endphp
                            @endif
                            @if (!$cycleFound && !in_array($queue->ride_cat, $displayedRideCat))
                                <ul>
                                    <li>
                                        - Avg Queue: {{ number_format($queue->avg_queue_minutes, 1) }} min
                                    </li>
                                </ul>
                                @php
                                    $displayedRideCat[] = $cycle_rides->ride_cat;
                                @endphp
                            @endif
                        @endforeach


                    </div>

                    <div class="col-lg-6 col-xs-12">


                    </div>


                </div>

                <div class="contentDescription">
                    @php
                        $groupedStoppages = $stoppages->groupBy('stopage_category_id');
                    @endphp

                    @foreach ($groupedStoppages as $categoryId => $categoryStoppages)
                        <h4 class="bold">{{ $categoryStoppages->first()->stopageCategory->name }}</h4>
                        @foreach ($categoryStoppages as $stoppage)
                            @if ($stoppage->park_time_id === $time->id)
                                <p>{{ $stoppage->down_minutes }} mins {{ $stoppage->ride->name }}
                                    {{ $stoppage->stopageSubCategory->name }} {{ $stoppage->description ?? '' }}</p>
                            @endif
                        @endforeach
                    @endforeach



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
