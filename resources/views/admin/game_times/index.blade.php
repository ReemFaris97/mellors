@extends('admin.layout.app')

@section('title')
    All Rides 
@endsection

@section('content')

    <div class="card-box">

        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1" aria-sort="ascending">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Rides
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Park
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Edit Time Slot
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Add Health And Safety Reports
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Ride Operations
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                    colspan="1">
                                    Zone Supervisor Actions
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            @if (isset($items))
                                @foreach ($items as $item)
                                    @if (in_array($item->id, $zone_rides))
                                        <tr role="row" class="odd" id="row-{{ $item->id }}">
                                            <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->park->name }}</td>
                                            <td>
                                                @if (auth()->user()->can('editRideTime'))
                                                    <a href="{{ url('edit_ride_time/' . $item->id . '/' . $park_time_id) }}"
                                                        class="btn btn-info">Edit Time Slot</a>
                                            </td>
                                    @endif

                                    <td>
                                        @if (auth()->user()->can('incidents-create'))
                                            <a href="{{ url('add_incident_report/' . $item->id . '/' . $park_time_id) }}"
                                                class="btn btn-danger"> <i class="fa fa-plus"></i>Incident </a>
                                        @endif
                                        @if (auth()->user()->can('accidents-create'))
                                            <a href="{{ url('add_accident_report/' . $item->id . '/' . $park_time_id) }}"
                                                class="btn btn-danger"> <i class="fa fa-plus"></i>Accident </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (auth()->user()->can('showStoppages'))
                                            <a href="{{ url('show_stoppages/' . $item->id . '/' . $park_time_id) }}"
                                                class="btn btn-primary"><i class="fa fa-plus"></i>Stoppages</a>
                                        @endif
                                        @if (auth()->user()->can('showCycles'))
                                            <a href="{{ url('show_cycles/' . $item->id . '/' . $park_time_id) }}"
                                                class="btn btn-primary"><i class="fa fa-plus"></i>Cycles</a>
                                        @endif
                                        @if (auth()->user()->can('showQueues'))
                                            <a href="{{ url('show_queues/' . $item->id . '/' . $park_time_id) }}"
                                                class="btn btn-primary"><i class="fa fa-plus"></i>Queues</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (auth()->user()->can('preopening_lists-create'))
                                            <a href="{{ url('show_preopening_list/' . $item->id . '/' . $park_time_id) }}">
                                                <button type="button" id="add" class="add btn btn-success">
                                                    <i class="fa fa-plus"></i> Inspection Lists
                                                </button>
                                            </a>
                                            <a href="{{ url('add_observation/' . $item->id) }}">
                                                <button type="button" id="add" class="add btn btn-danger">
                                                    <i class="fa fa-plus"></i> Add Observation
                                                </button>
                                            </a>
                                            <a href="{{ url('show_general_questions/' . $item->id . '/' . $park_time_id) }}">
                                                <button type="button" id="add" class="add btn btn-primary">
                                                    <i class="fa fa-plus"></i> Audit Check
                                                </button>
                                            </a>
                                        @endif
                                    </td>

                                    </tr>
                                @endif
                            @endforeach
                            @endif

                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>


@endsection


@section('footer')
    @include('admin.datatable.scripts')
@endsection
