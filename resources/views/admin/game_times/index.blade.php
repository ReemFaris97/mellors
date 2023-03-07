@extends('admin.layout.app')

@section('title')
    Update Ride open and close times
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
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Rides
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                Park
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                              Edit Time Slot
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                              Add Incident Report
                            </th>

                        </tr>
                        </thead>

                        <tbody>
                        @if(isset($items))

                        @foreach ($items as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->park->name }}</td>
                                <td>
                                    <a href="{{ route('admin.game_times.edit', $item) }}"
                                           class="btn btn-info">Edit Time Slot</a>

                                </td>
                                <td>
                                    <a href="{{url('add_incident_report/'.$item->id.'/'.$park_time_id)}}"
                                           class="btn btn-primary">Add Incident Report</a>
                                   <a href="{{url('add_accident_report/'.$item->id.'/'.$park_time_id)}}"
                                           class="btn btn-primary">Add Accident Report</a>
                                </td>
                            </tr>

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

