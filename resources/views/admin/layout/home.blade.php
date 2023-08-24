@extends('admin.layout.app')

@section('title')
    Main Page
@stop

@section('content')
    <!-- <div id="auto-refresh-content">
                             -->
    <div id="times-content">
        @foreach ($times as $time)
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class='contentRide'>
                        <div class="contentRide_header">
                            <h3 class="contentRide_title" class="bold">{{ $time->parks->name }}</h3>
                            <div class="contentRide_mins">
                                <h3 class="contentRide_title">Park Hours : {{ $time->duration_time ?? 0 . ' minute' }} </h3>
                                <p> {{ $time->date }} : ( {{ $time->start }} - {{ $time->end }} )</p>
                            </div>
                        </div>
                        <div class="home-flex" id="rides">
                            @foreach ($rides as $ride)
                                @if ($ride->park_id === $time->parks->id)
                                    @if ($ride->available == 'active')
                                        @php
                                            $model = App\Models\Ride::find($ride->id);

                                            $queue = $model
                                                ->queue()
                                                ?->where(function ($query) use ($time) {
                                                    $query->whereBetween('start_time', [$time?->date, $time?->close_date])->orWhereDate('start_time', $time->date);
                                                })
                                                ->latest()
                                                ->first();
                                        @endphp
                                        <!-- NOTE : kindly add class : (playHasQue) to (playBox) div if the play has Que --->
                                        <div class="playBox yes cardGame @if ($queue && $queue->queue_seconds == 0) playHasQue @endif"
                                            id="rideQueue{{ $ride->id }}">

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
                                                <div class="tooltip-icon" id="tooltip{{ $ride->id }}"
                                                    data-toggle="tooltip" title="{{ $ride->stoppageSubCategoryName }}!"><i
                                                        class="fa fa-info-circle">
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
                                    <div class="total_riders">
                                        <h3 class="contentRide_title"> Total Riders :
                                            @forelse ($total_riders as $total_rider_id => $total_rider_rides)
                                                @if ($total_rider_id === $time->id)
                                                    @foreach ($total_rider_rides as $ride)
                                                        <span
                                                            id="park-{{ $time->park_id }}">{{ $ride->total_rider }}</span>
                                                    @endforeach
                                                @endif
                                            @empty
                                                <span id="park-{{ $time->park_id }}">0</span>
                                            @endforelse
                                        </h3>
                                    </div>
                                @endif
                                <ul class="riders_list">
                                    @php
                                        $processedRideCats = [];
                                    @endphp

                                    @foreach ($cycles as $cycle)
                                        @php
                                            $queue = $queues->firstWhere('ride_cat', $cycle->ride_cat);
                                        @endphp

                                        @if ($cycle->park_time_id === $time->id)
                                            <li>
                                                {{ ucfirst($cycle->ride_cat) }} Riders: {{ $cycle->total_rider }}
                                                @if ($queue)
                                                    -<span class="que"> Avg Queue:
                                                        {{ number_format($queue->avg_queue_minutes, 1) }} min </span>
                                                    @php
                                                        $processedRideCats[] = $cycle->ride_cat;
                                                    @endphp
                                                @endif
                                                - <span class="cycle">Avg Cycles:
                                                    {{ number_format($cycle->avg_duration, 1) }} Sec </span>
                                            </li>
                                            @php
                                                $processedRideCats[] = $cycle->ride_cat;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @foreach ($queues as $queue)
                                        @if ($queue->park_time_id === $time->id)
                                            @if (!in_array($queue->ride_cat, $processedRideCats))
                                                <li>
                                                    {{ ucfirst($queue->ride_cat) }} Riders:0
                                                    - <span class="que">Avg Queue:
                                                        {{ number_format($queue->avg_queue_minutes, 1) }} min </span>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="contentDescription">
                            @php
                                $groupedStoppages = $stoppages->groupBy('stopage_category_id');
                            @endphp
                            @foreach ($groupedStoppages as $categoryId => $categoryStoppages)
                                @if ($categoryStoppages->first()->park_time_id === $time->id)
                                    <h4 class="bold">{{ $categoryStoppages->first()->stopageCategory->name }}</h4>
                                @endif
                                @foreach ($categoryStoppages as $stoppage)
                                    @if ($stoppage->park_time_id === $time->id)
                                        <p>{{ $stoppage->down_minutes }} mins {{ $stoppage->ride->name }}
                                            {{ $stoppage->stopageSubCategory->name }} {{ $stoppage->description ?? '' }}
                                        </p>
                                    @endif
                                @endforeach
                            @endforeach

                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@stop

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            function autoRefresh() {
                $.ajax({
                    url: "{{ route('admin.auto-refresh-page') }}",
                    type: 'GET',
                    success: function(response) {

                        console.log(response)
                        $('#times-content').html('')
                        $('#times-content').html(response)
                        $('.cardGame').each(function() {
                            if ($(this).hasClass("yes")) {
                                $(this).addClass("yesImportant");
                                console.log("$(this)")

                            } else if ($(this).hasClass("no")) {
                                $(this).addClass("noImportant")
                            }
                        });
                    }
                });
            }
            setTimeout(autoRefresh, 10000);

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
